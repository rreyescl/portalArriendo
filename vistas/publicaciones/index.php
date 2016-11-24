<?php
include "../index/header.php";
include "../../modelos/Publicacion/Publicacion.php";
include "../../modelos/Usuario/Usuario.php";
include "../../modelos/Propiedades/Propiedades.php";
include "../../modelos/Imagenes/Imagenes.php";

?>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/portalArriendo/portalArriendo/">Inicio</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="../publicaciones/">Publicaciones</a></li>
                
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" data-toggle="modal" data-target="#myModal" style="background-color:  orange;color:white"><span
                            class="glyphicon glyphicon-log-in"></span> Iniciar Sesión</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="row">
    <input  type="text" id="vistaArrendatario" value="">
<div id="publicaciones" style="display:block">
                <?php
                $objPropiedades = new Propiedades();
                $objImagenes = new Imagenes();
                if(count(Publicacion::getPublicaciones()) > 0){
                    foreach (Publicacion::getPublicaciones() as $objPublicacion){
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
                            <button type="button" class="btn btn-default col-sm-4" data-toggle="modal" data-target="#modalRevisionPublicacion" onclick="javascript:revisarPublicacion(<?php echo $objPublicacion->getIdPublicacion() ?>);document.getElementById("vistaArrendatario").value="arrendatario">
                                <span class="glyphicon glyphicon-search" > Revisar</span></button>
                        </a>
                        <?php
                    }
                }else{
                    echo "<center>No tiene publicaciones</center> <br>";
                }

                ?>
            </div>
</div>
<!-- revision publicacion-->
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>

        </div>
    </div>


<!-- Modal LOGIN-->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Iniciar Sesión</h4>
                </div>
                <div class="modal-body">
                    <form id="loginForm" class="form-horizontal" method="post" action="../../controllers/usuario/UsuarioController.php">
                        <input type="hidden" name="accion" value="login"/>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="rut">Rut:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="loginRut" name="loginRut">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="pwd">Clave:</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="loginPwd" name="loginPwd">
                            </div>
                        </div>


                    </form>
                    <button type="button" class="btn btn-default" onclick="javascript:validarLogin()">Iniciar Sesión</button>
                    <button class="btn btn-default" data-toggle="modal" data-target="#myModalRegister">Registrar
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>

        </div>
    </div>

    <!-- modal register -->
    <div class="modal fade" id="myModalRegister" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Formulario de registro</h4>
                </div>
                <div class="modal-body">
                    <form id="registerForm" class="form-horizontal" method="post" action="../../controllers/usuario/UsuarioController.php">
                        <input type="hidden" name="accion" value="register"/>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="rut">Rut:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="registerRut" name="registerRut">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nombre">Nombre:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="registerNombre" name="registerNombre">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="apellido">Apellido:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="registerApellido" name="registerApellido">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="telefono">Telefono:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="registerTelefono" name="registerTelefono">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Email:</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="registerEmail" name="registerEmail">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="rut">Clave:</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="registerClave" name="registerClave">
                            </div>
                        </div>

                        <label class="control-label col-sm-2" for="rut">Perfil:</label>
                        <div class="col-sm-5">
                            <div class="radio">
                                <label><input type="radio" name="registerRadioPerfil" value="2"/>Propietario</label>
                            </div>                            
                        </div>
                        <div class="col-sm-5">
                            <div class="radio">
                                <label><input type="radio" name="registerRadioPerfil" value="3"/>Arrendatario</label>
                            </div>
                        </div>                               
                </form>
                </div>
                <br />
                <div class="modal-footer">                
                    <button type="button" class="btn btn-default" onclick="javascript:validarRegistro()">Guardar</button>
                    <button class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
                <!--<div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>-->
            </div>
        </div>
    </div>

<?php
