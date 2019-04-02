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
        $(document).ready(
            function() {
                $("#btnv").css("visibility", "hidden");
                $("#box-question2").css("visibility", "hidden");
                $("#box-question3").css("visibility", "hidden");
                $("#box-question4").css("visibility", "hidden");
            }
        );
        $(function() {

            var valorbtn = 0;

            $("#btnp").click(function() {
                if (valorbtn == 0) {
                    valorbtn = 1;
                    $("#box-question" + valorbtn).css("visibility", "hidden");
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
                }
            });

            $("#btnv").click(function() {

                if (valorbtn == 2) {
                    $("#box-question" + valorbtn).css("visibility", "hidden");
                    valorbtn--;
                    $("#box-question" + valorbtn).css("visibility", "visible");
                    $("#btnv").css("visibility", "hidden");
                    $("#btnp").css("visibility", "visible");
                    valorbtn--;
                } else {
                    $("#box-question" + valorbtn).css("visibility", "hidden");
                    valorbtn--;
                    $("#box-question" + valorbtn).css("visibility", "visible");
                    $("#btnv").css("visibility", "visible");
                    $("#btnp").css("visibility", "visible");
                }
            });
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


            <div class="box-questions">

                <h1 class="form-title">Pesquisa de satisfação</h1>

            </div>
            <!-- ============= inicio SUGESTÃO =============-->
            <form class="form-question" method="POST" action="../index.php?pagina=SugestaoController&acao=enviarpesquisa&destino=obrigado" enctype="multipart/form-data">
                <div class="questions">

                    <input type="button" class="btnp" id="btnp">

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

                        <div id=\"box-question" . $cq . "\" class=\"box-question" . $cq . "\">
        
                        <div id=\"questionq" . $cq . "\" class=\"questionq" . $cq++ . "\">

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
        
                        " . $btnp . "
                        
                        </div>";
                        $opcao = 0;
                    }

                    ?>

                    <input type="button" class="btnv" id="btnv">

                </div>

                <input class="form-submit" type="submit" value="Enviar Pesquisa">


                <div class="div-of-form -s">.</div>

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