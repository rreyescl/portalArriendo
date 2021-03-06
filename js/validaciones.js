function cargarFrame(id) {
    console.log(id);
    var titulo = "";
    switch (id) {
        case 'mispropiedades':
            titulo = "Mis Propiedades";
            document.getElementById("propiedades").style.display = "block";
            document.getElementById("publicaciones").style.display = "none";
            document.getElementById("cuenta").style.display = "none";
            break;
        case 'mispublicaciones':
            titulo = "Mis Publicaciones";
            document.getElementById("publicaciones").style.display = "block";
            document.getElementById("cuenta").style.display = "none";
            document.getElementById("propiedades").style.display = "none";
            break;
        case 'micuenta':
            titulo = "Mi Cuenta";
            document.getElementById("cuenta").style.display = "block";
            document.getElementById("propiedades").style.display = "none";
            document.getElementById("publicaciones").style.display = "none";
            break;
        case 'misarriendos':
            titulo
            document.getElementById("arriendos").style.display = "block";
            document.getElementById("cuentaArrendatario").style.display = "none";
            document.getElementById("publicacionesArrendatario").style.display = "none";
            break;
        case 'publicaciones':
            document.getElementById("publicacionesArrendatario").style.display = "block";
            document.getElementById("arriendos").style.display = "none";
            document.getElementById("cuentaArrendatario").style.display = "none";
            break;
        case 'micuentaArrendatario':
            document.getElementById("cuentaArrendatario").style.display = "block";
            document.getElementById("arriendos").style.display = "none";
            document.getElementById("publicacionesArrendatario").style.display = "none";
            break;
        default:
            break;
    }
    document.getElementById("titulo").textContent = titulo;
}

function validarRegistro() {
    document.getElementById("registerForm").submit();
}

function validarLogin() {
    document.getElementById("loginForm").submit();
}

function validarActualizar() {
    document.getElementById("formActualizar").submit();
}

function agregarFotos() {
    var contenido = document.getElementById("fotos").innerHTML;
    //alert(contenido);
    contenido += "<br><input type='file' class='form-control' id='foto' name='foto[]'>";
    document.getElementById("fotos").innerHTML = contenido;
}

function guardarPropiedad() {
    document.getElementById("agregarPropiedadForm").submit();
}
function validarPublicacion() {
    document.getElementById("formPublicacion").submit();
}

function cargarComunasByRegion() {
//muestra la segunda lista
    var id_region = document.getElementById("guardarRegion").value;
    console.log("id region " + id_region);
    var xmlhttp;

    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("listaComunas").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST", "../../controllers/comunas/ComunasController.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("id_region=" + id_region);
}

function cargarPropiedad(id_propiedad) {
    var id_region = document.getElementById("guardarRegion").value;
    console.log("id region " + id_region);
    var xmlhttp;

    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("bodyPropiedad").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST", "../../controllers/Propiedades/PropiedadesController.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("id_propiedad=" + id_propiedad + "&accion=cargarPropiedad");
}

function revisarPublicacion(id_publicacion) {
    var xmlhttp;

    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("divPublicacion").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST", "../../controllers/publicacion/PublicacionController.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("id_publicacion=" + id_publicacion + "&accion=cargarPublicacion");
}

function calificar(propiedad_id){

    var xmlhttp;
    var nota = document.getElementById("notaSeleccionada_"+propiedad_id).value;
    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            alert(xmlhttp.responseText);
        }
    }
    xmlhttp.open("POST", "../../controllers/calificacion/CalificacionController.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("propiedad_id=" + propiedad_id + "&nota="+nota+"&accion=calificarPropiedad");
}

function eliminarPropiedad(propiedad_id) {

    if (confirm("Esta seguro de eliminar esta propiedad?")) {
        window.location.href = '../../controllers/Propiedades/PropiedadesController.php?id_propiedad=' + propiedad_id + "&accion=eliminarPropiedad";
    }

}

function setearNota(nota,id_propiedad){
    document.getElementById("notaSeleccionada_"+id_propiedad).value=nota;


}

function reservar(arrendatario_id) {
    var id_propiedad = document.getElementById("idpropiedad").value;
    var id_publicacion = document.getElementById("idpublicacion").value;
    var reservaDesde = document.getElementById("reservaDesde_" + id_publicacion).value;
    var reservaHasta = document.getElementById("reservaHasta_" + id_publicacion).value;
    var disponibilidadDesde = document.getElementById("disponibilidadDesde").value;
    var disponibilidadHasta = document.getElementById("disponibilidadHasta").value;


    if (reservaDesde != "" && reservaHasta != "") {

        if ((reservaDesde >= disponibilidadDesde) && (reservaHasta <= disponibilidadHasta)) {
            console.log("propiedad "+id_propiedad );
            console.log("publicacion "+id_publicacion);
            if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {// code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    //document.getElementById("divPublicacion").innerHTML = xmlhttp.responseText;
                    var respuesta = xmlhttp.responseText;
                    console.log(respuesta);
                    if(respuesta == "reservada"){
                        alert("Propiedad Reservada");
                        document.getElementById("reservar").style.display="none";
                    }
                }
            }
            xmlhttp.open("POST", "../../controllers/reservas/ReservasController.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("id_arrendatario=" + arrendatario_id + "&id_propiedad="+id_propiedad+"&desde="+reservaDesde+"&hasta="+reservaHasta+"&accion=reservarPublicacion");

        } else {
            alert("Escoja un rango de fecha disponible según lo publicado.");
        }
    }else{
        alert("Si desea reservar, selecione un rango de fecha");
    }



}

function editarPropiedad(propiedad_id) {
    document.getElementById("editarPropiedad").submit();

}