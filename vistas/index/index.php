<?php
include "header.php";

include "../../modelos/Imagenes/Imagenes.php";


?>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/portalArriendo/portalArriendo/index.php">Inicio</a>
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

<div class="container-fluid text-center">
    <div class="row content">
        <div class="row">
		<div class="col-md-12">
			<div class="carousel slide" id="carousel-777712">
				<ol class="carousel-indicators">
					<li class="active" data-slide-to="0" data-target="#carousel-777712">
					</li>
					<li data-slide-to="1" data-target="#carousel-777712">
					</li>
					<li data-slide-to="2" data-target="#carousel-777712">
					</li>
				</ol>
				<div class="carousel-inner">
                    <?php
$i = 0;
if (count(Imagenes::getUltimasTresImagenes()) > 0) {

    foreach (Imagenes::getUltimasTresImagenes() as $objImagen) {
        $active = "";
        if ($i == 0) {
            $active = "active";
        } ?>
                        <div class="item">
                            <img width="1600px" height="500px" alt="Carousel Bootstrap First" src="<?php echo
$objImagen->getRuta() ?>" />
                            <div class="carousel-caption">
                                
                            </div>
                        </div>
                    <?php
        $i++;
    }
}

?>
					<div class="item active">
						<img width="1600px" height="500px" alt="Carousel Bootstrap First" src="http://www.hectour.cl/wp-content/uploads/2015/02/vina2.png" />
						<div class="carousel-caption">
							<!--<h4>
								First Thumbnail label
							</h4>
							<p>
								Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
							</p>-->
						</div>
					</div>
                        <!--<div class="item">
						<img width="1600px" height="500px" alt="Carousel Bootstrap Second" src="http://lorempixel.com/output/sports-q-c-1600-500-2.jpg" />
						<div class="carousel-caption">
							<h4>
								Second Thumbnail label
							</h4>
							<p>
								Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
							</p>
						</div>
					</div>-->
					<!--<div class="item">
						<img width="1600px" height="500px" alt="Carousel Bootstrap Third" src="http://lorempixel.com/output/sports-q-c-1600-500-3.jpg" />
						<div class="carousel-caption">
							<h4>
								Third Thumbnail label
							</h4>
							<p>
								Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
							</p>
						</div>
					</div>-->
				</div> <a class="left carousel-control" href="#carousel-777712" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-777712" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
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

</div>
</div>

<footer class="container-fluid text-center" style="background-color: #101010;">
    <p></p>
</footer>
</body>
</html>

