


<?php



$acao = isset($_GET['acao']) ? $_GET['acao'] : null;

$origem = $_GET['origem'];

$destino = $_GET['destino'];

   
if($acao) {
    switch($acao){

        case 'enviarpesquisa':

            $rq1 = $_POST["radio_respostaq1"];
            $rq2 = $_POST["radio_respostaq2"];
            $rq3 = $_POST["radio_respostaq3"];
            $rq4 = $_POST["radio_respostaq4"];

            $respostas = new Matheus\Models\Respostas();

            echo
        "
        <script src=\"node_modules/sweetalert2/dist/sweetalert2.js\">
        </script>"
        ;

            $respostas->save($rq1,$rq2,$rq3,$rq4);


            include 'view/obrigado.php';

            

        break;


        case 'enviar':

            $sug = new Matheus\Models\Sugestao();

            
            if (isset($_FILES['arquivo'])) {
                $upArquivo = new Matheus\Upload\UploadImagem();
                $arq = $_FILES['arquivo'];
                $arquivo = $upArquivo->fazUpload($arq);
                $sug->setFoto($arquivo);
            } 
        
            $sug->setNome($_POST["txtNome"]);
            $sug->setEmail($_POST["email"]);
            $sug->setAssunto($_POST["assunto"]);
            $sug->setSugestao($_POST["txtSugestao"]);
            
            include 'view/obrigado.php';

            echo
        "
        <script src=\"node_modules/sweetalert2/dist/sweetalert2.js\">
        </script>"
        ;

            $sug->save();
            

        break;

        case 'excluir':

            $id = $_GET['id'];

            $filtro = $_GET['filtro'];

            $arq = isset($_GET['arq'])?$_GET['arq']:'f';

            $objEx = new Matheus\Models\Sugestao();
    
            $objEx->tornarExcluido($id,$arq);

            if(isset($_GET['texto-pesquisa'])){
                $tp = $_GET['texto-pesquisa'];
                header('Location: view/'.$origem.'.php'.'?texto-pesquisa='.$tp);
            }

            else{
                header('Location: view/'.$origem.'.php'.'?filtro='.$filtro);
            }

        break;

        case 'arquivar':

            $id = $_GET['id'];

            $filtro = $_GET['filtro'];

            $objEx = new Matheus\Models\Sugestao();

            $objEx->tornarArquivado($id);

            if(isset($_GET['texto-pesquisa'])){
                $tp = $_GET['texto-pesquisa'];
                header('Location: view/'.$origem.'.php'.'?texto-pesquisa='.$tp);
            }

            else{
                header('Location: view/'.$origem.'.php'.'?filtro='.$filtro);
            }

        break;

        case 'resgatar':

            $id = $_GET['id'];

            $filtro = $_GET['filtro'];

            $objEx = new Matheus\Models\Sugestao();

            $objEx->tornarResgatado($id,$arq);

            if(isset($_GET['texto-pesquisa'])){
                $tp = $_GET['texto-pesquisa'];
                header('Location: view/'.$origem.'.php'.'?texto-pesquisa='.$tp);
            }

            else{
                header('Location: view/'.$origem.'.php'.'?filtro='.$filtro);
            }

        break;
    }
} else {
    include 'view/formulario.php';
}








