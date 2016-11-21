<?php
require_once "../../Portal.php";

class Perfil
{
    private $id;
    private $perfil;

    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;

    }

    /**
     * @return mixed
     */
    public function getPerfil()
    {
        return $this->perfil;
    }

    /**
     * @param mixed $perfil
     * @return Perfil
     */
    public function setPerfil($perfil)
    {
        $this->perfil = $perfil;

    }
    
    public function getPerfiles(){
        $conn = Portal::getConexion();
    }

}