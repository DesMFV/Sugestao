<?php

namespace Matheus\Upload;

class UploadImagem
{

  public $tempName;
  public $destinationPath;
  public $name;
  public $size;
  public $type;
  public $error;

#====================================  upload antigo ================================== #
   public function fazUpload($arquivo)
  {

   
    // Pasta onde o arquivo vai ser salvo
    $_UP['pasta'] = 'uploads/';
    // Tamanho máximo do arquivo (em Bytes)
    $_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb
    // Array com as extensões permitidas
    $_UP['extensoes'] = array('jpg', 'png', 'gif');
    // Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
    $_UP['renomeia'] = false;
    // Array com os tipos de erros de upload do PHP
    $_UP['erros'][0] = 'Não houve erro';
    $_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
    $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
    $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
    $_UP['erros'][4] = 'Não foi feito o upload do arquivo';
    // Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
    if ($arquivo['error'] != 0) {
      die("Não foi possível fazer o upload, erro:" . $_UP['erros'][$arquivo['error']]);
      exit; // Para a execução do script
    }
    // Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
    // Faz a verificação da extensão do arquivo

    $nome = $arquivo['name'];

    $extensao = strtolower(end(explode('.', $nome)));
    if (array_search($extensao, $_UP['extensoes']) === false) {
      echo "Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif";
      exit;
    }
    // Faz a verificação do tamanho do arquivo
    if ($_UP['tamanho'] < $arquivo['size']) {
      echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
      exit;
    }
    // O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
    // Primeiro verifica se deve trocar o nome do arquivo
    if ($_UP['renomeia'] == true) {
      // Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
      $nome_final = md5(time()) . '.jpg';
    } else {
      // Mantém o nome original do arquivo
      $nome_final = $arquivo['name'];
    }

    // Depois verifica se é possível mover o arquivo para a pasta escolhida
    if (move_uploaded_file($arquivo['tmp_name'], $_UP['pasta'] . $nome_final)) {
      // Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
      echo "Upload efetuado com sucesso!";
      echo '<a href="' . $_UP['pasta'] . $nome_final . '">Clique aqui para acessar o arquivo</a>';
    } else {
      // Não foi possível fazer o upload, provavelmente a pasta está incorreta
      echo "Não foi possível enviar o arquivo, tente novamente";
    }

    return $_UP['pasta'] . $nome_final; 


#====================================   Upload - 01  ================================== #


  /*
  function UploadArquivo($arquivo, $pasta, $tipos)
  {
    if (isset($arquivo)) {
        $nomeOriginal = $arquivo["name"];
        $nomeFinal = md5($nomeOriginal . date("dmYHis"));
        $tipo = strrchr($arquivo["name"], ".");
        $tamanho = $arquivo["size"];

        for ($i = 0; $i <= count($tipos); $i++) {
            if ($tipos[$i] == $tipo) {
                $arquivoPermitido = true;
              }
          }

        if ($arquivoPermitido == false) {
            echo "Extensão de arquivo não permitido!!";
            exit;
          }

        if (move_uploaded_file($arquivo["tmp_name"], $pasta . $nomeFinal . $tipo)) {
            $this->nome = $pasta . $nomeFinal . $tipo;
            $this->tipo = $tipo;
            $this->tamanho = number_format($arquivo["size"] / 1024, 2) . "KB";
            return true;
          } else {
          return false;
        }
      }
  }
  */
#====================================   Upload - 02  ================================== #

/*
  // getetrs e setters

  public function getTempName()
  {
    return $this->tempName;
  }
  public function setEmail($email_in)
  {
    $this->email  = $email_in;
  }


*/
  }

}

