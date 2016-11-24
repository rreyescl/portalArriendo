<?php
require_once "../../Portal.php";
class Comunas
{
  private $id;
  private $nombre;
  private $id_region;
  function __construct()
  {}
    public function getId(){
      return $this->id;
    }
    public function setId($id){
      $this->id = $id;
    }
    public function getNombre(){
      return $this->nombre;
    }
    public function setNombre($nombre){
      $this->nombre = $nombre;
    }
    public function getIdRegion(){
      return $this->id_region;
    }
    public function setIdRegion($id_region){
      $this->id_region = $id_region;
    }

    public static function getComunasByRegion($id_region){
      $conn = Portal::getConexion();
      $sql = "select * from comunas where id_region =".$id_region;
      $rs = mysqli_query($conn,$sql);
      $arraylist=null;
      while($row = mysqli_fetch_array($rs,MYSQLI_BOTH)){
        $objComunas = new Comunas();
        $objComunas->setId($row['id']);
        $objComunas->setNombre($row['nombre']);
        $objComunas->setIdRegion($row['id_region']);
        $arraylist[] = $objComunas;
      }
      return $arraylist;
    }
  }
  ?>
