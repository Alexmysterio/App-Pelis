<html>
<head>
        <link rel="stylesheet" href="estilos.css" type="text/css"/> 
        <title>Panel de Administracion | Peliculas Alex S.L.</title>

</head>
<body>
    <?php
        require 'funciones.php';
        require 'control.php';
        session_start();
        seguridad_ad(Administrador);
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