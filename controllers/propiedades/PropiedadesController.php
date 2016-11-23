<?php

include "../../modelos/Propiedades/Propiedades.php" ;
include "../../modelos/Imagenes/Imagenes.php";

if(isset($_POST['accion'])){
    $accion = $_POST['accion'];    
}


switch($accion){
    case 'guardarPropiedad':
    $direccion = $_POST['guardarDireccion'];
    $descipcion= $_POST['guardarDescripcion'];
    $tarifa= $_POST['guardarTarfia'];
    $cantidadBaños= $_POST['guardarBanos'];
    $comuna_id= $_POST['guardarComuna'];
    $cantidadHabitaciones = $_POST['guadarHabitaciones'];
    $fotos= $_POST['foto'];
    
    $objPropiedades = new Propiedades();
    $objImagenes = new Imagenes();
    $objPropiedades->setDireccion($direccion);
    $objPropiedades->setDescripcion($descipcion);
    $objPropiedades->setTarifa($tarifa);
    $objPropiedades->setCantidadBanos($cantidadBaños);
    $objPropiedades->setComunaId($comuna_id);
    
    
    break;
    case '': 
    break;
    default:
    break;
    
    
}



?>