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
        $cantidadBanos = $_POST['guardarBanos'];
        $comuna_id = $_POST['guardarComuna'];
        $cantidadHabitaciones = $_POST['guadarHabitaciones'];
        $fotos = $_FILES['foto']['name'];
        $objPropietario = $_SESSION['usuario'];
        $objPropiedades = new Propiedades();
        $objImagenes = new Imagenes();
        $objPropiedades->setDireccion($direccion);
        $objPropiedades->setDescripcion($descipcion);
        $objPropiedades->setTarifa($tarifa);
        $objPropiedades->setCantidadBanos($cantidadBanos);
        $objPropiedades->setCantidadHabitaciones($cantidadHabitaciones);
        $objPropiedades->setComunaId($comuna_id);
        $objPropiedades->setPropietarioId($objPropietario->getId());
        $id_propiedad = $objPropiedades->save();
        for ($i = 0; $i < count($fotos); $i++) {
            if ($_FILES['foto']['error'][$i] > 0) {
                echo "Error: " . $_FILES['foto']['error'][$i] . "<br>";
            } else {
                move_uploaded_file($_FILES['foto']['tmp_name'][$i], "../../img/" . $_FILES['foto']['name'][$i]);
                $objImagenes->setPropiedadId($id_propiedad);
                $objImagenes->setRuta("/portalArriendo/portalArriendo/img/" . $_FILES['foto']['name'][$i]);
                $objImagenes->save();
            }
        }
        echo "<script>window.location.href='../../vistas/propietario/propietario.php'</script>";
        
        break;
    case 'cargarPropiedad':
        $objPropiedades = new Propiedades();
        $id_propiedad = $_POST['id_propiedad'];
        $objPropiedades = $objPropiedades->load($id_propiedad);
        $objImagenes = new Imagenes();

        ?>
        <div class="row">
        <?php
        foreach($objImagenes->getImagenesByPropiedad($id_propiedad) as $imagenes){
            ?>
            <img width="80px" height="80px" src="<?php echo $imagenes->getRuta()?>" /><br>
            
            <?php 
        }
        ?>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <?php echo $objPropiedades->getDescripcion()?>
            </div>
            <div class="col-sm-3">
                <ul>
                    <li>Tarifa: $<input type="number" value="<?php echo $objPropiedades->getTarifa()?>" id="editarTarifa" name="editarTarifa"></li>
                    <li>Baños: <input type="number" value="<?php echo $objPropiedades->getCantidadBanos()?>" id="editarBanos" name="editarBanos" /></li>
                    <li>Habitaciones: <input type="number" value="<?php echo $objPropiedades->getCantidadHabitaciones() ?>" name="editarHabitaciones" id="editarHabitaciones"></li>
                    <li>Direccion: <input type="text" value="<?php echo $objPropiedades->getDireccion()?>" name="editarDireccion" id="editarDireccion"/></li>
                </ul>
            </div>
            <div class="col-sm-6">
               <!-- <iframe src="http://mapcity.com/#t=1:a=<?php // echo $objPropiedades->getDireccion()?>" frameborder="0" style="border:0" allowfullscreen></iframe>-->


            </div>

        </div>


        <?php
        break;
    default:
        break;


}



?>

