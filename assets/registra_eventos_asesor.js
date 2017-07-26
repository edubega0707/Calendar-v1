 $(document).ready(function()
            {
            function registra_eventos()
            {
                    var nombre_asesor=$('#nombre_asesor').val();
                    var des_evento=$('#desc_evento').val();                                     
                    var tableta_evento=$('#select_asesor_tableta').val();
                    var biometrico_evento=$('#select_asesor_biometrico').val();
                    var usuarios_id_usuario=$('#usuarios_id_usuario').val();
                    var folio_evento=$('#folio_tys_evento').val();
                    var fecInicio=$('#fecha_inicio').val();
                    var hora_inicio=$('#select_hora_inicio').val();
                    var fecFin=$('#fecha_fin').val();
                    var hora_fin=$('#select_hora_fin').val();
                    var status='RESERVADO';
                    
                    
                    
                  $.post( base_url+'Ccalendar/insert_event', 
                  { 
                        nombre_asesor: nombre_asesor,
                        des_evento: des_evento, 
                        tableta_evento:tableta_evento,
                        biometrico_evento:biometrico_evento,
                        usuarios_id_usuario:usuarios_id_usuario,
                        folio_evento:folio_evento,
                        fecInicio:fecInicio,
                        hora_inicio:hora_inicio,
                        fecFin:fecFin,
                        hora_fin:hora_fin,
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
                                                registra_eventos();
                                                $('#form_registra_evento_asesor')[0].reset();  
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






