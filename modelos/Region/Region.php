<?php
/**
 *
 */
class Region
{
  private $id;
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
}




 ?>
