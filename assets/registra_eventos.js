  
 $(document).ready(function()
            {
            function registra_eventos()
            {
                    var nombre_asesor=$('#select_asesor_evento').val();
                    var nombre_oficina=$('#sucursal_usuario').val();
                    var tableta_evento=$('#select_asesor_tableta').val();
                    var biometrico_evento=$('#select_asesor_biometrico').val();
                    var des_evento=$('#desc_evento').val();
                    var desc_tableta_evento=$('#descripcion_tableta').text();
                    var desc_biometrico_evento=$('#descripcion_biometrico').text();                 
                    var usuarios_id_usuario=$('#usuarios_id_usuario').val();
                    var no_tramites_evento=$('#select_asesor_folios').val();
                    var fecInicio=$('#fecha_inicio').val();
                    var hora_inicio=$('#select_hora_inicio').val();
                    var fecFin=$('#fecha_fin').val();
                    var hora_fin=$('#select_hora_fin').val();
                    var status='RESERVADO';
                    
                    
                    
                 $.post( base_url+'Ccalendar/insert_event_admin', 
                  { 
                        nombre_asesor: nombre_asesor,
                        nombre_oficina:nombre_oficina,
                        tableta_evento:tableta_evento,
                        biometrico_evento:biometrico_evento,
                        desc_tableta_evento:desc_tableta_evento,
                        desc_biometrico_evento:desc_biometrico_evento,
                        des_evento: des_evento, 
                        usuarios_id_usuario:usuarios_id_usuario,
                        no_tramites_evento:no_tramites_evento,
                        fecInicio:fecInicio,
                        hora_inicio:hora_inicio,
                        hora_fin:hora_fin,
                        fecFin:fecFin,
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






