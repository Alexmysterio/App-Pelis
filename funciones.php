<?php
include_once 'control.php';
session_start();
// Paso de los roles a valor numérico para facilitar
// las funciones de seguridad.
define("Administrador", "Administrador");
define("Registrado", "Registrado");

// Función que carga la cabecera + el Menu de la web

function cabecera(){
    echo '    <header>
		<div class="wrapper">
		<div class="logo">PelisMania</div>
			
		<nav>
                <a href="index.php">Inicio</a>
		<a href="peliculas.php">Peliculas</a>
		<a href="publicar.php">Publicar</a>';
		 if(!isset($_SESSION["autenticado"])){
		echo "<a href='login.php'>Iniciar Sesion</a>
		<a href='registro.php'>Registro</a>";};
		if(isset($_SESSION["autenticado"])){
		echo "<a href='perfil.php'>Mi Perfil</a>
                     <a href='logout.php'>Cerrar Sesion</a>";};
                if($_SESSION["Rol"] == Administrador){
                echo  "<a href='admin.php'>Panel de Administrador </a>";};
                echo'	</nav>
		</div>
    </header>';
}

// Función que comprueba el rol del usuario para que no entre
// donde no debe.
function seguridad_re(){
    session_start();
    if($_SESSION['autenticado'] != TRUE){
      header("Location: login.php?error=Debes Iniciar Sesion"); 
  exit();  
    }
        
}

function seguridad_ad($Rol){
   session_start();
    if(isset($_SESSION['autenticado'])){
       if($_SESSION['Rol'] != $Rol){
            header("Location: index.php?error=No tienes privilegios para acceder");
            exit();
        }
    }else{
        session_destroy();
        header("Location: index.php?error=Acceso solo para Administradores");
        exit();
    }
}

?>