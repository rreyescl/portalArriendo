<?php

require_once"../../modelos/Propietario/Propietario.php";


$accion = "login";
$rut ="18.117.358-0";
$clave ="asdf";
if(isset($_GET['accion'])){
    $accion = $_GET['accion'];
}elseif(isset($_POST['accion'])  && isset($_POST['rut']) && isset($_POST['clave'])){
    $accion = $_POST['accion'];
    $tipo = $_POST['tipo'];
    $rut = $_POST['rut'];
    $clave = $_POST['clave'];
}

switch($accion){
    case "login":
        $objPropietario = new Propietario();
        $objPropietario->setRut($rut);
        $objPropietario->setClave($clave);

        if($objPropietario->validaPropietario()){
            $objPropietario = $objPropietario->cargarPropietario();
            session_start();
            $_SESSION['propietario'] = $objPropietario;
            header("location: ../../vistas/propietario/propietario.php");
        }
        break;
    case "logout":
        session_destroy();
        header("location: ../../vistas/index/index.php");
        break;
    case "register":
        break;
    default:
        break;
}




