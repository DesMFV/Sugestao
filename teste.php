<?php


$conexao = "host=localhost dbname=sug-base port=5432 user=postgres password=postgres";
$db = pg_connect($conexao); // aqui ele executa a conexão com o DNS da variavel $conexao

$query = "select * from sugestao";
$resultado = pg_query($db,$query); // Executa a query $query na conexão $db

while($linha = pg_fetch_array($resultado)) { //aqui troquei para arrays, este loop declara a variavel $linha (ela representa o resultado da query), e o loop lê linha a linha do retorno
       // Escreve na página o retorno para cada registro trazido pela query
       echo "Nome: " .$linha['nome_pessoa'] . "******************";
}

print_r($linha);die;

pg_close($db); // Fecha a conexão com a $db



?>