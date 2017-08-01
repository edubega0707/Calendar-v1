
     

      $(document).ready(function()
            {
            function registra_usuario()
            {
                    var nombre_usuario=$('#nombre_usuario').val();
                    var rol_usuario=$('#rol_usuario').val();
                    var sucursal_usuario=$('#sucursal_usuario').val();
                    var tel_usuario=$('#tel_usuario').val();
                    var correo_usuario=$('#correo_usuario').val();
                    var clave_usuario=$('#clave_usuario').val();
                    var pass_usuario=$('#pass_usuario').val();
                    
                  $.post( base_url+'Cregistro/registrar', 
                  { 
                        nombre_usuario: nombre_usuario, 
                        rol_usuario: rol_usuario,
                        sucursal_usuario:sucursal_usuario,
                        tel_usuario:tel_usuario,
                        correo_usuario:correo_usuario,
                        clave_usuario:clave_usuario,
                        pass_usuario:pass_usuario
                  }, 
                  function() 
                  {
                         $.alert
                        ({
                              title: 'Registro de usuarios',
                              content: 'Usuario agregado exitosamente!', 
                              type: 'red',                                              
                              theme: 'material',                                                        
                        });
                  })
       
                  .fail(function() 
                  {
                        $.alert
                        ({
                              title: 'Error',
                              content: 'Error no se registro el usuario!', 
                              type: 'red',                                              
                              theme: 'material',                                                        
                        });
                  })

            }
            
            $('#form_registro').submit(function(e)
                  {
                        e.preventDefault()

                        $.confirm
                        ({
                              title: 'Registrar',
                              content: '¿Quiere registrar a este usuario?',
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
                                                      registra_usuario();
                                                      $('#form_registro')[0].reset(); 
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
