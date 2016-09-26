<?php

require_once "../../Portal.php";


class Propietario extends Portal
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

    public function validaPropietario()
    {
        $respuesta = false;
        $conn = $this->getConexion();
        $sql = "select rut,clave from propietario where rut='" . $this->rut . "' and clave = '" . $this->clave . "' limit 0,1";

        $rs = mysqli_query($conn,$sql,MYSQLI_STORE_RESULT);
        while ($row = mysqli_fetch_array($rs)) {
            $respuesta = true;
        }
        return $respuesta;
    }

    public function cargarPropietario()
    {
        $objPropietario = "";

        $conn = $this->getConexion();
        $sql = "select id,rut,nombre,apellido,telefono,clave,email,estado 
        from propietario
        where rut='".$this->rut."'";

        $rs = mysqli_query($conn, $sql,MYSQLI_STORE_RESULT);
        while ($row = mysqli_fetch_array($rs)) {
            $objPropietario = new Propietario();
            $objPropietario->setId($row['id']);
            $objPropietario->setRut($row['rut']);
            $objPropietario->setNombre($row['nombre']);
            $objPropietario->setApellido($row['apellido']);
            $objPropietario->setTelefono($row['telefono']);
            $objPropietario->setEmail($row['email']);
            $objPropietario->setEstado($row['estado']);
        }
        return $objPropietario;
    }
}

?>
