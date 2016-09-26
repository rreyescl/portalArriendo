<?php


class Conexion
{
    private $servidor = "localhost";
    private $usuario = "root";
    private $clave = "asdf1234";
    private $bd = "portalArriendo";

    /**
     * @return string
     */
    public function getServidor()
    {
        return $this->servidor;
    }

    /**
     * @return string
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @return string
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * @return string
     */
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
