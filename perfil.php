<?php
include_once 'control.php';
session_start();
?>
    <html>
    <head>
		<link rel="stylesheet" href="estilos.css" type="text/css"/> 
                <title>Mi Perfil | <?php echo ($_SESSION['Nombreuser']);?> | PelisMania</title>
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
    
        <!--Muestra la informacion del Usuario-->
        <div class="col-12 perfil"><?php
		include_once 'configBD.php';

		//Conexion a la base de datos
		$conexion = mysqli_connect($host,$user, $password, $database, $port) or die("error".mysqli_error($conexion));
		
		////Obteniendo registros de la base de datos a traves de una consulta SQL
		$consulta = "select Mail_login, Password, Nombre, Apellidos, Nacimiento from usuarios where Mail_login = '$_SESSION[Mail_login]';";
		$resultado = mysqli_query ($conexion, $consulta) or die ("Error".mysqli_error($conexion).$consulta);
		while($fila=  mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
        echo "<div class='perfil'><table><tr><th>Mail:</th> <td>$fila[Mail_login]</td></tr><tr><th>Contraseña:</th><td> $fila[Password]</td></tr><tr><th>Nombre:</th><td> $fila[Nombre]</td></tr><tr><th>Apellidos:</th><td> $fila[Apellidos]</td></tr><tr><th>Fecha de Nacimiento:</th><td> $fila[Nacimiento]</td></tr></table></div>";
		}
		mysqli_free_result($resultado);
		mysqli_close($conexion);
		?>
	</div>
</body>
</html>
