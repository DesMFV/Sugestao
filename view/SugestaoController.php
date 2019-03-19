<?php
$acao = isset($_GET['acao']) ? $_GET['acao'] : null;
    
if($acao) {
    switch($acao){

        case 'excluir':

            $id = $_GET['id'];

            $objEx = new Matheus\Models\Sugestao();
    
            $objEx->tornarExcluido($id);
    
            header('Location: view/admin.php');

        break;

        case 'arquivar':

            $id = $_GET['id'];

            $objEx = new Matheus\Models\Sugestao();

            $objEx->tornarArquivado($id);

            header('Location: view/admin.php');

        break;

        case 'resgatar':

            $id = $_GET['id'];

            $objEx = new Matheus\Models\Sugestao();

            $objEx->tornarResgatado($id);

            header('Location: view/admin.php');

        break;

        case 'deletar':



        break;

    }
} else {
    include 'view/formulario.php';
}
?>