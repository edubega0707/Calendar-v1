
$(document).ready(function()
{	           
            function registra_usuario()
            {
                    var nombre_usuario=$('#nombre_usuario').val();
                    var tel_usuario=$('#tel_usuario').val();
                    var clave_usuario=$('#clave_usuario').val();
                    var pass_usuario=$('#pass_usuario').val();
                    var sucursal_usuario=$('#sucursal_usuario').val();
                    var rol_usuario=$('#rol_usuario').val();
                   

                    var data ='&nombre_usuario='+nombre_usuario+'&tel_usuario='+tel_usuario+'&clave_usuario='+clave_usuario+'&pass_usuario='+pass_usuario+'&sucursal_usuario='+sucursal_usuario+'&rol_usuario='+rol_usuario;

                    $.ajax
                    ({  

                        url: base_url+"/Cregistro/registrar",
                        type: 'POST',
                        data: data,                                         
                        success: function(data)
                        {
                                $.alert
                                ({
                                    title: 'Registro Modificado',
                                    content: 'Registro modificado exitosamente!', 
                                        type: 'red',                                              
                                        theme: 'material',                                                        
                                });
                        },
                        error: function(data)
                        {
                             $.alert
                                ({
                                    title: 'Error',
                                    content: 'Error no se registro el usuario!', 
                                        type: 'red',                                              
                                        theme: 'material',                                                        
                                });
                        }

                    })
            }	

        $('#registrar').on('click',function()
        {
            registra_usuario();

         }) 

});

