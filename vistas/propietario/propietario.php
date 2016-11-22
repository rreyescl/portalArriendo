<?php
include "header.php";

?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
        <br/>
			<div class="panel-group" id="panel-535601">
				<div class="panel panel-default">
					<div class="panel-heading">
						 <a id="mispropiedades" onclick="javascript:cargarFrame(this.id);" class="panel-title collapsed" data-toggle="collapse" data-parent="#panel-535601" href="#">Mis propiedades</a>
					</div>
				<!--	<div id="panel-element-622588" class="panel-collapse collapse">
						<div class="panel-body">
							Anim pariatur cliche...
						</div>
					</div>-->
				</div>
                <div class="panel panel-default">
					<div class="panel-heading">
						 <a id="mispublicaciones" onclick="javascript:cargarFrame(this.id);" class="panel-title collapsed" data-toggle="collapse" data-parent="#panel-535601" href="#">Mis publicaciones</a>
					</div>
				<!--	<div id="panel-element-622588" class="panel-collapse collapse">
						<div class="panel-body">
							Anim pariatur cliche...
						</div>
					</div>-->
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						 <a id="micuenta" onclick="javascript:cargarFrame(this.id);" class="panel-title collapsed" data-toggle="collapse" data-parent="#panel-535601" href="#">Mi cuenta</a>
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
            <div id="propiedades"></div>
            <div id="publicaciones"></div>
            <div id="cuenta">
                <form class="form-horizontal" method="post"
                          action="../../controllers/login/LoginController.php.php">
                        <input type="hidden" name="accion" value="merge"/>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nombre">Nombre:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="registerNombre" name="registerNombre" value="<?php echo $objPropietario->getNombre()?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="apellido">Apellido:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="registerApellido" name="registerApellido" value="<?php echo $objPropietario->getApellido()?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="telefono">Telefono:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="registerTelefono" name="registerTelefono" value="<?php echo $objPropietario->getTelefono()?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Email:</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="registerEmail" name="registerEmail" value="<?php echo $objPropietario->getEmail()?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="rut">Clave:</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="registerClave" name="registerClave" value="<?php $objPropietario->getClave()?>">
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
		</div>
	</div>
</div>

