<?php
include "header.php";
include "../../modelos/Region/Region.php";
include "../../modelos/Propiedades/Propiedades.php";
include "../../modelos/Imagenes/Imagenes.php";
include "../../modelos/Publicacion/Publicacion.php";
include "../../modelos/Reservas/Reservas.php";
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <br/>
            <div class="panel-group" id="panel-535601">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a id="misarriendos" onclick="javascript:cargarFrame(this.id);" class="panel-title collapsed"
                           data-toggle="collapse" data-parent="#panel-535601" href="#">Mis reservas</a>
                    </div>
                    <!--	<div id="panel-element-622588" class="panel-collapse collapse">
                            <div class="panel-body">
                                Anim pariatur cliche...
                            </div>
                        </div>-->
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a id="publicaciones" onclick="javascript:cargarFrame(this.id);"
                           class="panel-title collapsed" data-toggle="collapse" data-parent="#panel-535601" href="#">
                            Publicaciones</a>
                    </div>
                    <!--	<div id="panel-element-622588" class="panel-collapse collapse">
                            <div class="panel-body">
                                Anim pariatur cliche...
                            </div>
                        </div>-->
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a id="micuentaArrendatario" onclick="javascript:cargarFrame(this.id);"
                           class="panel-title collapsed"
                           data-toggle="collapse" data-parent="#panel-535601" href="#">Mi cuenta</a>
                    </div>
                    <!--<div id="panel-element-343734" class="panel-collapse collapse">
                        <div class="panel-body">
                            Anim pariatur cliche...
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <h3 id="titulo">

            </h3>

            <div class="modal fade" id="modalRevisionPublicacion" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body" id="divPublicacion">

                        </div>
                        <div class="modal-footer">
                            <button id="reservar" type="button" class="btn btn-default" onclick="javascript:reservar(<?php echo $objArrendatario->getId() ?>)">Reservar</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>

                </div>
            </div>

            <div id="publicacionesArrendatario" style="display:none">
                <?php
                $objPropiedades = new Propiedades();
                $objImagenes = new Imagenes();
                if (count(Publicacion::getPublicaciones()) > 0) {
                    foreach (Publicacion::getPublicaciones() as $objPublicacion) {
                        $publicacionPropiedad = $objPropiedades->load($objPublicacion->getIdPropiedad());
                        //echo "<pre>";
//                        print_r($objPublicacion);
//                        echo "</pre>";

                        $publicacionImagenPropiedad = $objImagenes->getUltimaImagenByPropiedad($publicacionPropiedad->getId());
                        ?>
                        <a href="#" class="list-group-item col-sm-12">
                            <div class="col-sm-8">
                                <img width="40px" height="40px"
                                     src="<?php echo $publicacionImagenPropiedad->getRuta() ?> "/> <?php echo $publicacionPropiedad->getDescripcion() ?>
                            </div>
                            <button type="button" class="btn btn-default col-sm-4" data-toggle="modal"
                                    data-target="#modalRevisionPublicacion"
                                    onclick="javascript:revisarPublicacion(<?php echo $objPublicacion->getIdPublicacion() ?>)">
                                <span class="glyphicon glyphicon-search"> Revisar</span></button>
                        </a>
                        <?php
                    }
                } else {
                    echo "<center>No tiene publicaciones</center> <br>";
                }

                ?>
            </div>
            <div id="arriendos" style="display:none">
                <div class="row">
                    <div class="list-group">
                        <?php
                        $objImagenes = null;
                        if (count(Reservas::getReservasByArrendatarioId($objArrendatario->getId())) > 0) {

                            foreach (Reservas::getReservasByArrendatarioId($objArrendatario->getId()) as $objReserva) {
                                $objPropiedades = new Propiedades();
                                $objPropiedades = $objPropiedades->load($objReserva->getIdPropiedad());

                                $objImagenes = new Imagenes();
                                $objImagenes = $objImagenes->getUltimaImagenByPropiedad($objPropiedades->getId());
                                ?>
                                <a href="#" class="list-group-item col-sm-12">
                                    <div class="col-sm-6">
                                        <img width="40px" height="40px"
                                             src="<?php echo $objImagenes->getRuta() ?> "/> <?php echo $objPropiedades->getDescripcion() ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="hidden" id="notaSeleccionada_<?php echo $objPropiedades->getId()?>" />
                                        <label>Seleccione valoración:</label>
                                        <input onclick="javascript:setearNota(1,<?php echo $objPropiedades->getId()?>)"  type="radio" name="calificacion" id="calificacion1" value="1">1
                                        <input onclick="javascript:setearNota(2,<?php echo $objPropiedades->getId()?>)"  type="radio" name="calificacion" id="calificacion2" value="2">2
                                        <input onclick="javascript:setearNota(3,<?php echo $objPropiedades->getId()?>)"  type="radio" name="calificacion" id="calificacion3" value="3">3
                                        <input onclick="javascript:setearNota(4,<?php echo $objPropiedades->getId()?>)"  type="radio" name="calificacion" id="calificacion4" value="4">4
                                        <input onclick="javascript:setearNota(5,<?php echo $objPropiedades->getId()?>)"  type="radio" name="calificacion" id="calificacion5" value="5">5
                                        <input onclick="javascript:setearNota(6,<?php echo $objPropiedades->getId()?>)"  type="radio" name="calificacion" id="calificacion6" value="6">6
                                        <input onclick="javascript:setearNota(7,<?php echo $objPropiedades->getId()?>)"  type="radio" name="calificacion" id="calificacion7" value="7">7
                                    </div>
                                    <button onclick="javascript:calificar(<?php echo $objPropiedades->getId()?>)" type="button" class="btn btn-default col-sm-2"><span
                                            class="glyphicon glyphicon-ok" >Calificar</span></button>
                                </a>
                                <?php
                            }
                        } else {
                            //echo "<br>No posee propiedades agregadas";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div id="cuentaArrendatario" style="display:none">
                <form id="formActualizar" class="form-horizontal" method="post"
                      action="../../controllers/usuario/UsuarioController.php">
                    <input type="hidden" name="accion" value="merge"/>
                    <input type="hidden" name="mergeId" value="<?php echo $objArrendatario->getId() ?>"/>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="rut">Rut:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="mergeRut" name="mergeRut"
                                   value="<?php echo $objArrendatario->getRut() ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="nombre">Nombre:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="mergeNombre" name="mergeNombre"
                                   value="<?php echo $objArrendatario->getNombre() ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="apellido">Apellido:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="mergeApellido" name="mergeApellido"
                                   value="<?php echo $objArrendatario->getApellido() ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="telefono">Telefono:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="mergeTelefono" name="mergeTelefono"
                                   value="<?php echo $objArrendatario->getTelefono() ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="mergeEmail" name="mergeEmail"
                                   value="<?php echo $objArrendatario->getEmail() ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="rut">Clave:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="mergeClave" name="mergeClave"
                                   value="<?php echo $objArrendatario->getClave() ?>">
                        </div>
                    </div>

                    <br>

                </form>
                <div class="row">
                    <div class="col-sm-10"></div>
                    <button type="button" class="btn btn-default" onclick="javascript:validarActualizar()">
                        Actualizar
                    </button>
                    <!--<button class="btn btn-default" data-dismiss="modal">Cancelar</button>-->
                </div>

            </div>



            <div class="modal fade" id="modalEditarPropiedad" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body" id="bodyPropiedad">
                            <!---- asdasdasasd-->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>

                </div>
            </div>


            <div class="modal fade" id="modalPublicarPropiedad" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Publicar disponibilidad de su propiedad</h4>
                        </div>
                        <div class="modal-body" id="bodyPublicarPropiedad">
                            <form id="formPublicacion" method="post"
                                  action="../../controllers/publicacion/PublicacionController.php">
                                <!--<label class="control-label col-sm-2" for="direccion">Disponibilidad:</label>-->
                                <input type="hidden" name="accion" value="guardarPublicacion"/>
                                <input type="hidden" id="propiedadAPublicar" name="propiedadAPublicar">
                                <input type="hidden" name="publicarPropietario"
                                       value="<?php echo $objPropietario->getId() ?>">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="desde">Desde:</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="desde"
                                               name="desde">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="hasta">Hasta:</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="hasta"
                                               name="hasta">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <br><br><br><br><br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" onclick="javascript:validarPublicacion()">
                                Publicar
                            </button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>

                </div>
            </div>


            <div class="modal fade" id="modalAgregarPropiedad" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Agregar propiedad</h4>
                        </div>
                        <div class="modal-body">
                            <form id="agregarPropiedadForm" class="form-horizontal" method="post"
                                  action="../../controllers/propiedades/PropiedadesController.php"
                                  enctype="multipart/form-data">
                                <input type="hidden" name="accion" value="guardarPropiedad"/>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="direccion">Dirección:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="guardarDireccion"
                                               name="guardarDireccion">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="descripcion">Descripción:</label>
                                    <div class="col-sm-10">
                                            <textarea class="form-control" id="guardarDescripcion"
                                                      name="guardarDescripcion"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="tarifa">Tarifa:</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="guardarTarifa"
                                               name="guardarTarifa">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="tarifa">Baños:</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="guardarBanos"
                                               name="guardarBanos">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="tarifa">Habitaciones:</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="guadarHabitaciones"
                                               name="guadarHabitaciones">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="rut">Region:</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="guardarRegion" id="guardarRegion"
                                                onchange="javascript:cargarComunasByRegion()">
                                            <option value="-1">Seleccione Region...</option>
                                            <?php
                                            foreach (Region::cargarRegiones() as $objRegion) {
                                                ?>
                                                <option
                                                    value="<?php echo $objRegion->getId() ?>"><?php echo utf8_encode($objRegion->getNombre()) ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="rut">Comuna:</label>
                                    <div class="col-sm-10" id="listaComunas">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="rut">Foto:</label>
                                    <div class="col-sm-9" id="fotos">
                                        <input type="file" class="form-control" id="foto" name="foto[]"/>
                                    </div>
                                    <div class="col-sm-1">
                                            <span class="glyphicon glyphicon-plus-sign" style="cursor:pointer;"
                                                  onclick="javascript:agregarFotos()"></span>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="tarifa">Disponibilidad:</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="guardarDesde"
                                               name="guadarDesde">
                                        <input type="date" class="form-control" id="guardarHasta"
                                               name="guadarHasta">
                                    </div>
                                </div>
                            </form>
                            </button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" onclick="javascript:guardarPropiedad()">
                                Guardar Propiedad
                            </button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

