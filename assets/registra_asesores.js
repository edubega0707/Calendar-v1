 
 $(document).ready(function()
            {
            function registra_asesor()
            {
                    var nombre_usuario=$('#nombre_usuario').val();
                    var tel_usuario=$('#tel_usuario').val();
                    var correo_usuario=$('#correo_usuario').val();
                    var clave_usuario=$('#clave_usuario').val();
                    var pass_usuario=$('#pass_usuario').val();
                    var sucursal_usuario=$('#sucursal_usuario').val();
                    var rol_usuario=$('#rol_usuario').val();
                    
                
                  $.post( base_url+'Cregistro/registrar', 
                  { 
                        nombre_usuario: nombre_usuario, 
                        tel_usuario: tel_usuario,
                        correo_usuario:correo_usuario,
                        clave_usuario:clave_usuario,
                        pass_usuario:pass_usuario,
                        sucursal_usuario:sucursal_usuario,
                        rol_usuario:rol_usuario
                  
                  }, 
                  function() 
                  {
                         $.alert
                        ({
                              title: 'Registro de asesores',
                              content: 'Asesor agregado correctamente!', 
                              type: 'red',                                              
                              theme: 'material',                                                        
                        });
                          
                  })
       
                  .fail(function() 
                  {
                        $.alert
                        ({
                              title: 'Error',
                              content: 'Error no se registro elasesor', 
                              type: 'red',                                              
                              theme: 'material',                                                        
                        });
                  })

            }



    $('#form_asesores').submit(function(e)
                    {
                        e.preventDefault()

                        $.confirm
                        ({
                                title: 'Registrar',
                                content: '¿Quiere registrar este asesor?',
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
                                                     registra_asesor();
                                                     $('#form_asesores')[0].reset();
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






