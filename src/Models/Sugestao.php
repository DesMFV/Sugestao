<?php

namespace Matheus\Models;

use Matheus\Conexao\Conexao;

class Sugestao 
{
    //$e = $_POST[email];
    //$a = $_POST[assunto];
    //$s = $_POST[txtSugestao];
    //$n = $_POST[txtNome];

    private $id;
    private $email;
    private $assunto;
    private $arquivado;
    private $excluido;
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

        $base = "sug-base";

        $dbconn = $conexao->conectar($base);

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
            'Pronto!',
            'Sugestão enviada com sucesso.',
            'sucess'
        )
        </script>"
        ;

    }

    public function tornarExcluido($id,$arq)
    {
        $conexao = new Conexao();

        $base = "sug-base";

        $dbconn = $conexao->conectar($base);

        pg_query($dbconn, "begin");

        if($arq == 't'){

            $sql1 = "UPDATE sugestao SET excluido = TRUE, arquivado = FALSE WHERE id = '$id';";

            $res1 = pg_query($dbconn,$sql1) or die(pg_last_error($dbconn));
        
            pg_query($dbconn, "commit");

        }
        else{

            $sql1 = "UPDATE sugestao SET excluido = TRUE WHERE id = '$id';";

            $res1 = pg_query($dbconn,$sql1) or die(pg_last_error($dbconn));
        
            pg_query($dbconn, "commit");

        }

        $this->msg = $res1;

        echo
        "<script>
        Swal.fire(
            'Registro de tal tal excluido com sucesso!',
            '',
            'sucess'
        )
        </script>"
        ; 
    }

    public function tornarArquivado($id)
    {
        $conexao = new Conexao();

        $base = "sug-base";

        $dbconn = $conexao->conectar($base);

        pg_query($dbconn, "begin");

        $sql1 = "UPDATE sugestao SET arquivado = TRUE WHERE id = '$id';";

        $res1 = pg_query($dbconn,$sql1) or die(pg_last_error($dbconn));
        
        pg_query($dbconn, "commit");

        $this->msg = $res1;
    }

    public function tornarResgatado($id)
    {
        $conexao = new Conexao();

        $base = "sug-base";

        $dbconn = $conexao->conectar($base);

        pg_query($dbconn, "begin");
        
            $sql1 = "UPDATE sugestao SET excluido = FALSE, arquivado = FALSE WHERE id = '$id';";

            $res1 = pg_query($dbconn,$sql1) or die(pg_last_error($dbconn));
        
            pg_query($dbconn, "commit");

        $this->msg = $res1;

        echo
        "<script>
        Swal.fire(
            'Registro de tal tal excluido com sucesso!',
            '',
            'sucess'
        )
        </script>"
        ; 
    }

    public function deletar($id)
    {
        $conexao = new Conexao();

        $base = "sug-base";

        $dbconn = $conexao->conectar($base);

        pg_query($dbconn, "begin");

        $sql1 = "DELETE FROM sugestao WHERE id = '$id';";

        $res1 = pg_query($dbconn,$sql1) or die(pg_last_error($dbconn));
        
        pg_query($dbconn, "commit");

        $this->msg = $res1;
    }

    public function pesquisa($tp)
    {
        $conexao = new Conexao();

        $base = "sug-base";

        $dbconn = $conexao->conectar($base);

        $sql1 = "SELECT * FROM sugestao WHERE id::varchar = '$tp'
        OR sugestao ilike '%$tp%' 
        OR email ilike '%$tp%' 
        OR nome_pessoa ilike '%$tp%' 
        OR assunto ilike '%$tp%';";

        $res1 = pg_query($dbconn,$sql1) or die(pg_last_error($dbconn));
        
        pg_query($dbconn, "commit");

        return $res1;
    }

    public function listAll()
    {
        $conexao = new Conexao();

        $base = "sug-base";

        $dbconn = $conexao->conectar($base);;

        pg_query($dbconn, "begin");

        $query = "select * from sugestao";
        $resultado = pg_query($dbconn, $query); // Executa a query $query na conexão $db

        pg_query($dbconn, "commit");

        return $resultado;
    }

    public function listaFiltro($filtro)
    {
        $conexao = new Conexao();

        $base = "sug-base";

        $dbconn = $conexao->conectar($base);

        pg_query($dbconn, "begin");

        if($filtro=='Entrada'){

            $query = "SELECT * FROM sugestao WHERE excluido = 'f' AND arquivado = 'f'";
            $resultado = pg_query($dbconn, $query); // Executa a query $query na conexão $db

            pg_query($dbconn, "commit");

            return $resultado;
        }

        else if($filtro=='Arquivadas'){
            $query = "SELECT * FROM sugestao WHERE arquivado = 't' ";
            $resultado = pg_query($dbconn, $query); // Executa a query $query na conexão $db

            pg_query($dbconn, "commit");

            return $resultado;
        }

        else{
            $query = "SELECT * FROM sugestao WHERE excluido = 't' ";
            $resultado = pg_query($dbconn, $query); // Executa a query $query na conexão $db

            pg_query($dbconn, "commit");

            return $resultado;
        }
    }



}

 