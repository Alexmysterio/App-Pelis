		function borraPeli(id){	
			
        $.ajax({
            url: 'borrapeli.php',  
            type: 'GET',
            // Form data
            //datos del formulario
            data:{id: id},
            //mientras enviamos el archivo
            beforeSend: function(){
             if(!confirm("Quieres borrar "+id)){
				exit(0);
			 }
             
            },
            //una vez finalizado correctamente
            success: function(data){
               
				    $('#mensajes').html("Borrado Correcto");
				    var miFila=document.getElementById(id);
				    miFila.parentNode.removeChild(miFila);
				
				
            },
            //si ha ocurrido un error
            error: function(){
				 $('#mensajes').html('Error en borrado');
            }
        });
        
		}