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
    <title>Registro | PelisMania</title>
  </head>
  <body>

    <?php
        require 'funciones.php';
        require 'control.php';
        session_start();
        $usuario=$_SESSION[Nombreuser];
        cabecera()
    ?>
      <div class="col-12 centraform">
      <div class="formuRegistro">
          <h3>Formulario de registro.</h3>
          <form name="registro" class="formularioRegistro" id="formularioRegistro" method="POST" action="">
            Correo Electronico:
            <input type="text" class="texto" name="email" placeholder="Correo electrónico" required/><br>
            Contraseña:
            <input type="password" class="texto" name="password" placeholder="Contraseña" required/><br>
            Nombre:
            <input type="text" class="texto" name="nombre" placeholder="Nombre" required/><br>
            Apellidos:
            <input type="text" class="texto" name="apellidos" placeholder="Apellidos" required/><br>
            Fecha de Nacimiento:
            <input type="date" class="texto" name="nacimiento" placeholder="dd/mm/aaaa" required/><br>
            <input type="submit" class="registrar" name="registrar" value="Registrarse" onclick="alert('Registro realizado con exito.')"/>
          </form>
      </div>  
      </div>
  </body>
</html>
