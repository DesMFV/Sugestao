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
       /* $(document).ready(

            function() {
                $("#btnp2").css("visibility", "hidden");
                $("#btnp3").css("visibility", "hidden");
                $("#btnp4").css("visibility", "hidden");
                $("#btnv2").css("visibility", "hidden");
                $("#btnv3").css("visibility", "hidden");
                $("#btnv4").css("visibility", "hidden");
                $("#box-question2").css("visibility", "hidden");
                $("#box-question3").css("visibility", "hidden");
                $("#box-question4").css("visibility", "hidden");

            }
        );

        $(function() {

            $("#btnp1").click(function() {

                $("#box-question1").css("visibility", "hidden");
                $("#box-question2").css("visibility", "visible");
                $("#btnp1").css("visibility", "hidden");
                $("#btnp2").css("visibility", "visible");
                $("#btnv2").css("visibility", "visible");

            });

            $("#btnv2").click(function() {

                $("#box-question1").css("visibility", "visible");
                $("#box-question2").css("visibility", "hidden");
                $("#btnp1").css("visibility", "visible");
                $("#btnp2").css("visibility", "hidden");
                $("#btnv2").css("visibility", "hidden");

            });

            $("#btnp2").click(function() {

                $("#box-question1").css("visibility", "hidden");
                $("#box-question2").css("visibility", "hidden");
                $("#box-question3").css("visibility", "visible");
                $("#btnp1").css("visibility", "hidden");
                $("#btnp2").css("visibility", "hidden");
                $("#btnv2").css("visibility", "hidden");
                $("#btnp3").css("visibility", "visible");
                $("#btnv3").css("visibility", "visible");

            });

            $("#btnv3").click(function() {

                $("#box-question1").css("visibility", "hidden");
                $("#box-question2").css("visibility", "visible");
                $("#box-question3").css("visibility", "hidden");
                $("#btnp1").css("visibility", "hidden");
                $("#btnp2").css("visibility", "visible");
                $("#btnv2").css("visibility", "visible");
                $("#btnp3").css("visibility", "hidden");
                $("#btnv3").css("visibility", "hidden");

            });

            $("#btnp3").click(function() {

                $("#box-question1").css("visibility", "hidden");
                $("#box-question2").css("visibility", "hidden");
                $("#box-question3").css("visibility", "hidden");
                $("#box-question4").css("visibility", "visible");
                $("#btnp1").css("visibility", "hidden");
                $("#btnp2").css("visibility", "hidden");
                $("#btnv2").css("visibility", "hidden");
                $("#btnp3").css("visibility", "hidden");
                $("#btnv3").css("visibility", "hidden");
                $("#btnv4").css("visibility", "visible");

            });

            $("#btnv4").click(function() {

                $("#box-question1").css("visibility", "hidden");
                $("#box-question2").css("visibility", "hidden");
                $("#box-question3").css("visibility", "visible");
                $("#box-question4").css("visibility", "hidden");
                $("#btnp1").css("visibility", "hidden");
                $("#btnp2").css("visibility", "hidden");
                $("#btnv2").css("visibility", "hidden");
                $("#btnp3").css("visibility", "visible");
                $("#btnv3").css("visibility", "visible");
                $("#btnv4").css("visibility", "hidden");

            });





        });*/
    </script>

</head>

<body>
    <div class="pag">



        <div class="pag-banner">
            <img class="banner" src="../img/obrigado-banner.png">
        </div>



        <!-- ============= inicio ÁREA INTERAÇÃO =============-->




        <!-- ============= inicio INTERAÇÃO =============-->


        <div class="box-questions">

            <h1 class="form-title">Pesquisa de satisfação</h1>

        </div>
        <!-- ============= inicio SUGESTÃO =============-->
        <form class="form-question" method="POST" action="../index.php?pagina=SugestaoController&acao=enviarpesquisa&destino=obrigado" enctype="multipart/form-data">
            <div class="questions">

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

                    if ($cq > 3) {
                        $btnp = '';
                    } else {
                        $btnp = "<input type=\"button\" class=\"btnp" . $cq . "\" 
                            id=\"btnp" . $cq . "\" Value=\"Próxima questão\">";
                    }
                    if ($cq > 1) {
                        $btnv = "<input type=\"button\" class=\"btnv" . $cq . "\" 
                            id=\"btnv" . $cq . "\" Value=\"Questão anterior\">";
                    } else {
                        $btnv = '';
                    }


                    echo "

                        <div id=\"box-question" . $cq . "\" class=\"box-question" . $cq . "\">

                        " . $btnv . "
        
                        <div id=\"questionq" . $cq . "\" class=\"questionq" . $cq++ . "\">

                        <label class=\"form-pergunta\" for=\"asdf\" name=\"pergunta\"> $value </label>

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
        
                        " . $btnp . "
                        
                        </div>";
                    $opcao = 0;
                }

                ?>

            </div>

            <input class="form-submit" type="submit" value="Enviar Pesquisa">





        </form>

        <!-- ============= fim SUGESTÃO =============-->



        <!-- ============= fim INTERAÇÃO =============-->
        <!--============= inicio HOME =============-->



        <!-- ============= fim ÁREA INTERAÇÃO =============-->


    </div>

</body>

</html> 