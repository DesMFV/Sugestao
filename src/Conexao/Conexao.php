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

}