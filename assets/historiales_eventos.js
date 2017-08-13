$(document).ready(function()
{

      $('#selc_historial').on('change', function(){

		var historial= $('#selc_historial').val();
		switch(historial)
		{	
            case 'HG':
                $('#mostrar_oficinas').hide(1000);
                $('#mostrar_usuario').hide(1000);
                $('#mostrar_fecha').hide(1000);
                $('#titulo_historial').hide();
                $('#historiales_eventos').hide(500);
                $('#historiales_usuarios').hide(500);
               

            break;	
			case 'HE':
				$('#mostrar_oficinas').show(1000);			
				$('#mostrar_usuario').show(1000);
                $('#mostrar_fecha').show(1000);
                $('#titulo_historial').text('HISTORIAL DE EVENTOS');
                $('#historiales_usuarios').hide(500);
                $('#historiales_eventos').show(500);

                 $('#suc_historial').on('click', function () 
                    {
                        var sucursal_historial=$('#suc_historial').val();
                        
                        $.post(base_url+'Chistoriales/historial_eventos_oficina', 
                        {                                          
                                sucursal_historial:sucursal_historial
                        }, 
                        function(data) 
                        {                                 
                                $('#historiales_eventos').html(data);                            
                        })
                        
                    }) 

                $('#nombre_asesor').on('keyup', function() 
                {
                    var nombre_asesor=$('#nombre_asesor').val()
                    $.post(base_url+'Chistoriales/historial_eventos_nombre', 
                        {                                          
                                nombre_asesor:nombre_asesor
                        }, 
                        function(data) 
                        {                                 
                             $('#historiales_eventos').html(data);    
                        })
                  
                })
                
			break;
			case 'HU':
				$('#mostrar_oficinas').show(1000);
				$('#mostrar_usuario').show(1000);
                $('#mostrar_fecha').hide(1000);
                $('#titulo_historial').text('HISTORIAL DE USUARIOS');
                $('#historiales_usuarios').show(500);
                $('#historiales_eventos').hide(500);
                
                
                $('#suc_historial').on('click', function () 
                    {
                        var sucursal_historial=$('#suc_historial').val();
                        
                        $.post(base_url+'Chistoriales/historial_usuarios_oficina', 
                        {                                          
                                sucursal_historial:sucursal_historial
                        }, 
                        function(data) 
                        {                                 
                                $('#historiales_usuarios').html(data);
                               
                        })
                        
                    }) 
                $('#nombre_asesor').on('keyup', function() 
                {
                    var nombre_asesor=$('#nombre_asesor').val()
                    $.post(base_url+'Chistoriales/historial_usuarios_nombre', 
                        {                                          
                                nombre_asesor:nombre_asesor
                        }, 
                        function(data) 
                        {                                 
                             $('#historiales_usuarios').html(data);
                            
                        })
                  
                })
            break;
            

		
		}

     })


       

});