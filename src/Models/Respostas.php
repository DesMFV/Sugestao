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

            $data = date('Y-m-d');

            $sql1 = "INSERT INTO respostas (data_baixa,pergunta,opcao) VALUES ("."'".$data."'".",{$i},".$opcoes[$i].")";

            $res1 = pg_query($dbconn,$sql1) or die(pg_last_error($dbconn));
        }
        
            pg_query($dbconn, "commit");

            $this->msg = $res1;
    }

    public function resultSearch($q,$datai,$datal)
    {
        $conexao = new Conexao();

        $base = "pesquisa";

        $dbconn = $conexao->conectar($base);

        $sql1 = "SELECT COUNT(opcao) FROM respostas WHERE pergunta = $q AND data_baixa BETWEEN "."'".$datai."'"." AND "."'".$datal."'";

        $res1 = pg_query($dbconn,$sql1) or die(pg_last_error($dbconn));

        $countValue = pg_fetch_object($res1);

        $sql2 = "SELECT SUM(opcao) FROM respostas WHERE pergunta = $q";

        $res2 = pg_query($dbconn,$sql2) or die(pg_last_error($dbconn));

        $sum = pg_fetch_object($res2);

        $finalResult = $sum->sum/$countValue->count;

        pg_query($dbconn, "commit");

        $result = $finalResult;

        return $result;
    }

    public function getMinDate(){

        $conexao = new Conexao();

        $base = "pesquisa";

        $dbconn = $conexao->conectar($base);

        $sqlmin = "SELECT MIN(data_baixa) FROM respostas";

        $resmin = pg_query($dbconn,$sqlmin) or die(pg_last_error($dbconn));

        $datamin = pg_fetch_object($resmin);

        pg_query($dbconn, "commit");

        return $datamin;

    }

    public function getMaxDate(){

        $conexao = new Conexao();

        $base = "pesquisa";

        $dbconn = $conexao->conectar($base);

        $sqlmax = "SELECT MAX(data_baixa) FROM respostas";

        $resmax = pg_query($dbconn,$sqlmax) or die(pg_last_error($dbconn));

        $datamax = pg_fetch_object($resmax);

        pg_query($dbconn, "commit");

        return $datamax;

    }

    public function resultDefault($q)
    {
        $conexao = new Conexao();

        $base = "pesquisa";

        $dbconn = $conexao->conectar($base);

        $dmin = $this->getMinDate();

        $datamin = $dmin->min;

        $dmax = $this->getMaxDate();

        $datamax = $dmax->max;

        $sql1 = "SELECT COUNT(opcao) FROM respostas WHERE pergunta = $q AND data_baixa BETWEEN "."'".$datamin."'"." AND "."'".$datamax."'";

        $res1 = pg_query($dbconn,$sql1) or die(pg_last_error($dbconn));

        $countValue = pg_fetch_object($res1);

        $sql2 = "SELECT SUM(opcao) FROM respostas WHERE pergunta = $q";

        $res2 = pg_query($dbconn,$sql2) or die(pg_last_error($dbconn));

        $sum = pg_fetch_object($res2);

        $finalResult = $sum->sum/$countValue->count;

        pg_query($dbconn, "commit");

        $result = $finalResult;

        return $result;
    }





}

 