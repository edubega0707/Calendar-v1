 

$(document).ready(function()
            { 
            function registra_eventos()
            {
                    var nombre_asesor=$('#nombre_asesor').val();
                    var nombre_oficina=$('#sucursal_usuario').val();                                              
                    var no_serie_tableta=$('#select_asesor_tableta').val();
                    var no_serie_biometrico=$('#select_asesor_biometrico').val();
                    var no_serie_modulo=$('#select_asesor_modulo').val();                     
                    var usuarios_id_usuario=$('#usuarios_id_usuario').val(); 
                    var no_tramites_evento=$('#select_asesor_folios').val();                 
                    var fecInicio=$('#fecha_inicio').val();
                    var fecFin=$('#fecha_fin').val();
                    var hora_inicio=$('#select_hora_inicio').val();                 
                    var status='RESERVADO';
                    
                    
                  $.post( base_url+'Ccalendar/insert_event_asesor', 
                  { 
                        nombre_asesor: nombre_asesor,
                        nombre_oficina:nombre_oficina,
                        no_serie_tableta:no_serie_tableta,
                        no_serie_biometrico:no_serie_biometrico, 
                        no_serie_modulo:no_serie_modulo,              
                        usuarios_id_usuario:usuarios_id_usuario,
                        no_tramites_evento:no_tramites_evento,
                        fecInicio:fecInicio,
                        fecFin:fecFin,
                        hora_inicio:hora_inicio,                  
                        status:status                                                  
                  }, 
                  function() 
                  {
                        $.alert
                        ({
                              title: 'Registro de Eventos',
                              content: 'Evento agregado correctamente!', 
                              type: 'red',                                              
                              theme: 'material',                                                        
                        });                        
                  })       
                  .fail(function() 
                  {
                        $.alert
                        ({
                              title: 'Error',
                              content: 'Error no se registro el evento!', 
                              type: 'red',                                              
                              theme: 'material',                                                        
                        });
                  })
            }


       $('#form_registra_evento_asesor').submit(function(e)
                    {
                        
                        e.preventDefault()

                        $.confirm
                        ({
                                title: 'Registrar',
                                content: '¿Quiere registrar este evento?',
                                type: 'dark',                                              
                                theme: 'material',
                                animation: 'zoom',
                                animationSpeed: 600,
                                closeAnimation: 'scale',
                                alignMiddle: true,                          
                                buttons: 
                                {
                                    Aceptar: {
                                          text: 'Aceptar',
                                          btnClass: 'btn-blue',
                                          action: function()
                                          {      
                                                      var nombre_asesor=$('#nombre_asesor').val();
                                                      var nombre_oficina=$('#sucursal_usuario').val();                                                                                                                                                                                                                                     
                                                      var fecInicio=$('#fecha_inicio').val();
                                                      var hora_inicio=$('#select_hora_inicio').val();                                     
                                                      var correo_usuario=$('#correo_usuario').val();

                                                      $.post( base_url+'Ccorreo/enviar_correo_dos', 
                                                      { 
                                                            nombre_asesor:nombre_asesor,
                                                            nombre_oficina:nombre_oficina,                                                                                              
                                                            fecInicio:fecInicio,
                                                            hora_inicio:hora_inicio,                                                        
                                                            correo_usuario:correo_usuario                                                                             
                                                      }, 
                                                      function(data) 
                                                      {
                                                           
                                                      })

                                                registra_eventos();
                                                $('#form_registra_evento_asesor')[0].reset();  
                                                location.href=base_url+'Cregistro/enter';
                                                
                                          }
                                    },
                                    Cancelar: {
                                            text: 'Cancelar',
                                            btnClass: 'btn-red',
                                            action: function(){
                                            }
                                    }                                   
                                }
                                    
                        });
                    })   
            
       });






