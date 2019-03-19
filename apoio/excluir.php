<?php


    $id = $_GET['id'];
    $arq = $_GET['arq'];

    $objEx = new Matheus\Models\Sugestao();

    $objEx->tornarExcluido($id,$arq);

    header('Location: view/admin.php');


