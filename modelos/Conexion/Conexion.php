<?php


class Conexion
{
    private $servidor = "localhost";
    private $usuario = "root";
    private $clave = "asdf1234";
    private $bd = "portalArriendo";

    public function getServidor()
    {
        return $this->servidor;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    
    public function getClave()
    {
        return $this->clave;
    }

    
    public function getBd()
    {
        return $this->bd;
    }


    function __construct()
    {

    }


    public function conectar()
    {
        try {
            $conn = new mysqli($this->servidor, $this->usuario, $this->clave);
            if ($conn->connect_error) {
                die("Conexion fallida: " . $conn->connect_error);
            }

            $sql = "CREATE DATABASE IF NOT EXISTS " . $this->bd;
            if ($conn->query($sql) === TRUE) {
                //echo "Database ".$this->bd." created successfully";
            } else {
                echo "Error creating database: " . $conn->error;
            }
            $conn = new mysqli($this->servidor, $this->usuario, $this->clave, $this->bd);
            //echo "asdasd " . $conn;
            return $conn;


        } catch (Exception $e) {
            echo "error -> " . $e;

        }
    }
}


?>
