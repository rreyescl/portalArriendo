<?php
include "../../modelos/Publicacion/Publicacion.php";
$accion="";
if(isset($_POST['accion'])){
    $accion = $_POST['accion'];
}

switch ($accion){
    case 'guardarPublicacion':
        $id_propiedad = $_POST['propiedadAPublicar'];
        $desde = $_POST['desde'];
        $hasta = $_POST['hasta'];
        $propietario_id = $_POST['publicarPropietario'];
        $objPublicacion = new Publicacion();
        $objPublicacion->setDesde($desde);
        $objPublicacion->setHasta($hasta);
        $objPublicacion->setIdPropiedad($id_propiedad);
        $objPublicacion->setIdPropietario($propietario_id);


        if($objPublicacion->save() >0){
            echo "<script>alert('Publicación realizada!');</script>";
            echo "<script>window.location.href='../../vistas/propietario/propietario.php'</script>";
        }
        break;
    default:
        break;

}