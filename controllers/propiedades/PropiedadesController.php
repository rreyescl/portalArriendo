<?php

include "../../modelos/Propiedades/Propiedades.php";
include "../../modelos/Imagenes/Imagenes.php";
include "../../modelos/Usuario/Usuario.php";

if (isset($_REQUEST['accion'])) {
    $accion = $_REQUEST['accion'];
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
        $imagenes = $objImagenes->getImagenesByPropiedad($id_propiedad);

?>
        
        <div id="myCarousel" class="carousel slide">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
  <?php
        $i = 0;
        $active = "";
        if (count($imagenes) > 0) {
            foreach ($imagenes as $objImagenes) {
                if ($i == 0) {
                    $active = "active";
                } else {
                    $active = "";
                }
?>
    <div class="item <?php echo $active ?>">
      <center><img width="500px" height="500px" src="<?php echo $objImagenes->
                getRuta() ?>" class="img-responsive" /></center>
      <div class="container">   
      <div class="carousel-caption"></div>     
      </div>
    </div>
        <?php
                $i++;
            }
        } else {
?><center><img width="500px" height="500px" src="/portalArriendo/portalArriendo/img/Imagen_no_disponible.jpg" class="img-responsive"></center><?php
        }
?>
    
  </div>
  <!-- Controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="icon-prev"></span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="icon-next"></span>
  </a>  
</div>
       
        <div class="row">
            
            <div class="col-sm-6">
            <form class="form-horizontal" method="post" action="../../controllers/propiedades/PropiedadesController.php" enctype="multipart/form-data">
            <div class="form-group">
                <label class="control-label col-sm-2" for="Descripcion">Descripcion:</label>
                <!--<div class="col-sm-10">-->
                    <input type="text" class="form-control" id="editarDescripcion" name="editarDescripcion" value="<?php echo $objPropiedades->getDescripcion()?>"/>
                <!--</div>-->
                </div>
                <div class="form-group">
                <label class="control-label col-sm-2" for="Descripcion">Tarifa:</label>
                <!--<div class="col-sm-10">-->
                    <input type="text" class="form-control" id="editarTarifa" name="editarTarifa" value="<?php echo $objPropiedades->getTarifa()?>"/>
                <!--</div>-->
                </div>
                <div class="form-group">
                <label class="control-label col-sm-2" for="Descripcion">Baños:</label>
                <!--<div class="col-sm-10">-->
                    <input type="text" class="form-control" id="editarBanos" name="editarBanos" value="<?php echo $objPropiedades->getCantidadBanos()?>"/>
                <!--</div>-->
                </div>
                <div class="form-group">
                <label class="control-label col-sm-2" for="Descripcion">Habitaciones:</label>
                <!--<div class="col-sm-10">-->
                    <input type="text" class="form-control" id="editarHabitaciones" name="editarHabitaciones" value="<?php echo $objPropiedades->getCantidadHabitaciones()?>"/>
                <!--</div>-->
                </div>
                <div class="form-group">
                <label class="control-label col-sm-2" for="Descripcion">Dirección:</label>
                <!--<div class="col-sm-10">-->
                    <input type="text" class="form-control" id="editarDireccion" name="editarDireccion" value="<?php echo $objPropiedades->getDireccion()?>"/>
                <!--</div>-->
                </div>
            </form>
            
               <!-- <ul>
               
                    <li> </li>
                    <li><label>Tarifa:</label> $<input type="number" value="<?php echo
        $objPropiedades->getTarifa() ?>" id="editarTarifa" name="editarTarifa"></li>
                    <li><label>Baños: </label><input type="number" value="<?php echo
            $objPropiedades->getCantidadBanos() ?>" id="editarBanos" name="editarBanos" /></li>
                    <li><label>Habitaciones: </label><input type="number" value="<?php echo
            $objPropiedades->getCantidadHabitaciones() ?>" name="editarHabitaciones" id="editarHabitaciones"></li>
                    <li><label>Direccion: </label><input type="text" value="<?php echo
            $objPropiedades->getDireccion() ?>" name="editarDireccion" id="editarDireccion"/></li>
                </ul>-->
            </div>
            <div class="col-sm-6">
            </div>

        </div>


        <?php
        break;
        case 'eliminarPropiedad':
        $id_propiedad = $_REQUEST['id_propiedad'];
        Propiedades::remove($id_propiedad);
        echo "<script>alert('Propiedad Eliminada')</script>";
        echo "<script>window.location.href='../../vistas/propietario/propietario.php'</script>";
        
        
        break;
    default:
        break;


}



?>

