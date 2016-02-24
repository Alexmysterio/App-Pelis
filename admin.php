<html>
<head>
        <link rel="stylesheet" href="estilos.css" type="text/css"/> 
        <title>Panel de Administracion | Peliculas Alex S.L.</title>
        <script type="text/javascript" src="buscar.js" ></script>
        <script type="text/javascript" src="borrapeli.js" ></script>
        <script type="text/javascript" src="jquery-2.2.1.min.js" ></script>
</head>
<body>
    <?php
        require 'funciones.php';
        require 'control.php';
        seguridad_ad(Administrador);
        $usuario=$_SESSION['Nombreuser'];
        cabecera()
    ?>

	<div class="col-2">
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
    
    	<div class="col-5"><p>Buscar un Usuario</p>
            <form method="POST"> 
            <input type="search" name="busqueda" id="busqueda" onkeyup="buscauser();" size="20"><br><br> 
            
            </form> 
	</div>
    
        <div class="col-5"><p>Buscar una Pelicula</p>
            <form method="POST"> 
            <input type="search" name="busqueda" id="busqueda2" onkeyup="buscapeli();" size="20"><br><br>     
            </form> 
	</div>
    
    <div class="col-8 resultado" id="resultado">
        
    </div>
    
          
    
</body>
</html>