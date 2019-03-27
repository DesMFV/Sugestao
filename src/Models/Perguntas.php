<?php


namespace Matheus\Models;

use Matheus\Conexao\Conexao;

class Perguntas
{
    //$e = $_POST[email];
    //$a = $_POST[assunto];
    //$s = $_POST[txtSugestao];
    //$n = $_POST[txtNome];

    private $id;
    private $descricao;
    private $valor;


#=============================================== getters e setters ============================================#

    public function getId()
    {
        return $this->id;
    }
    public function setId($id_in)
    {
        $this->id  = $id_in;
    }

    //============= getter setter Texto ==============

    public function getTexto()
    {
        return $this->texto;
    }
    public function setTexto($descricao_in)
    {
        $this->descricao  = $$descricao_in;
    }

    //============= getter setter Valor ==============

    public function getValor()
    {
        return $this->valor;
    }
    public function setValor($valor_in)
    {
        $this->valor  = $valor_in;
    }

#=============================================== Funções de banco ============================================#

    public function getTextoPergunta($valor)
    {
        $conexao = new Conexao();

        $base = "pesquisa";

        $dbconn = $conexao->conectar($base);

        $sql1 = "SELECT pergunta_descricao FROM perguntas WHERE pergunta_valor = $valor";

        $res1 = pg_query($dbconn,$sql1) or die(pg_last_error($dbconn));
        
        pg_query($dbconn, "commit");

        return $res1;
    }

    public function countPerguntas()
    {
        $conexao = new Conexao();

        $base = "pesquisa";

        $dbconn = $conexao->conectar($base);;

        $sql1 = "SELECT COUNT(*) FROM perguntas";

        $res1 = pg_query($dbconn,$sql1) or die(pg_last_error($dbconn));

        return $res1;
        
        pg_query($dbconn, "commit");
    }


    function getPergunta($n){

        $length = $this->countPerguntas();
        $count = pg_fetch_object($length);
        $ia = 0;

        while($ia<$count->count+1){
            
            $resultado = $this->getTextoPergunta($n);

            $ia++;

            while($perguntas = pg_fetch_object($resultado)){
                $pergunta = $perguntas->pergunta_descricao;
            }
        } 

        return $pergunta;
    }
}
 