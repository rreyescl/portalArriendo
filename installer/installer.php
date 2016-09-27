<?php
/**
 * Created by PhpStorm.
 * User: RicardoReyes
 * Date: 25/09/2016
 * Time: 17:21
 */
require_once "../modelos/Conexion/Conexion.php";
$conn = new Conexion();
$conn->conectar(); // para crear la tabla

$sql = array("CREATE TABLE arrendatario (
  id int(11) NOT NULL,
  rut varchar(13) NOT NULL,
  nombre varchar(50) NOT NULL,
  apellido varchar(60) NOT NULL,
  telefono varchar(12) NOT NULL,
  clave varchar(20) NOT NULL,
  email varchar(200) NOT NULL,
  estado int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;", "
CREATE TABLE comunas (
  id int(11) NOT NULL,
  nombre varchar(50) NOT NULL,
  id_region int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;", "
CREATE TABLE habitaciones (
  id int(11) NOT NULL,
  propiedad_id int(11) NOT NULL,
  descripcion text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;", "
CREATE TABLE propiedades (
  id int(11) NOT NULL,
  propietario_id int(11) NOT NULL,
  direccion varchar(200) NOT NULL,
  descripcion text NOT NULL,
  tarifa int(11) NOT NULL,
  comuna_id int(11) NOT NULL,
  cantidad_banos int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;", "
CREATE TABLE propietario (
  id int(11) NOT NULL,
  rut varchar(13) NOT NULL,
  nombre varchar(50) NOT NULL,
  apellido varchar(50) NOT NULL,
  telefono varchar(12) NOT NULL,
  clave varchar(20) NOT NULL,
  email varchar(100) NOT NULL,
  estado int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;", "
CREATE TABLE region (
  id int(11) NOT NULL,
  nombre varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;", "
CREATE TABLE reservas (
  id int(11) NOT NULL,
  id_arrendatario int(11) NOT NULL,
  id_habitacion int(11) NOT NULL,
  desde date NOT NULL,
  hasta date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;", "
ALTER TABLE arrendatario
  ADD PRIMARY KEY (id);", "
ALTER TABLE comunas
  ADD PRIMARY KEY (id),
  ADD KEY id_region (id_region);", "  
ALTER TABLE habitaciones
  ADD PRIMARY KEY (id),
  ADD KEY propiedad_id (propiedad_id);", "  
ALTER TABLE propiedades
  ADD PRIMARY KEY (id),
  ADD KEY propietario_id (propietario_id);", "  
ALTER TABLE propietario
  ADD PRIMARY KEY (id);", "  
ALTER TABLE region
  ADD PRIMARY KEY (id);", "  
ALTER TABLE reservas
  ADD PRIMARY KEY (id),
  ADD KEY id_arrendatario (id_arrendatario),
  ADD KEY id_habitacion (id_habitacion);", "  
ALTER TABLE arrendatario
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;", "  
  ALTER TABLE comunas
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;", "  
  ALTER TABLE habitaciones
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;", "  
  ALTER TABLE propiedades
  MODIFY id int(11) NOT NULL AUTO_INCREMENT; ", " 
  ALTER TABLE propietario
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;", "  
  ALTER TABLE region
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;", "  
  ALTER TABLE reservas
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;
");

$conn = mysqli_connect($conn->getServidor(), $conn->getUsuario(), $conn->getClave(), $conn->getBd());

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

for ($i = 0; $i < count($sql); $i++) {
    if (mysqli_query($conn, $sql[$i])) {
        echo "Tabla creadas satisfactoriamente <br>";
    } else {
        echo "<br>Error creating table: " . mysqli_error($conn);
    }
}

