<!DOCTYPE html>
<?php
    // Función que se inicia al pulsa el botón de registro.
    // Aquí haría falta que se ejecute el Javascript antes
    // que el PHP, para evitar sobrecargar el servidor con
    // datos incorrectos (validación JS con función registro()).
    
    

    if(isset($_POST['registrar'])){
        include_once 'configBD.php';
        include_once 'funciones.php';
             
        // Conexión con la base de datos.
        $conexion = mysqli_connect($host, $user, $password, $database, $port) 
                or die("Error en la conexión con la Base de Datos.".mysqli_error($conexion));

        // Inserción SQL del usuario. 
        // Solo inserta login, password y email porque la BBDD
        // asigna los valores por defecto de los demás campos.
        $sql="insert into usuarios (Mail_login, Password, Nombre, Apellidos, Nacimiento) values('$_POST[email]',"
            . "PASSWORD('$_POST[password]'), '$_POST[nombre]', '$_POST[apellidos]', '$_POST[nacimiento]');";
        mysqli_query($conexion,$sql) or die("Error al insertar Usuario.".mysqli_error($conexion));

        // Cierre de la conexión. Se devuelve al usuario
        // a la página principal.
        mysqli_close($conexion);
        header("Location: index.php");
    }
?>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="estilos.css" type="text/css"/> 
    <title>Registro</title>
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
      
      <div class="col-5 formuRegistro">
          <h3>Formulario de registro.</h3>
          <form name="registro" id="formularioRegistro" method="POST" action="">
			Correo Electronico:
            <input type="text" name="email" placeholder="Correo electrónico" required/><br>
            Contraseña:
            <input type="password" name="password" placeholder="Contraseña" required/><br>
            Nombre:
            <input type="text" name="nombre" placeholder="Nombre" required/><br>
            Apellidos:
            <input type="text" name="apellidos" placeholder="Apellidos" required/><br>
            Fecha de Nacimiento:
            <input type="date" name="nacimiento" placeholder="dd/mm/aaaa" required/><br>
            <input type="submit" name="registrar" value="Registrarse" />


          </form>
      </div>  
  </body>
</html>
