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
        var valorbtnsalvo;
        var valorcheckedsalvo = 0;
        var visibility;
        var vchecked;
        var questoesRespondidas = 0;

        //============================================= recarga da página =============================================

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

                var valorbtn = 0;
                var checked = 0;

                if (window.innerWidth >= 900) {
                    $("#btnp").click(function() {
                        if (checked == 0) {
                            checked = 1;
                            $("#box-question" + checked).css("visibility", "hidden");
                            $("#btnp").css("visibility", "visible");
                            checked++;
                            $("#box-question" + checked).css("visibility", "visible");
                            $("#btnv").css("visibility", "visible");
                        } else if (checked < 3) {
                            $("#box-question" + checked).css("visibility", "hidden");
                            checked++;
                            $("#box-question" + checked).css("visibility", "visible");
                        } else if (checked == 3) {
                            $("#btnp").css("visibility", "hidden");
                            $("#box-question" + checked).css("visibility", "hidden");
                            checked++;
                            $("#box-question" + checked).css("visibility", "visible");
                            $(".form-submit").css("visibility", "visible");
                        } else {
                            checked = 1;
                            $("#box-question" + checked).css("visibility", "hidden");
                            $("#btnp").css("visibility", "visible");
                            checked++;
                            $("#box-question" + checked).css("visibility", "visible");
                            $("#btnv").css("visibility", "visible");
                        }
                    });
                }

                var checked = 1;
                var valorbtn = 1;
                $(".radio-teste").click(function() {
                    if (window.innerWidth >= 900) {

                        if (checked < 5) {

                            window.setTimeout(function radioProxima() {
                                if (checked == 1 && questoesRespondidas == 0) {
                                    $("#box-question" + checked).css("visibility", "hidden");
                                    checked++;
                                    valorbtnsalvo = valorbtn;
                                    $("#box-question" + checked).css("visibility", "visible");
                                    valorcheckedsalvo = checked;
                                } else if (checked < 3 && questoesRespondidas == 0) {
                                    $("#box-question" + checked).css("visibility", "hidden");
                                    checked++;
                                    $("#box-question" + checked).css("visibility", "visible");
                                    valorcheckedsalvo = checked;
                                } else if (checked == 3 && questoesRespondidas == 0) {
                                    $("#btnp").css("visibility", "hidden");
                                    $("#box-question" + checked).css("visibility", "hidden");
                                    checked++;
                                    $("#box-question" + checked).css("visibility", "visible");
                                    valorcheckedsalvo = checked;
                                    valorgeral = valorbtn;
                                } else if (checked == 4 && questoesRespondidas == 0) {
                                    $(".form-submit").css("visibility", "visible");
                                    questoesRespondidas = 1;
                                    valorcheckedsalvo = checked;
                                    $("#btnv").css("visibility", "visible");
                                }
                            }, 560);

                        }
                    } else {
                        if (checked != 4) {
                            valorbtn++;
                            valorbtnsalvo = valorbtn;
                            checked++;
                            valorcheckedsalvo = checked;
                        }
                    }
                });

                $("#btnv").click(function() {
                    if (window.innerWidth >= 900) {
                        if (checked == 4) {
                            $("#box-question" + checked).css("visibility", "hidden");
                            checked--;
                            $("#box-question" + checked).css("visibility", "visible");
                            $("#btnp").css("visibility", "visible");
                            $(".form-submit").css("visibility", "hidden");
                        } else if (checked == 0) {
                            checked--;
                            $("#btnv").css("visibility", "hidden");
                            checked = 4;
                        } else if (checked == 2) {
                            $("#box-question" + checked).css("visibility", "hidden");
                            checked--;
                            $("#box-question" + checked).css("visibility", "visible");
                            $("#btnv").css("visibility", "hidden");
                            checked = 4;
                        } else {
                            $("#box-question" + checked).css("visibility", "hidden");
                            checked--;
                            $("#box-question" + checked).css("visibility", "visible");
                        }
                    }
                });


                //============================================= resize da página =============================================

                $(window).on('resize',

                    function() {

                        //inicia todos como invisíveis
                        $("#btnp").css("visibility", "hidden");
                        $("#btnv").css("visibility", "hidden");
                        $(".form-submit").css("visibility", "hidden");
                        $("#box-question1").css("visibility", "hidden");
                        $("#box-question2").css("visibility", "hidden");
                        $("#box-question3").css("visibility", "hidden");
                        $("#box-question4").css("visibility", "hidden");

                        // teste a próxima questão se a resolução for desktop
                        if (window.innerWidth > 899) {
                            var visao = vchecked + 1;
                            $("#box-question" + visao).css("visibility", "visible");

                            $(".radio-teste").click(function() {
                                if (window.innerWidth >= 900) {

                                    window.setTimeout(function radioProxima() {
                                        if (visao == 1 && questoesRespondidas == 0) {
                                            $("#box-question" + checked).css("visibility", "hidden");
                                            visao++;
                                            valorbtnsalvo = valorbtn;
                                            $("#box-question" + visao).css("visibility", "visible");
                                            valorcheckedsalvo = visao;
                                        } else if (visao < 3 && questoesRespondidas == 0) {
                                            $("#box-question" + visao).css("visibility", "hidden");
                                            visao++;
                                            $("#box-question" + visao).css("visibility", "visible");
                                            valorcheckedsalvo = checked;
                                        } else if (visao == 3 && questoesRespondidas == 0) {
                                            $("#btnp").css("visibility", "hidden");
                                            $("#box-question" + visao).css("visibility", "hidden");
                                            visao++;
                                            $("#box-question" + visao).css("visibility", "visible");
                                            valorcheckedsalvo = checked;
                                            valorgeral = valorbtn;
                                        } else if (visao == 4 && questoesRespondidas == 0) {
                                            $(".form-submit").css("visibility", "visible");
                                            questoesRespondidas = 1;
                                            valorcheckedsalvo = checked;
                                            $("#btnv").css("visibility", "visible");
                                        }
                                    }, 560);
                                }
                            });

                            $("#btnp").click(function() {
                                if (visao == 0) {
                                    visao = 1;
                                    $("#box-question" + visao).css("visibility", "hidden");
                                    $("#btnp").css("visibility", "visible");
                                    visao++;
                                    $("#box-question" + visao).css("visibility", "visible");
                                    $("#btnv").css("visibility", "visible");
                                } else if (visao < 3) {
                                    $("#box-question" + visao).css("visibility", "hidden");
                                    visao++;
                                    $("#box-question" + visao).css("visibility", "visible");
                                } else if (visao == 3) {
                                    $("#btnp").css("visibility", "hidden");
                                    $("#box-question" + visao).css("visibility", "hidden");
                                    visao++;
                                    $("#box-question" + visao).css("visibility", "visible");
                                    $(".form-submit").css("visibility", "visible");
                                } else {
                                    visao = 1;
                                    $("#box-question" + visao).css("visibility", "hidden");
                                    $("#btnp").css("visibility", "visible");
                                    visao++;
                                    $("#box-question" + visao).css("visibility", "visible");
                                    $("#btnv").css("visibility", "visible");
                                }
                            });


                            $("#btnv").click(function() {
                                if (window.innerWidth >= 900) {
                                    if (vchecked == 4) {
                                        $("#box-question" + vchecked).css("visibility", "hidden");
                                        vchecked--;
                                        $("#box-question" + vchecked).css("visibility", "visible");
                                        $("#btnp").css("visibility", "visible");
                                        $(".form-submit").css("visibility", "hidden");
                                        console.log(vchecked);
                                    } else if (vchecked == 0) {
                                        vchecked--;
                                        $("#btnv").css("visibility", "hidden");
                                        vchecked = 4;
                                    } else if (vchecked == 2) {
                                        $("#box-question" + vchecked).css("visibility", "hidden");
                                        vchecked--;
                                        $("#box-question" + vchecked).css("visibility", "visible");
                                        $("#btnv").css("visibility", "hidden");
                                        console.log(vchecked);

                                    } else {
                                        $("#box-question" + vchecked).css("visibility", "hidden");
                                        vchecked--;
                                        $("#box-question" + vchecked).css("visibility", "visible");
                                        console.log(vchecked);
                                    }
                                }

                            });
                        }


                        // deixa todas visíveis se a resolução for mobile
                        else {

                            $("#btnp").css("visibility", "visible");
                            $("#btnv").css("visibility", "visible");
                            $(".form-submit").css("visibility", "visible");
                            $("#box-question1").css("visibility", "visible");
                            $("#box-question2").css("visibility", "visible");
                            $("#box-question3").css("visibility", "visible");
                            $("#box-question4").css("visibility", "visible");
                            $("#btnv").css("visibility", "hidden");
                            $("#btnp").css("visibility", "hidden");

                            $(".radio-teste").click(function() {
                                // variável para saber qual questão foi respondida
                                vchecked = parseInt($(this).attr('name'));
                                console.log(vchecked);
                            });
                        }
                    });

            });


        /*
                        var valorbtn = 0;
                        var checked = 0;

                        if (window.innerWidth >= 900) {
                            $("#btnp").click(function() {
                                if (checked == 0) {
                                    checked = 1;
                                    $("#box-question" + checked).css("visibility", "hidden");
                                    $("#btnp").css("visibility", "visible");
                                    checked++;
                                    $("#box-question" + checked).css("visibility", "visible");
                                    $("#btnv").css("visibility", "visible");
                                } else if (checked < 3) {
                                    $("#box-question" + checked).css("visibility", "hidden");
                                    checked++;
                                    $("#box-question" + checked).css("visibility", "visible");
                                } else if (checked == 3) {
                                    $("#btnp").css("visibility", "hidden");
                                    $("#box-question" + checked).css("visibility", "hidden");
                                    checked++;
                                    $("#box-question" + checked).css("visibility", "visible");
                                    $(".form-submit").css("visibility", "visible");
                                } else {
                                    checked = 1;
                                    $("#box-question" + checked).css("visibility", "hidden");
                                    $("#btnp").css("visibility", "visible");
                                    checked++;
                                    $("#box-question" + checked).css("visibility", "visible");
                                    $("#btnv").css("visibility", "visible");
                                }
                            });
                        } else {
                            valorbtn = 0;
                            checked = 0;
                        }



                        $("#btnv").click(function() {
                            if (window.innerWidth >= 900) {
                                if (checked == 4) {
                                    questoesRespondidas = 1;
                                    $("#box-question" + checked).css("visibility", "hidden");
                                    checked--;
                                    $("#box-question" + checked).css("visibility", "visible");
                                    $("#btnp").css("visibility", "visible");
                                    $(".form-submit").css("visibility", "hidden");
                                } else if (checked == 0) {
                                    checked--;
                                    $("#btnv").css("visibility", "hidden");
                                    checked = 4;
                                } else if (checked == 2) {
                                    $("#box-question" + checked).css("visibility", "hidden");
                                    checked--;
                                    $("#box-question" + checked).css("visibility", "visible");
                                    $("#btnv").css("visibility", "hidden");
                                    checked = 4;
                                } else {
                                    $("#box-question" + checked).css("visibility", "hidden");
                                    checked--;
                                    $("#box-question" + checked).css("visibility", "visible");
                                }
                            }
                        });

                    }
                );
                }
                );
                */
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
                            <input class=\"radio-teste\" value=\"1\" name=\"$pergunta\" type=\"radio\" id=\"" . ++$opcao . "-" . $pergunta . "\">" . $opcoes[$opcao] . "
                            <label for=\"" . $opcao . "-" . $pergunta . "\"></label>
                        </li>
                        <li class=\"payment-method\">
                            <input class=\"radio-teste\" value=\"2\" name=\"$pergunta\" type=\"radio\" id=\"" . ++$opcao . "-" . $pergunta . "\">" . $opcoes[$opcao] . "
                            <label for=\"" . $opcao . "-" . $pergunta . "\"></label>
                        </li>

                        <li class=\"payment-method\">
                            <input class=\"radio-teste\" value=\"3\" name=\"$pergunta\" type=\"radio\" id=\"" . ++$opcao . "-" . $pergunta . "\">" . $opcoes[$opcao] . "
                            <label for=\"" . $opcao . "-" . $pergunta . "\"></label>
                        </li>

                        <li class=\"payment-method\">
                            <input class=\"radio-teste\" value=\"4\" name=\"$pergunta\" type=\"radio\" id=\"" . ++$opcao . "-" . $pergunta . "\">" . $opcoes[$opcao] . "
                            <label class=\"label-p\" for=\"" . $opcao . "-" . $pergunta . "\"></label>
                        </li>

                        <li class=\"payment-method\">
                            <input class=\"radio-teste\" value=\"5\" name=\"$pergunta\" type=\"radio\" id=\"" . ++$opcao . "-" . $pergunta . "\">" . $opcoes[$opcao] . "
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