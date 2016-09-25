<?php

class Conexion
{
  private $servidor="";
  private $usuario="";
  private $clave="";
  private $bd="";

  function __construct()
  {

  }
  public function conectar(){
    $conexion=mysql_connect($this->servidor,$this->usuario,$this->clave);
    mysql_select_db($this->bd, $conexion);
  }

  function cerrar(){
		mysql_close($this->conexion);
	}
}





?>
