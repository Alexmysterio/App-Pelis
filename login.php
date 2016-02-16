 <!DOCTYPE html>
 <html>
    <head>
        <meta charset="UTF-8">
        <title>Inicio de Sesion </title>
        <link rel="stylesheet" href="estilos.css" type="text/css"/> 
    </head>
    <body>
 <?php
        // Inclusión de funciones.php y control.php
        include_once 'funciones.php';
        include_once 'control.php';
        
        // Inicia la sesión.
        session_start();
        cabecera();
        
        // Si hay mensaje de error, muéstralo.
        if(isset($_GET['error'])){
            echo "$_GET[error]";
        }
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

            <div class="col-2 formuLogin">
                <h3>Inicie sesión</h3>
                <form name="iniciaSesion" id="formularioSesion" method="post" action="control.php">
                    <input type="text" name="Mail_login" placeholder="Correo Electronico" required /><br>
                    <input type="password" name="pass" placeholder="Contraseña" required /><br>
                    <input type="submit" name="autenticar" value="Iniciar sesión" onclick="inicioSesion(this);" /><br>
                    <p>¿No estás registrado? <a href="registro.php">Regístrate ahora.</a></p>
                </form>
            </div>
    </body>
</html>
