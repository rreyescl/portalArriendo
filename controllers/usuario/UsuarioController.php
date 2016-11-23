<?php
include "../../modelos/Usuario/Usuario.php";
$accion = "";

if (isset($_POST['accion'])) {
    $accion = $_POST['accion'];
}
if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];

}

switch ($accion) {
    case "login":
        $rut = $_POST['loginRut'];
        $clave = $_POST['loginPwd'];
        $objUsuario = new Usuario();

        if ($objUsuario->validarUsuario($rut, $clave)) {
            $objUsuario = $objUsuario->load($rut);
            session_start();
            $_SESSION['usuario'] = $objUsuario;
            //print_r($objUsuario);
            $perfil = $objUsuario->getIdPerfil();

            if ($perfil == 1) {

            }
            if ($perfil == 2) {
                echo "<script>window.location.href='../../vistas/propietario/propietario.php'</script>";
            }
            if ($perfil == 3) {

            }
        } else {
            echo "<script>alert('Rut o clave incorrecta, intentelo de nuevo')</script>";
            //echo "<script>window.location.href='../../vistas/index/index.php';</script>";
        }
        break;
    case "register":
        //echo "entro al register";
        $_SESSION['cargado'] = null;
        $rut = $_POST['registerRut'];
        $nombre = $_POST['registerNombre'];
        $apellido = $_POST['registerApellido'];
        $telefono = $_POST['registerTelefono'];
        $email = $_POST['registerEmail'];
        $clave = $_POST['registerClave'];
        $preguntaSecreta = $_POST['registerPregSecreta'];
        $respuesta = $_POST['registerRespuesta'];
        $perfil = $_POST['registerRadioPerfil'];

        $objUsuario = new Usuario();
        $objUsuario->setRut($rut);
        $objUsuario->setNombre($nombre);
        $objUsuario->setApellido($apellido);
        $objUsuario->setTelefono($telefono);
        $objUsuario->setEmail($email);
        $objUsuario->setClave($clave);
        $objUsuario->setIdPerfil($perfil);
        $objUsuario->setPreguntaSecretaId($preguntaSecreta);
        $objUsuario->setEstado(0);
        $objUsuario->setRespuestaSecreta($respuesta);
        if ($objUsuario->save()) {
            echo "<script>alert('Registrado correctamente');</script>";
        } else {
            echo "<script>alert('Error al registrarse');</script>";
        } // guardar

        break;
    case 'merge':
        $id = $_POST['mergeId'];
        $rut = $_POST['mergeRut'];
        $nombre = $_POST['mergeNombre'];
        $apellido = $_POST['mergeApellido'];
        $telefono = $_POST['mergeTelefono'];
        $email = $_POST['mergeEmail'];
        $clave = $_POST['mergeClave'];

        $objUsuario = new Usuario();
        $objUsuario->setId($id);
        $objUsuario->setRut($rut);
        $objUsuario->setNombre($nombre);
        $objUsuario->setApellido($apellido);
        $objUsuario->setTelefono($telefono);
        $objUsuario->setEmail($email);
        $objUsuario->setClave($clave);

        $objUsuario = $objUsuario->merge();
        session_start();
        $_SESSION['usuario'] = $objUsuario;
        //print_r($_SESSION['usuario']);

        echo "<script>alert('Actualizado correctamente');</script>";
        echo "<script>window.location.href='../../vistas/propietario/propietario.php'</script>";
        //actualizar

        break;
    case 'logout':
        session_start();
        session_destroy();
        echo "<script>window.location.href='../../vistas/index/index.php'</script>";
        break;
    default:
        break;
}
