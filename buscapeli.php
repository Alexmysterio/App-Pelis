<?php
require 'configBD.php';
require 'control.php';
require 'funciones.php';
session_start();
// $b es el valor que llega del jQuery.
$b = $_POST['valorBusqueda'];
// Muestra los resultados de la búsqueda, y si no se busca nada deja
// los resultados en blanco.
if (isset($b) && $b != "") {
    // Devuelveme los documentos con un nombre que contenga la consulta.
    // Falta añadir el id_usuario.
    $conex = mysqli_connect($host, $user, $password, $database, $port);
     
    // Búsqueda. Solo muestra los documentos públicos o del usuario.
    $sql ="SELECT peliculas.id 'idpeli', usuarios.id 'iduser', peliculas.nombre 'nombrepeli', genero, director, usuarios.Nombre 'nombreautor', enlace FROM peliculas,usuarios where peliculas.ID_Autor = usuarios.ID and peliculas.nombre like '%$b%';";
    $consulta = mysqli_query($conex, $sql) or die("Error en la consulta SQL");
    
    //Obtiene la cantidad de filas que hay en la consulta.
    $numFilas = mysqli_num_rows($consulta);
    
    // Inicia $mensaje vacío, para que exista la variable.
    $mensaje="";
    
    // Si no hay resultados:
    if ($numFilas == 0) {
        $mensaje = "<p>Sin resultados.</p>";
    } else {
        //Si hay resultados:
        echo 'Resultados de la búsqueda: <strong>'.$b.'</strong>';
        echo '<table><tr><th>Nombre</th><th>Genero</th><th>Director</th><th>Autor</th><th>Enlace</th></tr>';
        // La variable $resultados contiene el array que se genera 
        // en la consulta, así que obtenemos los datos y 
        // los mostramos en un bucle.
        while($resultados = mysqli_fetch_array($consulta,MYSQLI_ASSOC)) {
            $id = $resulados['peliculas.id'];
            $Nombre = $resultados['nombrepeli'];
            $Genero = $resultados['genero'];
            $Director = $resultados['director'];
            $Autor = $resultados['nombreautor'];
            $Enlace = $resultados['enlace'];
            
            // Resultado de la búsqueda.
            $mensaje .= "
            <tr><td>$Nombre</td><td>$Genero</td><td>$Director</td><td>$Autor</td><td><a href='http://$Enlace'>Descargar</a></td><td><button onclick='borraPeli($IDpeli);'>Borrar</button></td></tr>";    
        }
        // Muestra los resultados, cierra la conexión y sal de la función.
        echo $mensaje;
        echo '</table>';
        mysqli_close($conex);
        exit();
    }
}
?>