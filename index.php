<?php
require __DIR__ . '/vendor/autoload.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="css/site-core.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>

<body>

    <?php
    $acao = isset($_GET['pagina']) ? $_GET['pagina'] : null;
    if($acao) {
        include "view/{$acao}.php";
    } else {
        include 'view/formulario.php';
    }
    ?>

</body>

</html>