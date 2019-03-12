<?php

    $conexao = pg_connect("host=localhost port=5432 dbname=Sugestao user=postgres password=postgres");

    $n = "'".$_POST[txtNome]."'";
    $e = "'".$_POST[email]."'";
    $a = "'".$_POST[assunto]."'";
    $s = "'".$_POST[txtSugestao]."'";
    
    $Sql = "INSERT INTO SUGESTAO (SUGESTAO, EMAIL, NOME_PESSOA, ASSUNTO)
    VALUES ($s,$e,$n,$a);
    ";
    
    $teste = pg_exec($conexao, $Sql);
    
    print_r($teste);
    
    echo $Sql;

    //

?>