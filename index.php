<!DOCTYPE html>

<html>
    <head>
        <script type="text/javascript" src="jquery-2.2.1.min.js" ></script>
        <script type="text/javascript" src="header.js" ></script>
        <link rel="stylesheet" href="estilos.css" type="text/css"/> 
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>PelisMania</title>
    </head>
<body>
    <?php
        include_once 'funciones.php';
        include_once 'control.php';
        session_start();
        $usuario=$_SESSION['Nombreuser'];
        cabecera();
    ?>

    <!--Muestra el error obtenido con GET-->
    <div class="error"> 
        <?php       if(isset($_GET['error'])){
            echo "$_GET[error]";
        };
        ?>
    </div>
    
    <!--Buscador-->
        <div class="col-12 buscador">
            <form method="POST" action="busqueda.php"> 
                <input type="text" class="busqueda" name="busqueda" size="40" placeholder="Buscar una pelicula">
            </form> 
	</div>
    
	<div class="col-12 bienvenida">
            <div>
		<p>Bienvenido al sitio Web de "PelisMania"</p>
		<p>Aqui podras encontrar para descargar de forma totalmente gratuita peliculas de todos los generos posibles actualmente,
		por cortesia de nuestra comunidad de usuarios que hacen esto posible. ¿A que estas esperando? Comienza a Descargar!!</p>
                <p> Al entrar al sitio Web estas aceptando la obligada cumplimentacion de las siguientes condiciones de uso:</p>                
                <p></p><p>1. Introducción</p><p>

Las presentes condiciones generales de uso de la página web, regulan los términos y condiciones de acceso y uso de PelisMania, propiedad de Peliculas Alex S.L., con domicilio en Instituto Fco.Javier de Burgos y con Código de Identificación Fiscal número 123456789, en adelante, «la Empresa», que el usuario del Portal deberá de leer y aceptar para usar todos los servicios e información que se facilitan desde el portal. El mero acceso y/o utilización del portal, de todos o parte de sus contenidos y/o servicios significa la plena aceptación de las presentes condiciones generales de uso. 
                </p><p></p><p>
2. Condiciones de uso
                </p><p>
Las presentes condiciones generales de uso del portal regulan el acceso y la utilización del portal, incluyendo los contenidos y los servicios puestos a disposición de los usuarios en y/o a través del portal, bien por el portal, bien por sus usuarios, bien por terceros. No obstante, el acceso y la utilización de ciertos contenidos y/o servicios puede encontrarse sometido a determinadas condiciones específicas.
                </p><p></p><p>
3.   Modificaciones
                </p><p>
La empresa se reserva la facultad de modificar en cualquier momento las condiciones generales de uso del portal. En todo caso, se recomienda que consulte periódicamente los presentes términos de uso del portal, ya que pueden ser modificados.
                </p><p></p><p>
4. Obligaciones del Usuario
                </p><p>
El usuario deberá respetar en todo momento los términos y condiciones establecidos en las presentes condiciones generales de uso del portal. De forma expresa el usuario manifiesta que utilizará el portal de forma diligente y asumiendo cualquier responsabilidad que pudiera derivarse del incumplimiento de las normas.

Así mismo, el usuario no podrá utilizar el portal para transmitir, almacenar, divulgar promover o distribuir datos o contenidos que sean portadores de virus o cualquier otro código informático, archivos o programas diseñados para interrumpir, destruir o perjudicar el funcionamiento de cualquier programa o equipo informático o de telecomunicaciones.
                </p><p></p><p>
5. Responsabilidad del portal
                </p><p>
El usuario conoce y acepta que el portal no otorga ninguna garantía de cualquier naturaleza, ya sea expresa o implícita, sobre los datos, contenidos, información y servicios que se incorporan y ofrecen desde el Portal.

Exceptuando los casos que la Ley imponga expresamente lo contrario, y exclusivamente con la medida y extensión en que lo imponga, el Portal no garantiza ni asume responsabilidad alguna respecto a los posibles daños y perjuicios causados por el uso y utilización de la información, datos y servicios del Portal.

En todo caso, el Portal excluye cualquier responsabilidad por los daños y perjuicios que puedan deberse a la información y/o servicios prestados o suministrados por terceros diferentes de la Empresa. Toda responsabilidad será del tercero ya sea proveedor o colaborador.
                </p><p></p><p>
6. Propiedad intelectual e industrial
                </p><p>
Todos los contenidos, marcas, logos, dibujos, documentación, programas informáticos o cualquier otro elemento susceptible de protección por la legislación de propiedad intelectual o industrial, que sean accesibles en el portal corresponden exclusivamente a la empresa o a sus legítimos titulares y quedan expresamente reservados todos los derechos sobre los mismos. Queda expresamente prohibida la creación de enlaces de hipertexto (links) a cualquier elemento integrante de las páginas web del Portal sin la autorización de la empresa, siempre que no sean a una página web del Portal que no requiera identificación o autenticación para su acceso, o el mismo esté restringido.

En cualquier caso, el portal se reserva todos los derechos sobre los contenidos, información datos y servicios que ostente sobre los mismos. El portal no concede ninguna licencia o autorización de uso al usuario sobre sus contenidos, datos o servicios, distinta de la que expresamente se detalle en las presentes condiciones generales de uso del portal.
                </p><p></p><p>
7. Legislación aplicable, jurisdicción competente y notificaciones
                </p><p>
Las presentes condiciones se rigen y se interpretan de acuerdo con las Leyes de España. Para cualquier reclamación serán competentes los juzgados y tribunales de Motril. Todas las notificaciones, requerimientos, peticiones y otras comunicaciones que el Usuario desee efectuar a la Empresa titular del Portal deberán realizarse por escrito y se entenderá que han sido correctamente realizadas cuando hayan sido recibidas en la siguiente dirección administracion@pelismania.com.
                </p><p></p><p>
        </div>	
        </div>



</body>
</html>
