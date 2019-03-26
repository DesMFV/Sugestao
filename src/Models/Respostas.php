<?php

namespace Matheus\Models;

use Matheus\Conexao\Conexao;

class Opcoes 
{
    //$e = $_POST[email];
    //$a = $_POST[assunto];
    //$s = $_POST[txtSugestao];
    //$n = $_POST[txtNome];

    private $id;
    private $descricao;



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

    public function getDescricao()
    {
        return $this->descricao;
    }
    public function setDescricao($descricao_in)
    {
        $this->descricao  = $descricao_in;
    }


#=============================================== Funções de banco ============================================#

    public function selectResposta($valor)
    {
        $conexao = new Conexao();

        $dbconn = $conexao->conectar();

        pg_query($dbconn, "begin");
        
        $sql1 = "SELECT resposta_descricao FROM respostas WHERE id = '$valor'";
        $res1 = pg_query($dbconn,$sql1) or die(pg_last_error($dbconn));
        
        pg_query($dbconn, "commit");

        $this->msg = $res1;
        
        return $sql1;

    }
/*
    public function tornarExcluido($id,$arq)
    {
        $conexao = new Conexao();

        $dbconn = $conexao->conectar();

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

        $dbconn = $conexao->conectar();

        pg_query($dbconn, "begin");

        $sql1 = "UPDATE sugestao SET arquivado = TRUE WHERE id = '$id';";

        $res1 = pg_query($dbconn,$sql1) or die(pg_last_error($dbconn));
        
        pg_query($dbconn, "commit");

        $this->msg = $res1;
    }

    public function tornarResgatado($id)
    {
        $conexao = new Conexao();

        $dbconn = $conexao->conectar();

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

        $dbconn = $conexao->conectar();

        pg_query($dbconn, "begin");

        $sql1 = "DELETE FROM sugestao WHERE id = '$id';";

        $res1 = pg_query($dbconn,$sql1) or die(pg_last_error($dbconn));
        
        pg_query($dbconn, "commit");

        $this->msg = $res1;
    }

    public function pesquisa($tp)
    {
        $conexao = new Conexao();

        $dbconn = $conexao->conectar();

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

        $dbconn = $conexao->conectar();

        pg_query($dbconn, "begin");

        $query = "select * from sugestao";
        $resultado = pg_query($dbconn, $query); // Executa a query $query na conexão $db

        pg_query($dbconn, "commit");

        return $resultado;
    }

    public function listaFiltro($filtro)
    {
        $conexao = new Conexao();

        $dbconn = $conexao->conectar();

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
*/


}

 