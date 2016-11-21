<?php

$accion="";

if(isset($_POST['accion'])){
    $accion =  $_POST['accion'];
}

switch($accion){
    case "login":
        break;
    case "register":
        break;
    default:
        break;
}
