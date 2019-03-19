<?php

require __DIR__ . '/vendor/autoload.php';

$conexao = "host=localhost dbname=sug-base port=5432 user=postgres password=postgres";
$db = pg_connect($conexao); // aqui ele executa a conexão com o DNS da variavel $conexao

$query = "select * from sugestao";
$resultado = pg_query($db, $query); // Executa a query $query na conexão $db

$ind = 0;


while ($linha = pg_fetch_array($resultado)) { //aqui troquei para arrays, este loop declara a variavel $linha (ela representa o resultado da query), e o loop lê linha a linha do retorno
    // Escreve na página o retorno para cada registro trazido pela query
    
        $obj = new Matheus\Models\Sugestao();

        $obj->setId($linha['id']);
        $obj->setAssunto($linha['assunto']);
        $obj->setSugestao($linha['sugestao']);
        $obj->setNome($linha['nome_pessoa']);
        $obj->setEmail($linha['email']);
        $i = '../' . $linha['imagem'];
        $obj->setFoto($i);

        //$ides = array($ind => $id);

        //echo $ides[$ind]."##########";
        //$ind++;

        echo "*********".$obj->getId()."*********"; continue;

        echo ' <tr>
              <td>' . "$obj->getId()" . '</td>
              <td>' . "$obj->getAssunto()" . '</td>
              <td>' . "$obj->getSugestao()" . '</td>
              <td>' . "$obj->getNome()" . '</td>
              <td>' . "$obj->getEmail()" . '</td>
              <td class="td-img-tb">' . "<img class='img-table' src='$i'>" . '</td>

              <td class="td-ex-tb">

              
              <a href="admin.php?pagina=excluir&?id="'."$obj->getId()".'">
              

              <form method="POST" action="?pagina=arquivar&?id="$id">
              <input type="submit" class="btn-tb" href="arquivar.php">
              <img class="i-ex"src="../img/arquivar.png">
              </form>

              </td>
            </tr> ';
        
    }

pg_close($db); // Fecha a conexão com a $db

?>