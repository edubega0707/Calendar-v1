 
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
                                animationSpeed: 300,
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
                                                      $('#check_username').hide();
                                                      $('#check_telefono').hide();
                                                      $('#check_correo').hide();
                                                      $('#check_clave').hide();
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









$(document).ready(function()
{
    $('#nombre_usuario').keyup(checkusername);
    $('#tel_usuario').keyup(checktelefono);
    $('#correo_usuario').keyup(checkcorreo);
    $('#clave_usuario').keyup(check_clave_usuario);
})


function checkusername()
{
    $('#check_username').show(80);
    var nombre_usuario=$('#nombre_usuario').val();
   
  if( nombre_usuario == null || nombre_usuario.length ==0  )
     {
        $('#check_username').html('<div class="alert alert-danger mt-1" role="alert">No se aceptan campos vacios</div>');
        
        document.getElementById('registrar').disabled=true;
     }
  else if(!/^[a-zA-Z ]*$/.test(nombre_usuario))
    {
        $('#check_username').html('<div class="alert alert-danger mt-1" role="alert">No se aceptan numeros, acentos ni caracteres especiales</div>');
       
        document.getElementById('registrar').disabled=true;
    }
    else
    {
         $('#check_username').html('<div class="alert alert-success mt-1" role="alert">Campo correcto</div>');
       
         document.getElementById('registrar').disabled=false;

    }


}

function checktelefono()
{
    $('#check_telefono').show(80);
    var telefono_usuario=document.getElementById('tel_usuario').value;
   
   
  if( telefono_usuario == null || telefono_usuario.length == 0  )
     {
        $('#check_telefono').html('<div class="alert alert-danger mt-1" role="alert">No se aceptan campos vacios</div>');
       
        document.getElementById('registrar').disabled=true;
     }
  else if(!/[0-9]{10}/.test(telefono_usuario))
    {
        $('#check_telefono').html('<div class="alert alert-danger mt-1" role="alert">Ingresa solo los 10 digitos</div>');
      
        document.getElementById('registrar').disabled=true;
    }

    else
    {
         $('#check_telefono').html('<div class="alert alert-success mt-1" role="alert">Campo correcto</div>');
         document.getElementById('registrar').disabled=false;

    }

}

function checkcorreo()
{
   $('#check_correo').show(100);
   var correo_usuario=$('#correo_usuario').val();

   if( correo_usuario == null || correo_usuario.length == 0 )
     {
        $('#check_correo').html('<div class="alert alert-danger mt-1" role="alert">No se aceptan campos vacios</div>');
         document.getElementById('registrar').disabled=true;
     
     }

   else if(!/^[^@\s]+@[^@\.\s]+(\.[^@\.\s]+)+$/.test(correo_usuario))
    {
        $('#check_correo').html('<div class="alert alert-danger mt-1" role="alert">Escriba correo corectamente</div>');
         document.getElementById('registrar').disabled=true;
       
    }
    
    else
    {
         
        $.post(base_url+'Cregistro/valida_correo',  
        { 
            correo_usuario: correo_usuario
        }, 
        function(data) 
        {
          $('#check_correo').html(data);
           document.getElementById('registrar').disabled=false;
        })

    }

}



function check_clave_usuario()
{
    $('#check_clave').show(100);
   var clave_usuario=$('#clave_usuario').val();

   if( clave_usuario == null || clave_usuario.length == 0  )
     {
        $('#check_clave').html('<div class="alert alert-danger mt-1" role="alert">No se aceptan campos vacios</div>');
        document.getElementById('registrar').disabled=true;
     }

   else if(!/(^([0-9]{5,5})|^)$/.test(clave_usuario))
    {
        $('#check_clave').html('<div class="alert alert-danger mt-1" role="alert">La clave es unicamente de 5 digitos</div>');
        document.getElementById('registrar').disabled=true;
    }
    
    else
    {
         
        $.post(base_url+'Cregistro/valida_clave_asesor',  
        { 
            clave_usuario: clave_usuario
        }, 
        function(data) 
        {
          $('#check_clave').html(data);
          document.getElementById('registrar').disabled=false;
        })

    }

}