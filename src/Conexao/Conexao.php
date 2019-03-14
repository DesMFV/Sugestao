<?php

namespace Matheus\Conexao;

class Conexao{

    private $dbconn;

    public function conectar(){
        $this->dbconn = pg_connect("host=localhost port=5432 dbname=sug-base user=postgres password=postgres")
        or die('Não foi possível conectar: ' . pg_last_error());
        return $this->dbconn;
    }

    public function abrirConexao(){
        pg_query($this->dbconn, "begin");
    }
    public function fecharConexao(){
        pg_query($this->dbconn, "commit");
    }

    // getters e setters

    public function getNome(){
        $sql1 = "select nome_pessoa from sugestao";
        $res1 = pg_query($this->dbconn,$sql1) or die(pg_last_error($this->dbconn));
        $nomes = array($res1);
        return $nomes;
    }

}