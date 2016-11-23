<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/estilos.css">
    <link rel="stylesheet" href="../../lib/bootstrap/bootstrap.min.css">
    <script src="../../lib/js/jquery.js"></script>
    <script src="../../lib/bootstrap/bootstrap.min.js"></script>
    <script src="../../js/validaciones.js"></script>
    </head>
<?php

include "../../modelos/Usuario/Usuario.php";
session_start();

$objPropietario = $_SESSION['usuario'];
/*echo "<pre>";
print_r($objPropietario);
echo "</pre>";*/
$_SESSION['cargado'] = true;
if(!isset($objPropietario)){
    header("location:  ../index/index.php");
}
?>
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
                <li><a href="#" style="background-color:  orange;color:white"><span
                            class="glyphicon glyphicon-user"></span> <?php echo $objPropietario->getNombre()." ".$objPropietario->getApellido() ?></a></li>
                <li><a href="../../controllers/usuario/UsuarioController.php?accion=logout"  style="background-color:  orange;color:white"><span
                            class="glyphicon glyphicon-log-out"></span> Salir</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <!--<h3>Collapsible Navbar</h3>
    <p>In this example, the navigation bar is hidden on small screens and replaced by a button in the top right corner (try to re-size this window).
    <p>Only when the button is clicked, the navigation bar will be displayed.</p>-->
</div>




