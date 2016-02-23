$(document).ready(function() {
    $("#resultado").html('<p>Aquí aparecen los resultados de la búsqueda</p>');
});

function buscauser() {
    var textoBusqueda = $("input#busqueda").val();
    $.ajax({
        url: 'buscauser.php',  
        type: 'POST',
        data:{valorBusqueda:textoBusqueda},
        success: function(data){
            $('#resultado').html(data);
        },
        error: function(){
            $('#resultado').html('Error en busqueda');
        }
    });
}

function buscapeli() {
    var textoBusqueda = $("input#busqueda2").val();
    $.ajax({
        url: 'buscapeli.php',  
        type: 'POST',
        data:{valorBusqueda:textoBusqueda},
        success: function(data){
            $('#resultado').html(data);
        },
        error: function(){
            $('#resultado').html('Error en busqueda');
        }
    });
}