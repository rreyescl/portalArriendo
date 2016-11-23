<?php

$accion="";

if(isset($_POST['accion'])){
    $accion =  $_POST['accion'];
}

switch($accion){
    case "login":
        break;
    case "register":
        $nombre = $_POST['registerNombre'];
        $apellido = $_POST['registerApellido'];
        $telefono = $_POST['registerTelefono'];
        $email = $_POST['registerEmail'];
        $clave = $_POST['registerClave'];
        $preguntaSecreta = $_POST['registerPregSecreta'];
        $respuesta = $_POST['registerRespuesta'];
        $perfil = $_POST['registerRadioPerfil'];
        
        break;
    default:
        break;
}
