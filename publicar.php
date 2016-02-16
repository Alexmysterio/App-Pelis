<!DOCTYPE html>
<?php
    // Función que se inicia al pulsa el botón de registro.
    // Aquí haría falta que se ejecute el Javascript antes
    // que el PHP, para evitar sobrecargar el servidor con
    // datos incorrectos (validación JS con función registro()).
    
        session_start();
    
    if(isset($_POST['anadepeli'])){
        include_once 'configBD.php';
        include_once 'funciones.php';
        include_once 'control.php';
        $idautor=$_SESSION['ID'];

        // Conexión con la base de datos.
        $conexion = mysqli_connect($host, $user, $password, $database, $port) 
                or die("Error en la conexión con la Base de Datos.".mysqli_error($conexion));

        // Inserción SQL del usuario. 
        // Solo inserta login, password y email porque la BBDD
        // asigna los valores por defecto de los demás campos.
        $sql="insert into peliculas (Nombre, Genero, Director, ID_Autor, Enlace) values('$_POST[Nombre]',"
            . "'$_POST[Genero]', '$_POST[Director]', '$idautor', '$_POST[Enlace]');";
        mysqli_query($conexion,$sql) or die("Error al insertar pelicula.".mysqli_error($conexion));

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
        seguridad_re();
        cabecera();



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
          <form name="anadepeli" id="formularioanadepeli" method="POST" action="">
			Nombre de la Pelicula:
            <input type="text" name="Nombre" placeholder="Nombre" required/><br>
            Genero:
            <input type="text" name="Genero" placeholder="Genero" required/><br>
            Director:
            <input type="text" name="Director" placeholder="Director" required/><br>
            Enlace:
            <input type="text" name="Enlace" placeholder="Enlace" required/><br>          

            <input type="submit" name="anadepeli" value="Añadir" />


          </form>
      </div>  
  </body>
</html>

