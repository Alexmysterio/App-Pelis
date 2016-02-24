		function borraPeli(varid,varTabla){	
			
        $.ajax({
            url: 'borrapeli.php',  
            type: 'GET',
            // Form data
            //datos del formulario
            data:{tabla:varTabla , id: varid},
            //mientras enviamos el archivo
            beforeSend: function(){
             if(!confirm("Quieres borrar "+varid)){
				exit(0);
			 }
             
            },
            //una vez finalizado correctamente
            success: function(data){
               
				    $('#mensajes').html("Borrado Correcto");
				    var miFila=document.getElementById(varid);
				    miFila.parentNode.removeChild(miFila);
				
				
            },
            //si ha ocurrido un error
            error: function(){
				 $('#mensajes').html('Error en borrado');
            }
        });
        
		}