 <!DOCTYPE html>
 <html>
    <head>
        <meta charset="UTF-8">
        <title>Inicio de Sesion | PelisMania</title>
        <link rel="stylesheet" href="estilos.css" type="text/css"/> 
    </head>
    <body>
 <?php
        // Inclusión de funciones.php y control.php
        include_once 'funciones.php';
        include_once 'control.php';
        
        // Inicia la sesión.
        session_start();
        $usuario=$_SESSION[Nombreuser];
        cabecera();
        ?>
      
    <!--Muestra el error obtenido con GET-->
    <div class="error"> <?php       
        if(isset($_GET['error'])){
            echo "$_GET[error]";
        };
        ?>
    </div>
    
    <!--Formulario de Inicio de Sesion-->
        <div class="col-12 centraform">
            <div class="formuLogin">
                <h3>Inicie sesión</h3>
                <form name="iniciaSesion" class='formularioLogin' id="formularioSesion" method="post" action="control.php">
                    <input type="text" class='texto' name="Mail_login" placeholder="Correo Electronico" required /><br>
                    <input type="password" class='texto' name="pass" placeholder="Contraseña" required /><br>
                    <input type="submit" class='autenticar' name="autenticar" value="Iniciar sesión" onclick="inicioSesion(this);" /><br>
                    <p>¿No estás registrado? <a href="registro.php">Regístrate ahora.</a></p>
                </form>
            </div>
        </div>
    </body>
</html>
