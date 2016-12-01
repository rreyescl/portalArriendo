<?php
require_once "../../Portal.php";
class Reservas
{
  private $id;
  private $id_arrendatario;
  private $id_propiedad;
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

  public function getIdPropiedad()
  {
    return $this->id_propiedad;
  }


  public function setIdPropiedad($id_propiedad)
  {
    $this->id_propiedad = $id_propiedad;
  }

  public function save(){
    $conn = Portal::getConexion();
    $sql = "insert into reservas values (0,".$this->id_arrendatario.",".$this->id_propiedad.",'".$this->desde."','".$this->hasta."')";
    //echo $sql;
    //exit;
    $rs = mysqli_query($conn,$sql);
    echo "reservada";
  }

  public static function getReservasByArrendatarioId($id_arrendatario)
  {
    $conn = Portal::getConexion();
    $sql = "select * from  reservas where id_arrendatario = " . $id_arrendatario .
        " order by id desc";
   
    $rs = mysqli_query($conn, $sql);
    $arraylist = null;
    while ($row = mysqli_fetch_array($rs,MYSQLI_BOTH)) {
      $objReservas = new Reservas();
      $objReservas->setId($row['id']);
      $objReservas->setIdArrendatario($row['id_arrendatario']);
      $objReservas->setIdPropiedad($row['id_propiedad']);
      $objReservas->setDesde($row['desde']);
      $objReservas->setHasta($row['hasta']);
      $arraylist[] = $objReservas;
    }
    return $arraylist;
  }


}


?>
