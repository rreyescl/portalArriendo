<?php

/**
 * Created by PhpStorm.
 * User: RicardoReyes
 * Date: 06/11/2016
 * Time: 19:14
 */
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

    

}