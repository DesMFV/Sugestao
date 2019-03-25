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
                <form class="form-sugestao" method="POST" action="?pagina=SugestaoController&acao=enviar" enctype="multipart/form-data">


                    <h1 class="form-title">Pesquisa de satisfação</h1>


                    <?php

                    $questao = array(
                        "pergunta1" => "Qual o seu nível de satisfação em relação ao atendente?",
                        "pergunta2" => "Qual o seu nível de satisfação quanto a resolução da dúvida/problema apresentado?",
                        "pergunta3" => "Qual o seu nível de satisfação quanto ao tempo de espera para atendimento na Central do Aluno?",
                        "pergunta4" => "Qual o seu nível de satisfação quanto ao espaço físico da Central do Aluno?",
                    );

                    $q = 0;
                    $r = 0;

                    foreach ($questao as $key => $value) {

                        echo "
                <div class=\"question\">

                <label class=\"form-pergunta\" for=\"asdf\">$value</label>

                <ul class=\"question-radios\">

                    <li class=\"payment-method muito-satisfeito\">
                        <input class=\"radio-teste\" name=\"radio_respostaq" . ++$q . "\" type=\"radio\" id=\"" . ++$r . "-" . $q . "\">Muito Insatisfeito 
                        <label for=\"" . $r . "-" . $q . "\"></label>
                    </li>

                    <li class=\"payment-method pagseguro\">
                        <input class=\"radio-teste\" name=\"radio_respostaq" . $q . "\" type=\"radio\" id=\"" . ++$r . "-" . $q . "\">Parcialmente Insatisfeito 
                        <label for=\"" . $r . "-" . $q . "\"></label>
                    </li>

                    <li class=\"payment-method bankslip\">
                        <input class=\"radio-teste\" name=\"radio_respostaq" . $q . "\" type=\"radio\" id=\"" . ++$r . "-" . $q . "\">Nem Insatisfeito, Nem Satisfeito 
                        <label for=\"" . $r . "-" . $q . "\"></label>
                    </li>

                    <li class=\"payment-method bankslip\">
                        <input class=\"radio-teste\" name=\"radio_respostaq" . $q . "\" type=\"radio\" id=\"" . ++$r . "-" . $q . "\">Parcialmente Satisfeito 
                        <label class=\"label-p\" for=\"" . $r . "-" . $q . "\"></label>
                    </li>

                    <li class=\"payment-method bankslip\">
                        <input class=\"radio-teste\" name=\"radio_respostaq" . $q . "\" type=\"radio\" id=\"" . ++$r . "-" . $q . "\">Muito Satisfeito 
                        <label for=\"" . $r . "-" . $q . "\"></label>
                    </li>

                </ul>

                </div>";

                        $r = 0;
                    }


                    ?>


                    <!--

            <div class="question">

                <label class="form-legend" for="asdf">Qual o seu nível de satisfação em relação ao atendente?</label>

                <div class="form-item" id="asdf" name="assunto" requrired>

                    <input class="radio" name="radioq1" type="radio" id="r1" value="Muito Insatisfeito"><label class="labelr" for="r1">Muito Insatisfeito</label>
                    <input name="radioq1" type="radio" id="r2" value="Parcialmente Insatisfeito"><label for="r2">Parcialmente Insatisfeito</label>
                    <input name="radioq1" type="radio" id="r3" value="n-1-outro"><label for="r3">Nem Insatisfeito, Nem Satisfeito</label>
                    <input name="radioq1" type="radio" id="r4" value="Parcialmente Satisfeito"><label for="r4">Parcialmente Satisfeito</label>
                    <input name="radioq1" type="radio" id="r5" value="Muito Satisfeito"><label for="r5">Muito Satisfeito</label>

                </div>

            </div>



            <div class="question">

                <label class="form-legend" for="asdf">Qual o seu nível de satisfação em relação ao atendente?</label>

                <ul class="question-radios">

                    <li class="payment-method muito-satisfeito">
                        <input class="radio-teste" name="radio_respostaq1" type="radio" id="r1-q1">Muito Insatisfeito
                        <label for="r1-q1"></label>
                    </li>

                    <li class="payment-method pagseguro">
                        <input class="radio-teste" name="radio_respostaq1" type="radio" id="r2-q1">Parcialmente Insatisfeito
                        <label for="r2-q1"></label>
                    </li>

                    <li class="payment-method bankslip">
                        <input class="radio-teste" name="radio_respostaq1" type="radio" id="r3-q1">Nem Insatisfeito, Nem Satisfeito
                        <label for="r3-q1"></label>
                    </li>

                    <li class="payment-method bankslip">
                        <input class="radio-teste" name="radio_respostaq1" type="radio" id="r4-q1">Parcialmente Satisfeito
                        <label class="label-p" for="r4-q1"></label>
                    </li>

                    <li class="payment-method bankslip">
                        <input class="radio-teste" name="radio_respostaq1" type="radio" id="r5-q1">Muito Satisfeito
                        <label for="r5-q1"></label>
                    </li>

                </ul>

              </div>

-->
                    <input class="form-submit" type="submit" value="Enviar Pesquisa">

                </form>

                <!-- ============= fim SUGESTÃO =============-->


            </div>
            <!-- ============= fim INTERAÇÃO =============-->
            <!--============= inicio HOME =============-->


            <div class="env-env">
                <div class="div-of-form"></div>
                <div class="e-env-env">
                    <label class="link-legend">Deixe uma Sugestão ou crítica: </label>
                    <div class="env-sug">
                        <a href="../index.php" class="a-env" value="Adicionar">Adicionar</a>
                    </div>
                </div>
            </div>


            <!-- ============= fim HOME =============-->
        </div>
        <!-- ============= fim ÁREA INTERAÇÃO =============-->


    </div>

</body>

</html> 