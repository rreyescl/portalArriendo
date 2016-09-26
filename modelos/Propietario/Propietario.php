<?php

class Propietario
{
    private $id;
    private $rut;
    private $nombre;
    private $apellido;
    private $telefono;
    private $clave;
    private $email;
    private $estado;


    function __construct()
    {

    }

    public function getId()
    {
        return $this->id();
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getRut()
    {
        return $this->rut;
    }

    public function setRut($rut)
    {
        $this->rut = $rut;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function setClave($clave)
    {
        $this->clave = $clave;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
        return $this;
    }
}

?>
