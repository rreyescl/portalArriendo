<?php
include "../../modelos/Calificacion/Calificacion.php";


$accion = $_REQUEST['accion'];


switch ($accion){
    case 'calificarPropiedad':
        $objCalificacion = new Calificacion();
        $objCalificacion->setPropiedadId($_POST['propiedad_id']);
        $objCalificacion->setNota($_POST['nota']);
        $objCalificacion->save();

        break;
    default:
        break;

}

