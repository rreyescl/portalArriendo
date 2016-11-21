<?php
include "header.php";


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
            <a class="navbar-brand" href="#">Logo</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Projects</a></li>
                <li><a href="#">Contact</a></li>
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
        <!-- <div class="col-sm-2 sidenav">
             <p><a href="#">Link</a></p>
             <p><a href="#">Link</a></p>
             <p><a href="#">Link</a></p>
         </div>-->
        <div class="col-sm-12 text-left">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                    <center>
                        <img width="640px" height="480px" src="../../img/Arriendo-departamento-Vina-con-piscina-cerca-playa-sector-Mall_1.jpg" alt="Chania">
                        </center>
                    </div>
                    <div class="item">
                    <center>
                        <img width="640px" height="480px" src="../../img/vendo-departamento-vina-del-mar-renaca-espectacular-vista-mar-4-dormitorios-2-estacionamientos--14478994103.jpg" alt="Chania">
                        </center>
                    </div>
                    <div class="item">
                    <center>                    
                        <img width="640px" height="480px" src="../../img/original_11111.jpg" alt="Flower">
                        </center>
                    </div>

<!--                    <div class="item">
                        <img src="img_flower2.jpg" alt="Flower">
                    </div>-->
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <!--<div class="col-sm-2 sidenav">
            <div class="well">
                <p>ADS</p>
            </div>
            <div class="well">
                <p>ADS</p>
            </div>
        </div>-->
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
                    <form class="form-horizontal" method="post" action="../../controllers/login/LoginController.php">
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
                    <button type="submit" class="btn btn-default" >Iniciar Sesión</button>
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
                    <form class="form-horizontal" method="post"
                          action="../../controllers/login/LoginController.php.php">
                        <input type="hidden" name="accion" value="register"/>
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
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="rut">Pregunta secreta:</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="registerPregSecreta" id="registerPregSecreta">
                                    <option value="-1">Seleccione pregunta...</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="respuesta">Respuesta:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="registerRespuesta" name="registerRespuesta">
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
                    <button type="button" class="btn btn-default">Guardar</button>
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

<footer class="container-fluid text-center">
    <p>Footer Text</p>
</footer>
</body>
</html>

