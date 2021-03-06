<?php

/**
* 
*/
class GestaoCargos
{
 private $query_select="SELECT * FROM `tbl_cargos`";
 private $query_insert="INSERT INTO tbl_cargos (Codigo, descricao) VALUES (?,?)";
 private $id;
 private $Codigo;
 private $Descricao;

     public function getId()
    {
        return $this->Id;
    }

    public function setId($Id)
    {
        $this->Id = $Id;
        return $this;
    }

    public function getCodigo()
    {
        return $this->Codigo;
    }

    public function setCodigo($Codigo)
    {
        $this->Codigo = $Codigo;
        return $this;
    }

    public function getDescicao()
    {
        return $this->Descricao;
    }

    public function setDescricao($Descricao)
    {
        $this->Descricao = $Descricao;
        return $this;
    }

    public function listagem_cargos(PDO $con){
    	$executeQuery = $con->prepare($this->query_select);
        $executeQuery->execute();
        $resultados = array();
        while ($dadoListar = $executeQuery->fetch(PDO::FETCH_ASSOC)) {

            $resultados[] = $dadoListar;
        }
        return json_encode($resultados) ;

    }
    public function inserir_cargo(PDO $con) {
        $stmt = $con->prepare($this->query_insert);
        $stmt->execute(array(
            $this->getCodigo(),
            $this->getDescicao()
        ));
     return $con->lastInsertId();
    }
}