<!DOCTYPE html>

<html>
    <head>
		<link rel="stylesheet" href="estilos.css" type="text/css"/> 
        <title>Peliculas Alex S.L.</title>
    </head>
<body>
    <?php
        include_once 'funciones.php';
        include_once 'control.php';
        session_start();
        $usuario=$_SESSION['Nombreuser'];
        cabecera();
    ?>
        
	<div class="menulateral col-4">
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
    
	<div class="bienvenida col-4">
		<p>Bienvenido al sitio Web de "Peliculas Alex S.L.</p>
		<p>Aqui podras encontrar para descargar de forma totalmente gratuita peliculas de todos los generos posibles actualmente,
		por cortesia de nuestra comunidad de usuarios que hacen esto posible. ¿A que estas esperando? Comienza a Descargar!!</p>
	</div>
	<div class="buscador col-4"><p>Buscar una pelicula</p>
            <form method="POST" action="busqueda.php"> 
            <input type="text" name="busqueda" size="20"><br><br> 
            <input type="submit" value="Buscar" name="buscar"> 
            </form> 
	</div>


</body>
</html>
