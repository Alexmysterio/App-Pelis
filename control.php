<?php
    // Verificamos que venimos del formulario de autenticacion
    if(isset($_POST['autenticar'])){ 
        include_once 'configBD.php';
        
        // Conexión con la base de datos.
        $conexion= mysqli_connect($host, $user, $password, $database, $port) or die("<br>Error en la conexion con la Base de Datos ".mysqli_error($conexion));

        // Evitamos un ataque de inyección SQL en el login o el password.
        $login = mysqli_real_escape_string($conexion,$_POST['Mail_login']); 
        $pass = mysqli_real_escape_string($conexion,$_POST['pass']);

        // Consulta SQL.
        $sql="select * from usuarios where Mail_login='$_POST[Mail_login]' and Password=PASSWORD('$_POST[pass]');";

        // Realizamos la consulta SQL y guardamos el resultado.
        $resultado= mysqli_query($conexion, $sql) or die(mysqli_error($conexion));

        // Obtenemos el número de filas que devuelve la consulta.
        // Si todo es correcto, debe ser solo una.
        $numFilas=  mysqli_num_rows($resultado);
        
        // Si solo hay una fila, crea una sesión con esas credenciales.
        if($numFilas==1){
            $fila=  mysqli_fetch_array($resultado,MYSQLI_ASSOC);

            //Crea una sesion o la propaga.
            session_start();

            //Fijamos las credenciales de sesión.
            $_SESSION['autenticado']=TRUE;
            $_SESSION['Mail_login']=$_POST['Mail_login'];
            $_SESSION['Rol']=$fila['Rol'];
            $_SESSION['ID']=$fila['ID'];
            $_SESSION['Nombreuser']=$fila['Nombre'];

           // Devolvemos al usuario a la página de inicio.
           header("Location: bienvenida.php");
        }else{
            // Si el login es incorrecto, devuelve a la página
            // de inicio con un mensaje de error.
            header("Location: index.php?error=FalloLoginPass");
        }
    } 
?>
