<?php

namespace Matheus\Models;

use Matheus\Conexao\Conexao;

class Admin 
{
    //$e = $_POST[email];
    //$a = $_POST[assunto];
    //$s = $_POST[txtSugestao];
    //$n = $_POST[txtNome];

    private $id;
    private $nome;
    private $assunto;
    private $sugestao;
    private $nome_ps;
    private $foto;
    private $msg;



#=============================================== getters e setters ============================================#

    public function getId()
    {
        return $this->id;
    }
    public function setId($id_in)
    {
        $this->id  = $id_in;
    }

    //============= getter setter Email ==============

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email_in)
    {
        $this->email  = $email_in;
    }

    //============= getter setter Assunto ==============

    public function getAssunto()
    {
        return $this->assunto;
    }
    public function setAssunto($assunto_in)
    {
        $this->assunto  = $assunto_in;
    }

    //============= getter setter Sugestao ==============

    public function getSugestao()
    {
        return $this->sugestao;
    }
    public function setSugestao($sugestao_in)
    {
        $this->sugestao  = $sugestao_in;
    }

    //============= getter setter Nome ==============

    public function getNome()
    {
        return $this->nome_ps;
    }
    public function setNome($nome_in)
    {
        $this->nome_ps  = $nome_in;
    }

    //============= getter setter Foto ==============

    public function getFoto()
    {
        return $this->foto;
    }
    public function setFoto($foto_in)
    {
        $this->foto  = $foto_in;
    }



#=============================================== Funções de banco ============================================#

    public function save()
    {
        $conexao = new Conexao();

        $dbconn = $conexao->conectar();

        pg_query($dbconn, "begin");
        
        $s = $this->sugestao;
        $e = $this->email;
        $n = $this->nome_ps;
        $a = $this->assunto;
        $ex = 0;
        $arq = 0;

        $img = $this->foto;
        
        $sql1 = "insert into sugestao (imagem,sugestao,email,nome_pessoa,assunto,excluido,arquivado)values('$img','$s','$e','$n','$a','$ex', '$arq')";
        $res1 = pg_query($dbconn,$sql1) or die(pg_last_error($dbconn));
        
        pg_query($dbconn, "commit");

        $this->msg = $res1;
        
        echo
        "<script>
        Swal.fire(
            'Sugestão enviada com sucesso!',
            '',
            'sucess'
        )
        </script>"
        ;

    }