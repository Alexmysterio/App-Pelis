<?php
session_start();
include_once 'control.php';
include_once 'funciones.php';
			if($_SESSION['Rol']!='Administrador'){
			header ("location:index.php?error=SinPrivilegios");
			exit();
			}

// Borra el registro de la base de datos cuya
// tabla me llega en GET tabla y la primarikey es el segundo get
// $_GET[tabla] me llega la tabla
// $_GET[urlVuelta] me da el url de la p�gina origen
// $_GET ... Siguientes los valores de los campos de la primary key

if(isset($_GET['id'])){
    include_once  'configBD.php';
    $conexion=  mysqli_connect($host, $user, $password, $database, $port)  or die("<br>Error en la conexion con la BD ".mysqli_error($conexion));
    $sql="Delete from usuarios where id= '$_GET[id]';";
    
    mysqli_query($conexion, $sql) or die("Error en el borrado");
    mysqli_close($conexion);
     echo "OK";
    
    //Volvemos al url desde donde nos llamaron para el borrado de la fila  
    //header("Location:".$_GET['urlVuelta']); 
    
}else{
	echo "Valores recibidos $_GET[id]";
}
?>
