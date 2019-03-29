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
                $("#btnp2").css("visibility", "hidden");
                $("#btnp3").css("visibility", "hidden");
                $("#btnp4").css("visibility", "hidden");
            }
        );

        $(function() {

            $("#btnp1").click(function() {

                $("#questionq1").css("visibility", "hidden");
                $("#questionq2").css("visibility", "visible");
                $("#btnp1").css("visibility", "hidden");
                $("#btnp2").css("visibility", "visible");

            });

            $("#btnp2").click(function() {

                $("#questionq1").css("visibility", "hidden");
                $("#questionq2").css("visibility", "hidden");
                $("#questionq3").css("visibility", "visible");
                $("#btnp1").css("visibility", "hidden");
                $("#btnp2").css("visibility", "hidden");
                $("#btnp3").css("visibility", "visible");

            });

        });
    </script>

</head>

<body>
    <div class="pag">

        <div class="pag-banner">

        </div>
        <!-- ============= inicio ÁREA INTERAÇÃO =============-->
        <div class="pag-info">



            <!-- ============= inicio INTERAÇÃO =============-->
            <div class="box-form">

                <div class="item-box">
                    <!-- ============= inicio SUGESTÃO =============-->
                    <form class="form-sugestao" method="POST" action="../index.php?pagina=SugestaoController&acao=enviarpesquisa&destino=obrigado" enctype="multipart/form-data">


                        <h1 class="form-title">Pesquisa de satisfação</h1>

                        <div class="position-q"></div>


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
                        $proximaQuestao = 1;

                        foreach ($perguntas as $key => $value) {

                            ++$pergunta;

                            echo "

        
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
        
        <input type=\"button\" class=\"btnp" . $proximaQuestao . "\" id=\"btnp" . $proximaQuestao++ . "\" Value=\"Próxima questão\">

        ";
                            $opcao = 0;
                        }

                        ?>



                        <input class="form-submit" type="submit" value="Enviar Pesquisa">





                    </form>

                    <!-- ============= fim SUGESTÃO =============-->
                </div>

            </div>
            <!-- ============= fim INTERAÇÃO =============-->
            <!--============= inicio HOME =============-->


        </div>
        <!-- ============= fim ÁREA INTERAÇÃO =============-->


    </div>

</body>

</html> 