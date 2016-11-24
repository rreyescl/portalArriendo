<?php
require_once "../../Portal.php";
class Region
{
  private $id;
  private $numero_region;
  private $nombre;

  function __construct()
  {

  }

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
  public function getNumeroRegion()
  {
    return $this->numero_region;
  }
  public function setNumeroRegion($numero_region)
  {
    $this->numero_region = $numero_region;
  }

  public static function cargarRegiones(){
    $conn = Portal::getConexion();
    $sql = "select * from region order by nombre asc";
    $rs = mysqli_query($conn,$sql);
    $arraylist=null;
    while ($row = mysqli_fetch_array($rs,MYSQLI_BOTH)){
      $objRegion = new Region();
      $objRegion->setId($row['id']);
      $objRegion->setNumeroRegion($row['numero_region']);
      $objRegion->setNombre($row['nombre']);
      $arraylist[] = $objRegion;
    }
    return $arraylist;
  }


}




 ?>
