<?php
require_once "../../Portal.php";
class Propiedades
{
  private $id;
  private $propietario_id;
  private $direccion;
  private $descripcion;
  private $tarifa;
  private $comuna_id;
  private $cantidad_baños;
  private $cantidad_habitaciones;

  function __construct()
  {

  }
  public function getId(){
    return $this->id;
  }
  public function setId($id){
    $this->id = $id;
  }
  public function getPropietarioId(){
    return $this->propietario_id;
  }
  public function setPropietarioId($propietario_id){
    $this->propietario_id = $propietario_id;
  }
  public function getDireccion(){
    return $this->direccion;
  }
  public function setDireccion($direccion){
    $this->direccion = $direccion;
  }
  public function getDescripcion(){
    return $this->descripcion;
  }
  public function setDescripcion($descripcion){
    $this->descripcion = $descripcion;
  }
  public function getTarifa(){
    return $this->tarifa;
  }
  public function setTarifa($tarifa){
    $this->tarifa = $tarifa;
  }
  public function getComunaId(){
    return $this->comuna_id;
  }
  public function setComunaId($comuna_id){
    $this->comuna_id = $comuna_id;
  }
  public function getCantidadBanos(){
    return $this->cantidad_baños;
  }
  public function setCantidadBanos($cantidad_baños){
    $this->cantidad_baños = $cantidad_baños;
  }
  public function getCantidadHabitaciones()
  {
    return $this->cantidad_habitaciones;
  }
  public function setCantidadHabitaciones($cantidad_habitaciones)
  {
    $this->cantidad_habitaciones = $cantidad_habitaciones;
  }

  public static function getPropiedadesByPropietarioId($id_propietario){
    $conn = Portal::getConexion();
    $sql = "select * from  propiedades where propietario_id = ".$id_propietario." order by id desc";
    $rs = mysqli_query($conn,$sql);
    $arraylist= null;
    while($row = mysqli_fetch_array($rs)){
      $objPropiedades = new Propiedades();
      $objPropiedades->setId($row['id']);
      $objPropiedades->setPropietarioId($row['propietario_id']);
      $objPropiedades->setDireccion($row['direccion']);
      $objPropiedades->setDescripcion($row['descripcion']);
      $objPropiedades->setTarifa($row['tarifa']);
      $objPropiedades->setComunaId($row['comuna_id']);
      $objPropiedades->setCantidadBanos($row['cantidad_banos']);
      $objPropiedades->setCantidadHabitaciones($row['cantidad_habitaciones']);
      $arraylist[] = $objPropiedades;
    }
    return $arraylist;
  }
  
  public function save(){
    $conn = Portal::getConexion();
    $sql = "insert into propiedades values (0,".$this->propietario_id.",'".$this->direccion."','".$this->descripcion."',".$this->tarifa.",".$this->comuna_id.",".$this->cantidad_baños.",".$this->cantidad_habitaciones.")";
   // echo $sql;
    mysqli_query($conn,$sql);
    
    return mysqli_insert_id($conn);
  }

  public function load($id_propiedad){
    $conn = Portal::getConexion();
    $sql = "select * from propiedades where id=".$id_propiedad;
    
    $rs = mysqli_query($conn,$sql);
    $objPropiedad=null;
    while($row = mysqli_fetch_array($rs,MYSQLI_BOTH)){
      $objPropiedad = new Propiedades();
      $objPropiedad->setId($row['id']);
      $objPropiedad->setPropietarioId($row['propietario_id']);
      $objPropiedad->setDireccion($row['direccion']);
      $objPropiedad->setDescripcion($row['descripcion']);
      $objPropiedad->setTarifa($row['tarifa']);
      $objPropiedad->setComunaId($row['comuna_id']);
      $objPropiedad->setCantidadBanos($row['cantidad_banos']);
      $objPropiedad->setCantidadHabitaciones($row['cantidad_habitaciones']);
    }
    return $objPropiedad;
  }
  
  public static function remove($id_propiedad){
    $conn = Portal::getConexion();
    $arr =array("delete from propiedades where id = ".$id_propiedad,"delete from imagenes where propiedad_id =".$id_propiedad,"delete from publicacion where id_propiedad=".$id_propiedad);
    
    foreach($arr as $sql){
        echo "<br>".$sql."<br>";
        mysqli_query($conn,$sql);    
    }
    
    
    
  }
}
?>
