<?php
require_once "../../Portal.php";


class Calificacion
{
    private $id;
    private $propiedad_id;
    private $nota;


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }


    public function getPropiedadId()
    {
        return $this->propiedad_id;
    }


    public function setPropiedadId($propiedad_id)
    {
        $this->propiedad_id = $propiedad_id;
    }


    public function getNota()
    {
        return $this->nota;
    }


    public function setNota($nota)
    {
        $this->nota = $nota;
    }

    public function save(){
        $conn = Portal::getConexion();
        $sql = "insert calificacion values (0,".$this->propiedad_id.",".$this->nota.")";
        $rs = mysqli_query($conn,$sql);
        
    }



}