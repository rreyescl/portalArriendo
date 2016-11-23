<?php
/**
*
*/
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

  public function getPropiedadesByPropietarioId($id_propietario){
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
}
?>
