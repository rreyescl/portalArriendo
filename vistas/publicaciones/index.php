<?php
include "header.php";

?>
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
                <li><a href="#">Contactenos</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" data-toggle="modal" data-target="#myModal" style="background-color:  orange;color:white"><span
                            class="glyphicon glyphicon-log-in"></span> Iniciar Sesión</a></li>
            </ul>
        </div>
    </div>
</nav>
<?php
/**
 * Created by PhpStorm.
 * User: RicardoReyes
 * Date: 24/11/2016
 * Time: 4:57
 */