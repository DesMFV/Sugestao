<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pesquisa de satisfação</title>

    <link rel="stylesheet" href="../css-meu/pesquisa.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <script type="text/javascript" src="../js/jquery-3.3.1.js"></script>

    <script type="text/javascript">
        var valorgeral;



        $(document).ready(
            function() {
                if (window.innerWidth >= 900) {
                    $("#btnp").css("visibility", "hidden");
                    $("#btnv").css("visibility", "hidden");
                    $(".form-submit").css("visibility", "hidden");
                    $("#box-question1").css("visibility", "visible");
                    $("#box-question2").css("visibility", "hidden");
                    $("#box-question3").css("visibility", "hidden");
                    $("#box-question4").css("visibility", "hidden");
                } 
            }
        );

        $(function() {

            var valorbtn = 0;
            var checked = 0;

            if (window.innerWidth >= 900) {

                $("#btnp").click(function() {
                        if (valorbtn == 0) {
                            valorbtn = 1;
                            $("#box-question" + valorbtn).css("visibility", "hidden");
                            $("#btnp").css("visibility", "visible");
                            valorbtn++;
                            $("#box-question" + valorbtn).css("visibility", "visible");
                            $("#btnv").css("visibility", "visible");
                        } else if (valorbtn < 3) {
                            $("#box-question" + valorbtn).css("visibility", "hidden");
                            valorbtn++;
                            $("#box-question" + valorbtn).css("visibility", "visible");
                        } else if (valorbtn == 3) {
                            $("#btnp").css("visibility", "hidden");
                            $("#box-question" + valorbtn).css("visibility", "hidden");
                            valorbtn++;
                            $("#box-question" + valorbtn).css("visibility", "visible");
                            $(".form-submit").css("visibility", "visible");
                        } else {
                            valorbtn = 1;
                            $("#box-question" + valorbtn).css("visibility", "hidden");
                            $("#btnp").css("visibility", "visible");
                            valorbtn++;
                            $("#box-question" + valorbtn).css("visibility", "visible");
                            $("#btnv").css("visibility", "visible");
                        }
                    }
                );
                }

        })
        $(function() {

            var checked;
            var valorbtn = 1;

            $(".radio-teste").click(function() {

                if (window.innerWidth >= 900) {

                    if (checked != 4) {
                        window.setTimeout(function radioProxima() {
                            if (valorbtn == 1) {
                                $("#box-question" + valorbtn).css("visibility", "hidden");
                                valorbtn++;
                                $("#box-question" + valorbtn).css("visibility", "visible");
                                checked = 1;
                            } else if (valorbtn < 3) {
                                $("#box-question" + valorbtn).css("visibility", "hidden");
                                valorbtn++;
                                $("#box-question" + valorbtn).css("visibility", "visible");
                                checked++;
                            } else if (valorbtn == 3) {
                                $("#btnp").css("visibility", "hidden");
                                $("#box-question" + valorbtn).css("visibility", "hidden");
                                valorbtn++;
                                $("#box-question" + valorbtn).css("visibility", "visible");
                                checked++;
                                valorgeral = valorbtn;
                            } else {
                                $(".form-submit").css("visibility", "visible");
                                checked++;
                                $("#btnv").css("visibility", "visible");
                            }
                        }, 560);
                    }
                }

            });
        });




        $(function() {
            $("#btnv").click(function() {

                if (window.innerWidth >= 900) {

                    if (valorgeral == 4) {
                        $("#box-question" + valorgeral).css("visibility", "hidden");
                        valorgeral--;
                        $("#box-question" + valorgeral).css("visibility", "visible");
                        $("#btnp").css("visibility", "visible");
                        $(".form-submit").css("visibility", "hidden");
                    } else if (valorgeral == 0) {
                        valorgeral--;
                        $("#btnv").css("visibility", "hidden");
                        valorgeral = 4;
                    } else if (valorgeral == 2) {
                        $("#box-question" + valorgeral).css("visibility", "hidden");
                        valorgeral--;
                        $("#box-question" + valorgeral).css("visibility", "visible");
                        $("#btnv").css("visibility", "hidden");
                        valorgeral = 4;
                    } else {
                        $("#box-question" + valorgeral).css("visibility", "hidden");
                        valorgeral--;
                        $("#box-question" + valorgeral).css("visibility", "visible");
                    }

                }
            })
        });
    </script>


</head>

<body>
    <div class="pag">

        <div class="pag-banner">
            <img class="banner" src="../img/obrigado-banner.png">
        </div>

        <div class="pag-info">
            <!-- ============= inicio ÁREA INTERAÇÃO =============-->

            <!-- ============= inicio INTERAÇÃO =============-->

            <h1 class="form-title">Pesquisa de satisfação</h1>

            <!-- ============= inicio SUGESTÃO =============-->
            <form class="form-container" method="POST" action="../index.php?pagina=SugestaoController&acao=enviarpesquisa&destino=obrigado" enctype="multipart/form-data">
                <?php


                require '../vendor/autoload.php';

                $o = new Matheus\Models\Opcoes();

                $opcoes = array(
                    1 => $o->getOpcao(1), $o->getOpcao(2), $o->getOpcao(3), $o->getOpcao(4), $o->getOpcao(5)
                );

                $p = new Matheus\Models\Perguntas();

                $perguntas = array(
                    1 => $p->getPergunta(1), $p->getPergunta(2), $p->getPergunta(3), $p->getPergunta(4)
                );

                $pergunta = 0;
                $opcao = 0;
                $cq = 1;
                $proximaQuestao;

                foreach ($perguntas as $key => $value) {

                    ++$pergunta;

                    echo "

                        <div id=\"box-question" . $cq . "\" class=\"box-question" . $cq++ . " box-question\">

                        <div class=\"q-space\">

                        <label class=\"form-pergunta\" for=\"asdf\" name=\"pergunta\"> $value </label>

                        </div>

                        <div class=\"r-space\">

                        <ul class=\"question-radios\">

                        <li class=\"payment-method\">
                            <input class=\"radio-teste\" value=\"1\" name=\"radio_respostaq" . $pergunta . "\" type=\"radio\" id=\"" . ++$opcao . "-" . $pergunta . "\">" . $opcoes[$opcao] . "
                            <label for=\"" . $opcao . "-" . $pergunta . "\"></label>
                        </li>
                        <li class=\"payment-method\">
                            <input class=\"radio-teste\" value=\"2\" name=\"radio_respostaq" . $pergunta . "\" type=\"radio\" id=\"" . ++$opcao . "-" . $pergunta . "\">" . $opcoes[$opcao] . "
                            <label for=\"" . $opcao . "-" . $pergunta . "\"></label>
                        </li>

                        <li class=\"payment-method\">
                            <input class=\"radio-teste\" value=\"3\" name=\"radio_respostaq" . $pergunta . "\" type=\"radio\" id=\"" . ++$opcao . "-" . $pergunta . "\">" . $opcoes[$opcao] . "
                            <label for=\"" . $opcao . "-" . $pergunta . "\"></label>
                        </li>

                        <li class=\"payment-method\">
                            <input class=\"radio-teste\" value=\"4\" name=\"radio_respostaq" . $pergunta . "\" type=\"radio\" id=\"" . ++$opcao . "-" . $pergunta . "\">" . $opcoes[$opcao] . "
                            <label class=\"label-p\" for=\"" . $opcao . "-" . $pergunta . "\"></label>
                        </li>

                        <li class=\"payment-method\">
                            <input class=\"radio-teste\" value=\"5\" name=\"radio_respostaq" . $pergunta . "\" type=\"radio\" id=\"" . ++$opcao . "-" . $pergunta . "\">" . $opcoes[$opcao] . "
                            <label for=\"" . $opcao . "-" . $pergunta . "\"></label>
                        </li>

                        </ul>

                        
                        </div>
                        
                        </div>

                        ";
                    $opcao = 0;
                }

                ?>

                <input type="button" class="btnv" id="btnv">
                <input type="button" class="btnp" id="btnp">



                <input class="form-submit" type="submit" value="Enviar Pesquisa">


                <div class="div-of-form">.</div>

                <a href="../index.php" class="a-env" value="Adicionar">Deixe também uma sugestão crítica</a>

            </form>
            <!-- ============= fim SUGESTÃO =============-->
            <!-- ============= fim INTERAÇÃO =============-->
            <!--============= inicio HOME =============-->
            <!-- ============= fim ÁREA INTERAÇÃO =============-->
        </div>

    </div>

</body>

</html> 