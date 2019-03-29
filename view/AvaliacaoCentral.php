<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pesquisa de satisfação</title>

    <link rel="stylesheet" href="../css-meu/form.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>

<body>
    <div class="pag">

        <div class="pag-banner">

        </div>
        <!-- ============= inicio ÁREA INTERAÇÃO =============-->
        <div class="pag-info">



            <!-- ============= inicio INTERAÇÃO =============-->
            <div class="box-form">



                <!-- ============= inicio SUGESTÃO =============-->
                <form class="form-sugestao" method="POST" action="../index.php?pagina=SugestaoController&acao=enviarpesquisa&destino=obrigado" enctype="multipart/form-data">


                    <h1 class="form-title">Pesquisa de satisfação</h1>


                    <?php


                    require '../vendor/autoload.php';

                    $o = new Matheus\Models\Opcoes();

                    $opcoes = array(
                       1 => $o->getOpcao(1),$o->getOpcao(2),$o->getOpcao(3), $o->getOpcao(4), $o->getOpcao(5)
                    )
                    ;

                    $p = new Matheus\Models\Perguntas();

                    $perguntas = array(
                       1 => $p->getPergunta(1),$p->getPergunta(2)
                    )
                    ;

                    $pergunta = 0;
                    $opcao = 0;
                    $cq=1;

                        foreach ($perguntas as $key => $value) {

                            ++$pergunta;

                        echo "
                <div class=\"question q-".$cq++."\">

                <label class=\"form-pergunta\" for=\"asdf\" name=\"pergunta\"> $value </label>

                <ul class=\"question-radios\">

                    <li class=\"payment-method\">
                        <input class=\"radio-teste\" value=\"1\" name=\"radio_respostaq" .$pergunta . "\" type=\"radio\" id=\"" . ++$opcao . "-" . $pergunta . "\">".$opcoes[$opcao] ."
                        <label for=\"" . $opcao . "-" . $pergunta . "\"></label>
                    </li>
                    <li class=\"payment-method\">
                        <input class=\"radio-teste\" value=\"2\" name=\"radio_respostaq" . $pergunta . "\" type=\"radio\" id=\"" . ++$opcao . "-" . $pergunta . "\">".$opcoes[$opcao]."
                        <label for=\"" . $opcao . "-" . $pergunta . "\"></label>
                    </li>

                    <li class=\"payment-method\">
                        <input class=\"radio-teste\" value=\"3\" name=\"radio_respostaq" . $pergunta . "\" type=\"radio\" id=\"" . ++$opcao . "-" . $pergunta . "\">".$opcoes[$opcao]."
                        <label for=\"" . $opcao . "-" . $pergunta . "\"></label>
                    </li>

                    <li class=\"payment-method\">
                        <input class=\"radio-teste\" value=\"4\" name=\"radio_respostaq" . $pergunta . "\" type=\"radio\" id=\"" . ++$opcao . "-" . $pergunta . "\">".$opcoes[$opcao]."
                        <label class=\"label-p\" for=\"" . $opcao . "-" . $pergunta . "\"></label>
                    </li>

                    <li class=\"payment-method\">
                        <input class=\"radio-teste\" value=\"5\" name=\"radio_respostaq" . $pergunta . "\" type=\"radio\" id=\"" . ++$opcao . "-" . $pergunta . "\">".$opcoes[$opcao]."
                        <label for=\"" . $opcao . "-" . $pergunta . "\"></label>
                    </li>

                </ul>

                </div>";
                        $opcao = 0;
                    }
                    
                    ?>

                    <input class="form-submit" type="submit" value="Enviar Pesquisa">

                </form>

                <!-- ============= fim SUGESTÃO =============-->


            </div>
            <!-- ============= fim INTERAÇÃO =============-->
            <!--============= inicio HOME =============-->


            <div class="env-env">
                <div class="div-of-form -p"></div>
                    <div class="env-sug">
                        <a href="../index.php" class="a-env" value="Adicionar">Deixe uma Sugestão ou crítica</a>
                    </div>
            </div>


            <!-- ============= fim HOME =============-->
        </div>
        <!-- ============= fim ÁREA INTERAÇÃO =============-->


    </div>

</body>

</html> 