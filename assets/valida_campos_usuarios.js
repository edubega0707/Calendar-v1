
$(document).ready(function()
{
    $('#nombre_usuario').keyup(checkusername);

})


function checkusername()
{
    $('#check_username').show(80);
    var nombre_usuario=$('#nombre_usuario').val();
   
  if( nombre_usuario == null || nombre_usuario.length ==0  )
     {
        $('#check_username').html('<div class=" rounded px-3 py-1" style="background: #F07B3F;"><i class="fa fa-exclamation-triangle mr-2" aria-hidden="true"></i>No se aceptan campos vacios</div>');
        
        document.getElementById('registrar').disabled=true;
     }
  else if(!/^[a-zA-Z ]*$/.test(nombre_usuario))
    {
        $('#check_username').html('<div class="rounded px-3 py-1"  style="background: #F07B3F;"><i class="fa fa-exclamation-triangle mr-2" aria-hidden="true"></i>No se aceptan numero ni caracteres especiales</div>');
       
        document.getElementById('registrar').disabled=true;
    }
    else
    {
         $('#check_username').html('<div class="rounded px-3 py-1" style="background: #A2E4A2;"><i class="fa fa-check mr-2" aria-hidden="true"></i>Campo correcto</div>');
       
         document.getElementById('registrar').disabled=false;

    }


}

function checktelefono()
{
    $('#check_telefono').show(80);
    var telefono_usuario=document.getElementById('tel_usuario').value;
   
   
  if( telefono_usuario == null || telefono_usuario.length == 0  )
     {
        $('#check_telefono').html('<div class=" rounded px-3 py-1" style="background: #F07B3F;"><i class="fa fa-exclamation-triangle mr-2" aria-hidden="true"></i>No se aceptan campos vacios</div>');
       
        document.getElementById('registrar').disabled=true;
     }
  else if(!/[0-9]{10}/.test(telefono_usuario))
    {
        $('#check_telefono').html('<div class="rounded px-3 py-1"  style="background: #F07B3F;"><i class="fa fa-exclamation-triangle mr-2" aria-hidden="true"></i>Digiten sus 10 numeros</div>');
      
        document.getElementById('registrar').disabled=true;
    }

    else
    {
         $('#check_telefono').html('<div class="rounded px-3 py-1" style="background: #A2E4A2;"><i class="fa fa-check mr-2" aria-hidden="true"></i>Campo correcto</div>');
         document.getElementById('registrar').disabled=false;

    }

}

function checkcorreo()
{
   $('#check_correo').show(100);
   var correo_usuario=$('#correo_usuario').val();

   if( correo_usuario == null || correo_usuario.length == 0 )
     {
        $('#check_correo').html('<div class=" rounded px-3 py-1" style="background: #F07B3F;"><i class="fa fa-exclamation-triangle mr-2" aria-hidden="true"></i>No se aceptan campos vacios</div>');
         document.getElementById('registrar').disabled=true;
     
     }

   else if(!/^[^@\s]+@[^@\.\s]+(\.[^@\.\s]+)+$/.test(correo_usuario))
    {
        $('#check_correo').html('<div class="rounded px-3 py-1"  style="background: #F07B3F;"><i class="fa fa-exclamation-triangle mr-2" aria-hidden="true"></i>Escriba correo correctamente</div>');
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
        $('#check_clave').html('<div class=" rounded px-3 py-1" style="background: #F07B3F;"><i class="fa fa-exclamation-triangle mr-2" aria-hidden="true"></i>No se aceptan campos vacios</div>');
        document.getElementById('registrar').disabled=true;
     }

   else if(!/(^([0-9]{5,5})|^)$/.test(clave_usuario))
    {
        $('#check_clave').html('<div class=" rounded px-3 py-1" style="background: #F07B3F;"><i class="fa fa-exclamation-triangle mr-2" aria-hidden="true"></i>La clave es unicamente de 5 digitos</div>');
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