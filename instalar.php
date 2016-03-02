<?php

	include_once 'configBD.php';
    echo "Conectando con el SGBD... ";
    $conex = mysqli_connect($host, $user, $password) or die("Error.".mysqli_error($conex));
    
    echo "OK.<br>Creando la base de datos... ";
    $sql = "create database if not exists $database;";
    mysqli_query($conex, $sql) or die("Error.".mysqli_error($conex));
    
    echo "OK.<br>Estableciendo base de datos a usar...";
    $sql = "use $database;";
	mysqli_query($conex, $sql) or die("Error.".mysqli_error($conex));
	
	echo "OK.<br>Creando tabla Usuarios...";
	$sql = "CREATE TABLE if not exists usuarios (
  ID int(11) NOT NULL AUTO_INCREMENT,
  Mail_login varchar(128) UNIQUE NOT NULL,
  Password varchar(256) NOT NULL,
  Nombre varchar(256) NOT NULL,
  Apellidos varchar(256) NOT NULL,
  Nacimiento date NOT NULL,
  Rol varchar(20) NOT NULL DEFAULT 'Registrado',
  PRIMARY KEY (ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
	mysqli_query($conex, $sql) or die("Error.".mysqli_error($conex));

	echo "OK.<br>Creando tabla Peliculas...";
	$sql = "CREATE TABLE if not exists peliculas (
  ID int(11) NOT NULL AUTO_INCREMENT,
  Nombre varchar(256) NOT NULL,
  Genero varchar(256) NOT NULL,
  Director varchar(256) NOT NULL,
  ID_Autor int(11) NOT NULL,
  Enlace varchar(4096) NOT NULL,
  PRIMARY KEY (ID),
  KEY ID_Autor (ID_Autor),
  CONSTRAINT peliculas_ibfk_1 FOREIGN KEY (ID_Autor) REFERENCES usuarios (ID) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
	mysqli_query($conex, $sql) or die("Error.".mysqli_error($conex));
	
	echo "OK.<br>Creando la tabla Valoraciones...";
	$sql = "CREATE TABLE if not exists valoraciones (
  ID_usuario int(11) NOT NULL,
  ID_pelicula int(11) NOT NULL,
  PRIMARY KEY (ID_usuario,ID_pelicula),
  KEY ID_pelicula (ID_pelicula),
  CONSTRAINT valoraciones_ibfk_1 FOREIGN KEY (ID_usuario) REFERENCES usuarios (ID) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT valoraciones_ibfk_2 FOREIGN KEY (ID_pelicula) REFERENCES peliculas (ID) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;;";
	mysqli_query($conex, $sql) or die("Error.".mysqli_error($conex));
	
	echo "OK.<br>Creando usuario Administrador... ";
    $sql = "insert into usuarios values('1', 'alexmysterio.wow@gmail.com', PASSWORD('6033108'), 'Administrador', 'Principal', '1995-01-28', 'Administrador')";
    mysqli_query($conex, $sql) or die("Error.".mysqli_error($conex));
    
    echo "OK.<br>Creando pelicula de ejemplo...";
    $sql = "INSERT INTO `pelis`.`peliculas` (`ID`, `Nombre`, `Genero`, `Director`, `ID_Autor`, `Enlace`) VALUES ('1', 'Creed: La Leyenda de Rocky', 'Drama', 'ni puñetera idea xD', '1', 'www.google.com')";
    mysqli_query($conex, $sql) or die("Error.".mysqli_error($conex));
	mysqli_close($conex);

	echo "OK.<br>Proceso de instalación correcto.<br>Por favor,borre el directorio de instalación.";

?>
