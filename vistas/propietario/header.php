<?php

include "../index/header.php";



session_start();


$objPropietario = $_SESSION['usuario'];
echo "<pre>";
print_r($objPropietario);
echo "</pre>";
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
            <a class="navbar-brand" href="#">WebSiteName</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Page 1-1</a></li>
                        <li><a href="#">Page 1-2</a></li>
                        <li><a href="#">Page 1-3</a></li>
                    </ul>
                </li>
                <li><a href="#">Page 2</a></li>
                <li><a href="#">Page 3</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Bienvenido <?php echo $objPropietario->getNombre()  ?></a></li>
                <li><a href="../../controllers/propietario/PropietarioController.php?accion=logout"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <!--<h3>Collapsible Navbar</h3>
    <p>In this example, the navigation bar is hidden on small screens and replaced by a button in the top right corner (try to re-size this window).
    <p>Only when the button is clicked, the navigation bar will be displayed.</p>-->
</div>




