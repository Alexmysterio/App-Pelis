<!DOCTYPE html>

<html>
<head>
		<link rel="stylesheet" href="estilos.css" type="text/css"/> 
        <title>Listado de Peliculas</title>

</head>
<body>
    <?php
        require 'funciones.php';
        require 'control.php';
        session_start();
        cabecera()
    ?>
    
	<div class="col-4">
		<h3>Menu</h3>
		<p><a href="index.php">Inicio</a></p>
		<p><a href="peliculas.php">Peliculas</a></p>
		<p><a href="publicar.php">Publicar</a></p>
		<?php if(!isset($_SESSION['autenticado'])){
		echo "<p><a href='login.php'>Iniciar Sesion</a></p>
		<p><a href='registro.php'>Registro</a></p>";}
		if(isset($_SESSION['autenticado'])){
		echo "<p><a href='logout.php'>Cerrar Sesion</a></p>";}
		?>
	</div>

	<div class="col-4"><?php
		include_once 'configBD.php';

		//Conexion a la base de datos
		$conexion = mysqli_connect($host,$user, $password, $database, $port) or die("error".mysqli_error($conexion));
		
		////Obteniendo registros de la base de datos a traves de una consulta SQL
		$consulta = "SELECT peliculas.nombre 'nombrepeli', genero, director, usuarios.Nombre 'nombreautor', enlace FROM peliculas,usuarios where peliculas.ID_Autor = usuarios.ID;";
		$resultado = mysqli_query ($conexion, $consulta) or die ("Error".mysqli_error($conexion).$consulta);
		print "<table>
				<tr><th>Nombre</th><th>Genero</th><th>Director</th><th>Autor</th><th>Enlace</th></tr>";
		while($fila=  mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
        echo "<tr><td>$fila[nombrepeli]</td> <td>$fila[genero]</td> <td>$fila[director]</td> <td>$fila[nombreautor]</td> <td><a href=http://$fila[enlace]>Descarga</a></td></tr>";
		}print "</table>";
		mysqli_free_result($resultado);
		mysqli_close($conexion);
		?>
	</div>
          



</body>
</html>
