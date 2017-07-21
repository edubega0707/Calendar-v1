

// Este Script registra a las oficinas y a los equipos (tableta o biometrico)

$(document).ready(function()
            {
            function registra_admin()
            {
                    var nombre_oficina=$('#nombre_oficina').val();
                    var ubicacion_oficina=$('#ubicacion_oficina').val();
                    var direccion_oficina=$('#direccion_oficina').val();
                    var telefono_oficina=$('#telefono_oficina').val();
                    var jefe_oficina=$('#jefe_oficina').val();

                    var marca_tableta=$('#marca_tableta').val();
                    var color_tableta=$('#color_tableta').val();
                    var descripcion_tableta=$('#descripcion_tableta').val();

                    var marca_biometrico=$('#marca_biometrico').val();
                    var color_biometrico=$('#color_biometrico').val();
                    var descripcion_biometrico=$('#descripcion_biometrico').val();
                    
                  $.post( base_url+'Ccalendar/insert_admin', 
                  { 
                        nombre_oficina: nombre_oficina, 
                        ubicacion_oficina: ubicacion_oficina,
                        direccion_oficina:direccion_oficina,
                        telefono_oficina:telefono_oficina,
                        jefe_oficina:jefe_oficina,

                        marca_tableta:marca_tableta,
                        color_tableta:color_tableta,
                        descripcion_tableta:descripcion_tableta,

                        marca_biometrico:marca_biometrico,
                        color_biometrico:color_biometrico,
                        descripcion_biometrico:descripcion_biometrico
                  }, 
                  function() 
                  {
                         $.alert
                        ({
                              title: 'Registro ',
                              content: 'Registro agregado exitosamente!', 
                              type: 'red',                                              
                              theme: 'material',                                                        
                        });
                  })
       
                  .fail(function() 
                  {
                        $.alert
                        ({
                              title: 'Error',
                              content: 'Error no se pudo agregar el registro!', 
                              type: 'red',                                              
                              theme: 'material',                                                        
                        });
                  })

            }
            
            $('#form_registro_oficina').submit(function(e)
                  {
                        e.preventDefault()

                        $.confirm
                        ({
                              title: 'Registrar',
                              content: '¿Quiere registrar a esta oficina?',
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
                                                      registra_admin();
                                                      $('#form_registro_oficina')[0].reset(); 
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
                    
            $('#form_registro_tableta').submit(function(e)
                  {
                        e.preventDefault()

                        $.confirm
                        ({
                              title: 'Registrar',
                              content: '¿Quiere registrar este equipo?',
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
                                                      registra_admin();
                                                      $('#form_registro_tableta')[0].reset(); 
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

            $('#form_registro_biometrico').submit(function(e)
                  {
                        e.preventDefault()

                        $.confirm
                        ({
                              title: 'Registrar',
                              content: '¿Quiere registrar este equipo?',
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
                                                      registra_admin();
                                                      $('#form_registro_biometrico')[0].reset(); 
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
