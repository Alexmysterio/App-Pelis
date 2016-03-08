<html>
<head>
        <link rel="stylesheet" href="estilos.css" type="text/css"/> 
        <title>Panel de Administracion | PelisMania</title>
        <script type="text/javascript" src="buscar.js" ></script>
        <script type="text/javascript" src="borrapeli.js" ></script>
        <script type="text/javascript" src="borrauser.js" ></script>
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

    
    	<div class="col-6 buscadmin"><p>Buscar un Usuario</p>
            <form method="POST"> 
                <input type="search" class="busqueda" name="busqueda" placeholder="Usuario" id="busqueda" onkeyup="buscauser();" size="20"><br><br> 
            
            </form> 
	</div>
    
        <div class="col-6 buscadmin"><p>Buscar una Pelicula</p>
            <form method="POST"> 
                <input type="search" class="busqueda" name="busqueda" placeholder="Pelicula" id="busqueda2" onkeyup="buscapeli();" size="20"><br><br>     
            </form> 
	</div>
    
    <div class="col-12 resultado" id="resultado">
        
    </div>
    
          
    
</body>
</html>