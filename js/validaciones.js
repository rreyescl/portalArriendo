

function cargarFrame(id){
    var titulo = "";
    switch(id){
        case 'mispropiedades':
            titulo ="Mis Propiedades";
            document.getElementById("propiedades").style.display="block";
            document.getElementById("publicaciones").style.display="none";
            document.getElementById("cuenta").style.display="none";
            break;
        case 'mispublicaciones':
            titulo = "Mis Publicaciones";
            document.getElementById("publicaciones").style.display="block";
            document.getElementById("cuenta").style.display="none";
            document.getElementById("propiedades").style.display="none";
            break;
        case 'micuenta':
            titulo = "Mi Cuenta";
            document.getElementById("cuenta").style.display="block";
            document.getElementById("propiedades").style.display="none";
            document.getElementById("publicaciones").style.display="none";
            break;
        default:
            break;
    }
    document.getElementById("titulo").textContent = titulo;
}

function validarRegistro(){
    document.getElementById("registerForm").submit();
}

function validarLogin(){
    document.getElementById("loginForm").submit();
}

function validarActualizar(){
    document.getElementById("formActualizar").submit();
}

function agregarFotos(){
    var contenido = document.getElementById("fotos").innerHTML;
   //alert(contenido);
    contenido += "<br><input type='file' class='form-control' id='foto' name='foto[]'>";
    document.getElementById("fotos").innerHTML=contenido;
}