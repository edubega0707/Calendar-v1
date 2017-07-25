 
 $(document).ready(function()
            {
            function registra_eventos()
            {
                    var nombre_asesor=$('#select_asesor_evento').val();
                    var desc_evento=$('#desc_evento').val();                  
                    //var sucursal_usuario=$('#sucursal_usuario').val();
                    var usuarios_id_usuario=$('#usuarios_id_usuario').val();
                    var fecha_inicio=$('#fecha_inicio').val();
                    var select_hora_inicio=$('#select_hora_inicio').val();
                    var fecha_fin=$('#fecha_fin').val();
                    var select_hora_fin=$('#select_hora_fin').val();
                    var tableta_evento=$('#select_asesor_tableta').val();
                    var biometrico_evento=$('#select_asesor_biometrico').val();
                    var folio_evento=$('#folio_tys_evento').val();

                  //   var id_tableta=$('#select_asesor_tableta').val();
                  //   var id_biometrico=$('#select_asesor_biometrico').val();
                  //   var status='OCUPADA';
                    
                    
                 $.post( base_url+'Ccalendar/insert_event_admin', 
                  { 
                        nombre_asesor: nombre_asesor,
                        desc_evento: desc_evento, 
                       // sucursal_usuario:sucursal_usuario,
                        usuarios_id_usuario:usuarios_id_usuario,
                        fecha_inicio:fecha_inicio,
                        select_hora_inicio:select_hora_inicio,
                        fecha_fin:fecha_fin,
                        select_hora_fin:select_hora_fin,
                        tableta_evento:tableta_evento,
                        biometrico_evento:biometrico_evento,
                        folio_evento:folio_evento
                              // id_tableta:id_tableta,
                              // id_biometrico:id_biometrico,
                              // status:status

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






