<?php
/**
*
*/
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
  }
  ?>
