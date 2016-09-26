<?php
/**
*
*/
class Reservas
{
  private $id;
  private $id_arrendatario;
  private $id_habitacion;
  private $desde;
  private $hasta;

  function __construct()
  {

  }
  public function getId(){
    return $this->id;
  }
  public function setId($id){
    $this->id = $id;
  }
  public function getIdArrendatario(){
    return $this->id_arrendatario;
  }
  public function setIdArrendatario($id_arrendatario){
    $this->id_arrendatario = $id_arrendatario;
  }
  public function getIdHabitacion(){
    return $this->id_habitacion;
  }
  public function setIdHabitacion($id_habitacion){
    $this->id_habitacion = $id_habitacion;
  }
  public function getDesde(){
    return $this->desde;
  }
  public function setDesde($desde){
    $this->desde = $desde;
  }

  public function getHasta(){
    return $this->hasta;
  }
  public function setHasta($hasta){
    $this->hasta = $hasta;
  }

}


?>
