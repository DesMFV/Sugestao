


<?php

$acao = isset($_GET['acao']) ? $_GET['acao'] : null;

$origem = $_GET['origem'];

$destino = $_GET['destino'];

   
if($acao) {
    switch($acao){

        case 'enviar':

            $sug = new Matheus\Models\Sugestao();

            if (isset($_FILES['arquivo'])) {
                $upArquivo = new Matheus\Upload\UploadImagem();
                $arq = $_FILES['arquivo'];
                $arquivo = $upArquivo->fazUpload($arq);
                $sug->setFoto($arquivo);
            } 
        
            else {
                echo "Falha no envio<br/>";
                die;
            }
        
            $sug->setNome($_POST["txtNome"]);
            $sug->setEmail($_POST["email"]);
            $sug->setAssunto($_POST["assunto"]);
            $sug->setSugestao($_POST["txtSugestao"]);
            
            include 'view/formulario.php';

            echo
        "
        <script src=\"node_modules/sweetalert2/dist/sweetalert2.js\">
        </script>"
        ;

            $sug->save();
            

        break;

        case 'excluir':

            $id = $_GET['id'];

            $arq = $GET['arq'];

            $objEx = new Matheus\Models\Sugestao();
    
            $objEx->tornarExcluido($id,$arq);
    
            header('Location: view/'.$origem.'.php');

        break;

        case 'arquivar':

            $id = $_GET['id'];

            $objEx = new Matheus\Models\Sugestao();

            $objEx->tornarArquivado($id);

            header('Location: view/'.$origem.'.php');

        break;

        case 'resgatar':

            $id = $_GET['id'];

            $objEx = new Matheus\Models\Sugestao();

            $objEx->tornarResgatado($id,$arq);

            header('Location: view/'.$origem.'.php');

        break;

        case 'deletar':

            $id = $_GET['id'];

            $objEx = new Matheus\Models\Sugestao();

            $objEx->deletar($id);

            header('Location: view/'.$origem.'.php');

        break;
    }
} else {
    include 'view/formulario.php';
}








