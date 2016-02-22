<html>
    <head>
		<link rel="stylesheet" href="estilos.css" type="text/css"/> 
        <title>Mi Perfil | Peliculas Alex S.L.</title>
    </head>
<body>
    <?php
        require 'funciones.php';
        require 'control.php';
        session_start();
        $usuario=$_SESSION[Nombreuser];
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
		echo "<p><a href='perfil.php'>Mi Perfil($usuario)</a></p>
                     <p><a href='logout.php'>Cerrar Sesion</a></p>";}
                if($_SESSION['Rol'] == Administrador){
                echo  "<p><a href='admin.php'>Panel de Administrador </a></p>";}
                ?>
	</div>
    
    
        <div class="col-4"><?php
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
