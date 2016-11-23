<?php

include "../../modelos/Propiedades/Propiedades.php";
include "../../modelos/Imagenes/Imagenes.php";
include "../../modelos/Usuario/Usuario.php";

if (isset($_POST['accion'])) {
    $accion = $_POST['accion'];
}
session_start();


switch ($accion) {
    case 'guardarPropiedad':
        $direccion = $_POST['guardarDireccion'];
        $descipcion = $_POST['guardarDescripcion'];
        $tarifa = $_POST['guardarTarifa'];
        $cantidadBaños = $_POST['guardarBanos'];
        $comuna_id = $_POST['guardarComuna'];
        $cantidadHabitaciones = $_POST['guadarHabitaciones'];
        $fotos = $_FILES['foto']['name'];
        $objPropietario = $_SESSION['usuario'];
        $objPropiedades = new Propiedades();
        $objImagenes = new Imagenes();
        $objPropiedades->setDireccion($direccion);
        $objPropiedades->setDescripcion($descipcion);
        $objPropiedades->setTarifa($tarifa);
        $objPropiedades->setCantidadBanos($cantidadBaños);
        $objPropiedades->setCantidadHabitaciones($cantidadHabitaciones);
        $objPropiedades->setComunaId($comuna_id);
        $objPropiedades->setPropietarioId($objPropietario->getId());
        $id_propiedad = $objPropiedades->save();
        for ($i = 0; $i < count($fotos); $i++) {
            if ($_FILES['foto']['error'][$i] > 0) {
                echo "Error: " . $_FILES['foto']['error'][$i] . "<br>";
            } else {
                move_uploaded_file($_FILES['foto']['tmp_name'][$i], "../../img" . $_FILES['foto']['name'][$i]);
                $objImagenes->setPropiedadId($id_propiedad);
                $objImagenes->setRuta("/portalArriendo/img/" . $_FILES['foto']['name'][$i]);
                $objImagenes->save();
            }
        }
        echo "<script>window.location.href='../../vistas/propietario/propietario.php'</script>";
        
        break;
    case '':
        break;
    default:
        break;


}



?>