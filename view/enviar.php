<?php

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

## isso vai sair (a classe sugestão faz a conexão, a conexão é uma classe usada na classe sugestão)

// isso fica -->
$sug->setNome($_POST["txtNome"]);
$sug->setEmail($_POST["email"]);
$sug->setAssunto($_POST["assunto"]);
$sug->setSugestao($_POST["txtSugestao"]);
//até aqui <--


//vai resumir (classe sugestão->save())
$sug->save();