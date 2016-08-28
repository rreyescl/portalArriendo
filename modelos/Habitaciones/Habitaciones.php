<?php
class Habitaciones
{
  private $id;
  private $propiedad_id;
  private $descripcion;

  function __construct()
  {
  }
  public function getId(){
    return $this->id;
  }
  public function setId($id){
    $this->id = $id;
  }
  public function getPropiedadId(){
    return $this->propiedad_id;
  }
  public function setPropiedadId($propiedad_id){
    $this->propiedad_id = $propiedad_id;
  }
  public function getDescripcion(){
    return $this->descripcion;
  }
  public function setDescripcion($descripcion){
    $this->descripcion = $descripcion;
  }
}
?>
