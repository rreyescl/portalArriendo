<?php

require_once "modelos/Conexion/Conexion.php";


class Portal
{
    private $conexion;

    public function __construct()
    {

    }

    public function getConexion()
    {
        $conn = new Conexion();
        return $conn->conectar();
    }
}