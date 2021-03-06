<!DOCTYPE html>
<html>
<head>
		<link rel="stylesheet" href="estilos.css" type="text/css"/> 
        <title>Busqueda | PelisMania</title>

</head>
<body>
    <?php
        require 'funciones.php';
        require 'control.php';
        session_start();
        $usuario=$_SESSION['Nombreuser'];
        cabecera()
    ?>
    <!--Buscador de Peliculas-->
        <div class="col-12 buscador">
            <form method="POST" action="busqueda.php"> 
                <input type="text" class="busqueda" name="busqueda" size="40" placeholder="Buscar una pelicula">
            </form> 
	</div>

    <!--Tabla que muestra los resultados de las peliculas buscadas-->
	<div class="col-12 listapelis"><?php
		include_once 'configBD.php';
                $busqueda = $_POST['busqueda'];
		//Conexion a la base de datos
		$conexion = mysqli_connect($host,$user, $password, $database, $port) or die("error".mysqli_error($conexion));
		
		////Obteniendo registros de la base de datos a traves de una consulta SQL
		$consulta = "SELECT peliculas.nombre 'nombrepeli', genero, director, usuarios.Nombre 'nombreautor', enlace FROM peliculas,usuarios where peliculas.ID_Autor = usuarios.ID and peliculas.nombre like '%$busqueda%';";
		$resultado = mysqli_query ($conexion, $consulta) or die ("Error".mysqli_error($conexion).$consulta);
		print "<table><tr><th>Nombre</th><th>Genero</th><th>Director</th><th>Autor</th><th>Enlace</th></tr>";
		while($fila=  mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
                echo "<tr><td>$fila[nombrepeli]</td> <td>$fila[genero]</td> <td>$fila[director]</td> <td>$fila[nombreautor]</td> <td><a target='_blank' href=http://$fila[enlace] class='botondescarga'>Descarga</a></td></tr>";
		}print "</table>";
		mysqli_free_result($resultado);
		mysqli_close($conexion);
		?>
	</div>


</body>
</html>
