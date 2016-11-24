<?php

/**
 * Created by PhpStorm.
 * User: RicardoReyes
 * Date: 24/11/2016
 * Time: 3:47
 */
require_once "../../Portal.php";

class Publicacion
{
    private $id_publicacion;
    private $desde;
    private $hasta;
    private $id_propiedad;
    private $id_propietario;
    private $fecha_publicacion;

    /**
     * Publicacion constructor.
     * @param $id_publicacion
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getIdPublicacion()
    {
        return $this->id_publicacion;
    }

    /**
     * @param mixed $id_publicacion
     */
    public function setIdPublicacion($id_publicacion)
    {
        $this->id_publicacion = $id_publicacion;
    }

    /**
     * @return mixed
     */
    public function getDesde()
    {
        return $this->desde;
    }

    /**
     * @param mixed $desde
     */
    public function setDesde($desde)
    {
        $this->desde = $desde;
    }

    /**
     * @return mixed
     */
    public function getHasta()
    {
        return $this->hasta;
    }

    /**
     * @param mixed $hasta
     */
    public function setHasta($hasta)
    {
        $this->hasta = $hasta;
    }

    /**
     * @return mixed
     */
    public function getIdPropiedad()
    {
        return $this->id_propiedad;
    }

    /**
     * @param mixed $id_propiedad
     */
    public function setIdPropiedad($id_propiedad)
    {
        $this->id_propiedad = $id_propiedad;
    }

    /**
     * @return mixed
     */
    public function getIdPropietario()
    {
        return $this->id_propietario;
    }

    /**
     * @param mixed $id_propietario
     */
    public function setIdPropietario($id_propietario)
    {
        $this->id_propietario = $id_propietario;
    }

    /**
     * @return mixed
     */
    public function getFechaPublicacion()
    {
        return $this->fecha_publicacion;
    }

    /**
     * @param mixed $fecha_publicacion
     */
    public function setFechaPublicacion($fecha_publicacion)
    {
        $this->fecha_publicacion = $fecha_publicacion;
    }


    public function save()
    {
        $conn = Portal::getConexion();
        $sql = "insert into publicacion values (0,'" . $this->desde . "','" . $this->
            hasta . "'," . $this->id_propiedad . "," . $this->id_propietario . ",current_timestamp)";
            //echo $sql;
        $rs = mysqli_query($conn, $sql);
        return mysqli_insert_id($conn);
    }

    public function load($id_publicacion)
    {
        $conn = Portal::getConexion();
        $sql = "select * from publicacion where id_publicacion=" . $id_publicacion;
        $rs = mysqli_query($conn, $sql);
        $objPublicacion = null;
        if ($row = mysqli_fetch_array($rs, MYSQLI_BOTH)) {
            $objPublicacion = new Publicacion();
            $objPublicacion->setIdPublicacion($row['id_publicacion']);
            $objPublicacion->setDesde($row['desde']);
            $objPublicacion->setHasta($row['hasta']);
            $objPublicacion->setIdPropiedad($row['id_propiedad']);
            $objPublicacion->setIdPropietario($row['id_propietario']);
            $objPublicacion->setFechaPublicacion($row['fecha_publicacion']);
        }
        return $objPublicacion;
    }

    public static function getPublicacionesByPropietario($id_propietario)
    {
        $conn = Portal::getConexion();
        $sql = "select * from publicacion where id_propietario=" . $id_propietario .
            " order by id_publicacion desc";
        //echo $sql;
        $rs = mysqli_query($conn, $sql);
        $arraylist = null;
        while ($row = mysqli_fetch_array($rs, MYSQLI_BOTH)) {
            $objPublicacion = new Publicacion();
            $objPublicacion->setIdPublicacion($row['id_publicacion']);
            $objPublicacion->setDesde($row['desde']);
            $objPublicacion->setHasta($row['hasta']);
            $objPublicacion->setIdPropietario($row['id_propietario']);
            $objPublicacion->setIdPropiedad($row['id_propiedad']);
            $arraylist[] = $objPublicacion;

        }
        return $arraylist;
    }

    public static function getUltimasTresPublicaciones()
    {
        $conn = Portal::getConexion();
        $sql = "select * from publicacion order by id_publicacion desc";
        $rs = mysqli_query($conn, $sql);
        $arraylist = null;
        while ($row = mysqli_fetch_array($rs, MYSQLI_BOTH)) {
            $objPublicacion = new Publicacion();
            $objPublicacion->setIdPublicacion($row['id_publicacion']);
            $objPublicacion->setIdPropietario($row['id_propietario']);
            $objPublicacion->setIdPropiedad($row['id_propiedad']);
            $objPublicacion->setDesde($row['desde']);
            $objPublicacion->setHasta($row['hasta']);
            $objPublicacion->setFechaPublicacion($row['fecha_publicacion']);
            $arraylist[] = $objPublicacion;
        }
        return $arraylist;
    }

    public static function getPublicaciones()
    {
        $conn = Portal::getConexion();
        $sql = "select * from publicacion order by id_publicacion desc";
        $rs = mysqli_query($conn, $sql);
        $arraylist = null;
        while ($row = mysqli_fetch_array($rs, MYSQLI_BOTH)) {
            $objPublicacion = new Publicacion();
            $objPublicacion->setIdPublicacion($row['id_publicacion']);
            $objPublicacion->setIdPropietario($row['id_propietario']);
            $objPublicacion->setIdPropiedad($row['id_propiedad']);
            $objPublicacion->setDesde($row['desde']);
            $objPublicacion->setHasta($row['hasta']);
            $objPublicacion->setFechaPublicacion($row['fecha_publicacion']);
            $arraylist[] = $objPublicacion;
        }
        return $arraylist;
    }


}
