<?php
// Paso de los roles a valor numérico para facilitar
// las funciones de seguridad.
define("Administrador", "Administrador");
define("Registrado", "Registrado");

// Función que carga la cabecera, incluyendo el mensaje
// de bienvenida (usuario y rol).
function cabecera(){
    echo "<h1 class='col-12'>Peliculas Alex S.L.</h1>";
}

// Función que comprueba el rol del usuario para que no entre
// donde no debe.
function seguridad_re(){
    session_start();
    if($_SESSION['autenticado'] != TRUE){
      header("Location: index.php?error=NoAutenticado"); 
  exit();  
    }
        
}


function seguridad_ad($rol){
   session_start();
    if(isset($_SESSION['autenticado'])){
       if($_SESSION['rol'] == $rol){
            header("Location: index.php?error=SinPrivilegios");
            exit();
        }
    }else{
        session_destroy();
        header("Location: index.php?error=NoAutenticado");
        exit();
    }
       
}


// Función que oculta el cuadro de inicio de sesión una vez esta esté iniciada.
function ocultaLogin(){
  //
}
?>
