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












}








 ?>
