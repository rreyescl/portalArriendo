<?php

require_once"../../modelos/Propietario/Propietario.php";
require_once "../../modelos/Arrendatario/Arrendatario.php";

$accion = "login";
$tipo = "propietario";
$rut ="18.117.358-0";
$clave ="asdf";
if(isset($_POST['accion']) && isset($_POST['tipo']) && isset($_POST['rut']) && isset($_POST['clave'])){
    $accion = $_POST['accion'];
    $tipo = $_POST['tipo'];
    $rut = $_POST['rut'];
    $clave = $_POST['clave'];
}

if($accion=="login"){
    switch ($tipo){
        case "propietario":
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
        case "arrendatario";
            break;
        default:
            break;
    }
}


