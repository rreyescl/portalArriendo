<?php
include "../../modelos/Reservas/Reservas.php";

$accion = $_REQUEST['accion'];

switch ($accion){
    case 'reservarPublicacion':
        $objReservas = new Reservas();
        $objReservas->setIdArrendatario($_POST['id_arrendatario']);
        $objReservas->setIdPropiedad($_POST['id_propiedad']);
        $objReservas->setDesde($_POST['desde']);
        $objReservas->setHasta($_POST['hasta']);
        $objReservas->save();
        break;
    default:
        break;
}
