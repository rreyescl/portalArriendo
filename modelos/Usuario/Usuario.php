<?php
require_once "../../Portal.php";

class Usuario
{
    private $id;
    private $rut;
    private $nombre;
    private $apellido;
    private $telefono;
    private $clave;
    private $email;
    private $estado;
    private $id_perfil;
    private $preguntaSecretaId;
    private $respuestaSecreta;

    /**
     * @return mixed
     */
    public function getRespuestaSecreta()
    {
        return $this->respuestaSecreta;
    }

    /**
     * @param mixed $respuestaSecreta
     */
    public function setRespuestaSecreta($respuestaSecreta)
    {
        $this->respuestaSecreta = $respuestaSecreta;
    }


    /**
     * @return mixed
     */
    public function getPreguntaSecretaId()
    {
        return $this->preguntaSecretaId;
    }

    /**
     * @param mixed $preguntaSecretaId
     */
    public function setPreguntaSecretaId($preguntaSecretaId)
    {
        $this->preguntaSecretaId = $preguntaSecretaId;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getRut()
    {
        return $this->rut;
    }

    /**
     * @param mixed $rut
     */
    public function setRut($rut)
    {
        $this->rut = $rut;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * @param mixed $apellido
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * @return mixed
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * @param mixed $clave
     */
    public function setClave($clave)
    {
        $this->clave = $clave;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getIdPerfil()
    {
        return $this->id_perfil;
    }

    /**
     * @param mixed $id_perfil
     */
    public function setIdPerfil($id_perfil)
    {
        $this->id_perfil = $id_perfil;
    }


    public function save()
    {
        $conn = Portal::getConexion();
        $respuesta = false;
        if ($_SESSION['cargado'] == true) {
            echo "entro a actualizar";
            $sql = "update usuario set rut ='" . $this->rut . "', nombre='" . $this->nombre . "',apellido='" . $this->apellido . "',
            telefono='" . $this->telefono . "',clave ='" . $this->clave . "',email='" . $this->email . "',pregunta_secreta_id=" . $this->preguntaSecretaId . ",
            respuesta =" . $this->respuestaSecreta . ",id_perfil=" . $this->id_perfil . ",estado = " . $this->estado . " where id=" . $this->id;
        } else {
            $sql = "insert into usuario ";
            $sql .= "(rut,nombre,apellido,telefono,";
            $sql .= "clave,email,pregunta_secreta_id,respuesta,";
            $sql .= "id_perfil,estado) values ";
            $sql .= "('" . $this->rut . "','" . $this->nombre . "','" . $this->apellido . "','" . $this->telefono . "',";
            $sql .= "'" . $this->clave . "','" . $this->email . "'," . $this->preguntaSecretaId . ",'" . $this->respuestaSecreta . "',";
            $sql .= $this->id_perfil . "," . $this->estado . ")";
        }
        //echo $sql;
        if (mysqli_query($conn, $sql)) {

            $respuesta = true;
        }

        return $respuesta;
    }

    public function merge(){
        $conn = Portal::getConexion();

        $sql = "update usuario set rut ='" . $this->rut . "', nombre='" . $this->nombre . "',apellido='" . $this->apellido . "',
            telefono='" . $this->telefono . "',clave ='" . $this->clave . "',email='" . $this->email . "'  where id=" . $this->id;

        mysqli_query($conn,$sql);

        $objUsuario = new Usuario();
        $objUsuario = $objUsuario->loadById($this->id);
        return $objUsuario;
    }


    public function load($rut)
    {
        $conn = Portal::getConexion();
        $sql = "select * from usuario where rut ='" . $rut . "'";
        $rs = mysqli_query($conn, $sql);

        $objUsuario = null;
        while ($row = mysqli_fetch_array($rs, MYSQLI_BOTH)) {
            $objUsuario = new Usuario();
            $objUsuario->setId($row['id']);
            $objUsuario->setRut($row['rut']);
            $objUsuario->setNombre($row['nombre']);
            $objUsuario->setApellido($row['apellido']);
            $objUsuario->setTelefono($row['telefono']);
            $objUsuario->setEmail($row['email']);
            $objUsuario->setClave($row['clave']);
            $objUsuario->setPreguntaSecretaId($row['pregunta_secreta_id']);
            $objUsuario->setRespuestaSecreta($row['respuesta']);
            $objUsuario->setIdPerfil($row['id_perfil']);
            $objUsuario->setEstado($row['estado']);
        }

        $_SESSION['cargado'] = true;
        return $objUsuario;
    }

    public function loadById($id)
    {
        $conn = Portal::getConexion();
        $sql = "select * from usuario where id =".$id;
        $rs = mysqli_query($conn, $sql);

        $objUsuario = null;
        while ($row = mysqli_fetch_array($rs, MYSQLI_BOTH)) {
            $objUsuario = new Usuario();
            $objUsuario->setId($row['id']);
            $objUsuario->setRut($row['rut']);
            $objUsuario->setNombre($row['nombre']);
            $objUsuario->setApellido($row['apellido']);
            $objUsuario->setTelefono($row['telefono']);
            $objUsuario->setEmail($row['email']);
            $objUsuario->setClave($row['clave']);
            $objUsuario->setPreguntaSecretaId($row['pregunta_secreta_id']);
            $objUsuario->setRespuestaSecreta($row['respuesta']);
            $objUsuario->setIdPerfil($row['id_perfil']);
            $objUsuario->setEstado($row['estado']);
        }

        $_SESSION['cargado'] = true;
        return $objUsuario;
    }

    public function delete($rut)
    {
        $respuesta = false;
        $conn = Portal::getConexion();
        $sql = "delete from usuario where rut = '" . $rut . "'";
        if (mysqli_query($conn, $sql)) {
            $respuesta = true;
        }
        return $respuesta;
    }

    public function validarUsuario($rut,$clave){
        $respuesta = false;
        $conn = Portal::getConexion();
        $sql = "select * from usuario where rut ='".$rut."' and clave ='".$clave."' limit 0,1";
        //echo $sql;
        $rs = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($rs,MYSQLI_BOTH)){
            $respuesta = true;
        }
        return $respuesta;
    }


}