


<?php



$acao = isset($_GET['acao']) ? $_GET['acao'] : null;

$origem = $_GET['origem'];

$destino = $_GET['destino'];

   
if($acao) {
    switch($acao){

        case 'enviarpesquisa':

            $rq1 = $_POST["1"];
            $rq2 = $_POST["2"];
            $rq3 = $_POST["3"];
            $rq4 = $_POST["4"];

            $respostas = new Matheus\Models\Respostas();

            $respostas->save($rq1,$rq2,$rq3,$rq4);

            header('Location: view/obrigado.php?pronto=pesquisa');

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

            $sug->save();

            header('Location: view/obrigado.php?pronto=sugestao');

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

        case 'mail':

            $assunto = $_GET['assunto'];
            $sugestao = $_GET['sugestao'];
            $nome = $_GET['nome'];
            $emial = $_GET['email'];

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








