<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>urcamp</title>
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="../css-meu/obrigado.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>

<body>
    <?php

    $alert = $_GET['pronto'];

    if ($alert == 'pesquisa') {
        echo "

        <script src=\"sweetalert2.all.min.js\"></script>
        <script src=\"https://cdn.jsdelivr.net/npm/sweetalert2@8.8.1/dist/sweetalert2.all.min.js\"></script>
        
        <script>
        Swal.fire(
            'Pronto!',
            'Respostas enviadas com sucesso.',
            'sucess'
        )
        </script>

        ";
    } else {
        echo "
        <script src=\"sweetalert2.all.min.js\"></script>
        <script src=\"https://cdn.jsdelivr.net/npm/sweetalert2@8.8.1/dist/sweetalert2.all.min.js\"></script>

        <script>
        Swal.fire(
            'Pronto!',
            'Sugestão enviada com sucesso.',
            'sucess'
        )
        </script>
        
        ";
    }
    ?>

    <div class="pag">

        <div class="pag-banner">
            <img class="banner" src="../img/obrigado-banner.png">

        </div>
        <!-- ============= inicio ÁREA INTERAÇÃO =============-->
        <div class="pag-info">



            <!-- ============= inicio INTERAÇÃO =============-->
            <div class="box-form">

                <div class="item-box">
                    <!-- ============= inicio SUGESTÃO =============-->
                    <div class="frase">
                        <label class="f1">Obrigado por sua colaboração!</label>
                        <label class="f2">Com sua ajuda, realmente somos 10.</label>
                    </div>

                    <div class="env-sug">
                        <a href="https://www.urcamp.edu.br/" class="a-env" value="Adicionar">OK</a>
                    </div>

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