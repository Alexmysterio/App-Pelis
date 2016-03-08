<?php
include_once 'control.php';
session_start();
?>
    <html>
    <head>
		<link rel="stylesheet" href="estilos.css" type="text/css"/> 
                <title>Mi Perfil |<?php echo ($_SESSION['Nombreuser']);?>| PelisMania</title>
    </head>
<body>
    <?php
        require 'funciones.php';
        require 'control.php';
        session_start();
        $usuario=$_SESSION['Nombreuser'];
        cabecera()
    ?>

        <div class="col-12 buscador">
            <form method="POST" action="busqueda.php"> 
                <input type="text" class="busqueda" name="busqueda" size="40" placeholder="Buscar una pelicula">
            </form> 
	</div>
    
    
        <div class="col-12 perfil"><?php
		include_once 'configBD.php';

		//Conexion a la base de datos
		$conexion = mysqli_connect($host,$user, $password, $database, $port) or die("error".mysqli_error($conexion));
		
		////Obteniendo registros de la base de datos a traves de una consulta SQL
		$consulta = "select Mail_login, Password, Nombre, Apellidos, Nacimiento from usuarios where Mail_login = '$_SESSION[Mail_login]';";
		$resultado = mysqli_query ($conexion, $consulta) or die ("Error".mysqli_error($conexion).$consulta);
		while($fila=  mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
        echo "Mail: $fila[Mail_login]<p>Contraseña: $fila[Password]<p>Nombre: $fila[Nombre]<p>Apellidos: $fila[Apellidos]<p>Fecha de Nacimiento: $fila[Nacimiento]";
		}
		mysqli_free_result($resultado);
		mysqli_close($conexion);
		?>
	</div>
</body>
</html>
