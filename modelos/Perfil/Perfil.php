<?php

/**
 * Created by PhpStorm.
 * User: RicardoReyes
 * Date: 06/11/2016
 * Time: 18:51
 */
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

}