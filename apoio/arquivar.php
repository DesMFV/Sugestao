<?php


    $id = $_GET['id'];

    $objEx = new Matheus\Models\Sugestao();

    $objEx->tornarArquivado($id);

    header('Location: view/admin.php');

?>