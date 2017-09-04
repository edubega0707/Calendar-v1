  
 $(document).ready(function()
            { 
                  
            function registra_eventos()
            {
                    var nombre_asesor=$('#select_asesor_evento').val();
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
                    
                    
                    
                 $.post( base_url+'Ccalendar/insert_event_admin', 
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


            $('#form_eventos').submit(function(e)
            {        
                  
         
                  e.preventDefault()

                  $.confirm
                  ({
                              title: 'Registrar',
                              content: '¿Desea registrar este evento?',
                              type: 'dark',                                              
                              theme: 'material',
                              animation: 'zoom',
                              animationSpeed: 400,
                              closeAnimation: 'scale',
                              alignMiddle: true,                          
                              buttons: 
                              {
                              Aceptar: {
                                    text: 'Aceptar',
                                    btnClass: 'btn-blue',
                                    action: function()
                                    {
                                          registra_eventos();
                                          $('#form_eventos')[0].reset();  
                                          location.href =base_url+'Cregistro/enter';  
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






