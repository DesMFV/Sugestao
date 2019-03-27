<?php

namespace Matheus\Models;

use Matheus\Conexao\Conexao;

class Respostas 
{
    private $id;
    private $data;
    private $pergunta;
    private $opcao;


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

    public function getData()
    {
        return $this->data;
    }
    public function setData($data_in)
    {
        $this->data  = $data_in;
    }

    //============= getter setter pergunta ==============

    public function getPergunta()
    {
        return $this->pergunta;
    }
    public function setPergunta($pergunta_in)
    {
        $this->pergunta  = $pergunta_in;
    }

    //============= getter setter opcao ==============

    public function getOpcao()
    {
        return $this->opcao;
    }
    public function setOpcao($opcao_in)
    {
        $this->opcao  = $opcao_in;
    }


#=============================================== Funções de banco ============================================#

    public function save($rq1,$rq2,$rq3,$rq4)
    {
        $conexao = new Conexao();

        $base = "pesquisa";

        $opcoes = array(
            1=>$rq1,$rq2,$rq3,$rq4
        );

        $dbconn = $conexao->conectar($base);

        pg_query($dbconn, "begin");

        for($i=1;$i<5;$i++){

            $data = date('Y-m-d H:i:s');

            $sql1 = "INSERT INTO respostas (data,pergunta,opcao) VALUES ("."'".$data."'".",{$i},".$opcoes[$i].")";

            $res1 = pg_query($dbconn,$sql1) or die(pg_last_error($dbconn));
        }
        
            pg_query($dbconn, "commit");

            $this->msg = $res1;

    }

}

 