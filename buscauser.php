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
    $sql ="select * from usuarios where Mail_login like '%$b%';";
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
        echo '<table><tr><th>ID</th><th>Mail_login</th><th>Password</th><th>Nombre</th><th>Apellidos</th><th>Nacimiento</th><th>Rol</th></tr>';
        // La variable $resultados contiene el array que se genera 
        // en la consulta, así que obtenemos los datos y 
        // los mostramos en un bucle.
        while($resultados = mysqli_fetch_array($consulta,MYSQLI_ASSOC)) {
            $ID = $resultados['ID'];
            $Mail_login = $resultados['Mail_login'];
            $Password = $resultados['Password'];
            $Nombre = $resultados['Nombre'];
            $Apellidos = $resultados['Apellidos'];
            $Nacimiento = $resultados['Nacimiento'];
            $Rol = $resultados['Rol'];
            
            // Resultado de la búsqueda.
            $mensaje .= "
            <tr><td>$ID</td><td>$Mail_login</td><td>$Password</td><td>$Nombre</td><td>$Apellidos</td><td>$Nacimiento</td><td>$Rol</td></tr>";    
        }
        // Muestra los resultados, cierra la conexión y sal de la función.
        echo $mensaje;
        echo '</table>';
        mysqli_close($conex);
        exit();
    }
}
?>