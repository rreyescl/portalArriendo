<?php

require_once "../../Portal.php";
class Imagenes
{
    private $id_img;
    private $ruta;
    private $propiedad_id;

    /**
     * @return mixed
     */
    public function getIdImg()
    {
        return $this->id_img;
    }

    /**
     * @param mixed $id_img
     */
    public function setIdImg($id_img)
    {
        $this->id_img = $id_img;
    }

    /**
     * @return mixed
     */
    public function getRuta()
    {
        return $this->ruta;
    }

    /**
     * @param mixed $ruta
     */
    public function setRuta($ruta)
    {
        $this->ruta = $ruta;
    }

    /**
     * @return mixed
     */
    public function getPropiedadId()
    {
        return $this->propiedad_id;
    }

    /**
     * @param mixed $propiedad_id
     */
    public function setPropiedadId($propiedad_id)
    {
        $this->propiedad_id = $propiedad_id;
    }
    
    public function save(){
        $conn = Portal::getConexion();
        $sql = "insert into imagenes values (0,'".$this->ruta."',".$this->propiedad_id.")";
        echo $sql;
        mysqli_query($conn,$sql);        
    }

    

}