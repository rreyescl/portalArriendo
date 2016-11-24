<?php
include "../../modelos/Publicacion/Publicacion.php";
include "../../modelos/Propiedades/Propiedades.php";
include "../../modelos/Imagenes/Imagenes.php";

$accion = "";
if (isset($_POST['accion'])) {
    $accion = $_POST['accion'];
}

switch ($accion) {
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

        if ($objPublicacion->save() > 0) {
            echo "<script>alert('Publicación realizada!');</script>";
            echo "<script>window.location.href='../../vistas/propietario/propietario.php'</script>";
        }
        break;
        
    case 'cargarPublicacion':    
        $id_publicacion = $_POST['id_publicacion'];
        $objPublicacion = new Publicacion();
        $objPublicacion = $objPublicacion->load($id_publicacion);
        $objPropiedades = new Propiedades();
        $objPropiedades = $objPropiedades->load($objPublicacion->getIdPropiedad());
        $objImagenes = new Imagenes();
        $imagenes = $objImagenes->getImagenesByPropiedad($objPublicacion->getIdPropiedad());
        //echo "cantidad imagenes".count($imagenes);
        
        
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
  $i=0;
  $active ="";
  if(count($imagenes)>0){
   foreach($imagenes as $objImagenes){
    if($i==0){
        $active = "active";
    }else{
        $active ="";
    }
    ?>
    <div class="item <?php echo $active ?>">
      <center><img width="500px" height="500px" src="<?php echo $objImagenes->getRuta()?>" class="img-responsive" /></center>
      <div class="container">   
      <div class="carousel-caption"></div>     
      </div>
    </div>
        <?php
        $i++; 
        } 
        }else{
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
<div class="col-sm-10">
<br />
<ul>
    <li><label>Descripción: </label><?php echo $objPropiedades->getDescripcion()?></li>
    <li><label>Tarifa:</label> $<?php echo number_format($objPropiedades->getTarifa(),0,",",".")?></li>
    <li><label>Baños: </label><?php echo $objPropiedades->getCantidadBanos()?></li>
    <li><label>Habitaciones: </label><?php echo $objPropiedades->getCantidadHabitaciones() ?></li>
    <li><label>Dirección: </label><?php echo $objPropiedades->getDireccion()?></li>
    <li><label>Fecha disponible:</label><?php echo "Desde ".$objPublicacion->getDesde()." Hasta ".$objPublicacion->getHasta()?></li>
</ul>
</div>
<div class="col-sm-2">
                                
</div>

</div>
<!-- /.carousel -->
        
        
        <?php
        
        
        break;
    default:
        break;

}
