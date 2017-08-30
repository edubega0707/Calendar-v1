

// Este Script registra a las oficinas y a los equipos (tableta o biometrico)

$(document).ready(function()
            {
            function registra_oficina()
            {
                    var nombre_oficina=$('#nombre_oficina').val();
                    var ubicacion_oficina=$('#ubicacion_oficina').val();
                    var telefono_oficina_uno=$('#telefono_oficina_uno').val();
                    var telefono_oficina_dos=$('#telefono_oficina_dos').val();
                

                    
                  $.post( base_url+'Ccalendar/insert_oficina', 
                  { 
                        nombre_oficina:nombre_oficina, 
                        ubicacion_oficina:ubicacion_oficina,
                        telefono_oficina_uno:telefono_oficina_uno,
                        telefono_oficina_dos:telefono_oficina_dos
                       
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

             function registra_tableta()
            {
                   
                    var nombre_oficina=$('#sucursal_usuario_tableta').val();     
                    var no_serie_tableta=$('#numero_serie_tableta').val();     

                  $.post( base_url+'Ccalendar/insert_tableta', 
                  { 
                        
                        nombre_oficina:nombre_oficina,
                        no_serie_tableta:no_serie_tableta                  
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

             function registra_biometrico()
            {
                    
                    var nombre_oficina=$('#sucursal_usuario_biometrico').val();
                    var numero_serie_bio=$('#numero_serie_bio').val();
                    
                  $.post( base_url+'Ccalendar/insert_biometrico', 
                  { 
 
                        nombre_oficina:nombre_oficina,
                        numero_serie_bio:numero_serie_bio
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

            function registra_modulos()
            {
                    
                    var nombre_oficina=$('#sucursal_usuario_modulo').val();
                    var numero_serie_modulo=$('#numero_serie_modulo').val();
                    
                  $.post( base_url+'Ccalendar/insert_modulo', 
                  { 

                     
                        nombre_oficina:nombre_oficina,
                        numero_serie_modulo:numero_serie_modulo
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
                                                registra_oficina();
                                                $('#form_registro_oficina')[0].reset(); 
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
                                                      registra_tableta();
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
                                                      registra_biometrico();
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

                  $('#form_registro_modulo').submit(function(e)
                  {
                        e.preventDefault()

                        $.confirm
                        ({
                              title: 'Registrar',
                              content: '¿Quiere registrar este modulo?',
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
                                                      registra_modulos();
                                                      $('#form_registro_modulo')[0].reset(); 
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
