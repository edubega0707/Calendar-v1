
// Este Script registra a las oficinas y a los equipos (tableta o biometrico)

$(document).ready(function()
            {

             $('#select_asesor_biometrico').on('change', function()
            {
                var marca_biometrico=$('#select_asesor_biometrico').val();
                
                $.post(base_url+'Cregistro/enter', 
                  { 
                        marca_biometrico:marca_biometrico
                  }, 
                  function(data) 
                  {
                       console.log(data);
                  })
    
            })



                

});
