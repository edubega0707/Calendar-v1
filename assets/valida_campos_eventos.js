

$(document).ready(function()
{
    $('#select_asesor_evento').change(check_asesor);
    $('#select_hora_inicio').change(check_hora);
 
})




        
function check_asesor()
{
    var cmbSelector = document.getElementById('select_asesor_evento').selectedIndex;
 
   if( cmbSelector == null || cmbSelector == 0 )
     {
        $('#check_asesor').html('<div class=" rounded px-3 py-1" style="background: #F07B3F;"><i class="fa fa-exclamation-triangle mr-2" aria-hidden="true"></i>Debe seleccionar una opcion</div>');       
        document.getElementById('registrar_evento').disabled=true;
     }

    else
    {
         $('#check_asesor').html('<div class="rounded px-3 py-1" style="background: #A2E4A2;"><i class="fa fa-check mr-2" aria-hidden="true"></i>Campo correcto</div>');      
         document.getElementById('registrar_evento').disabled=false;

    }
}


                
function check_hora()
{
    var cmbSelector = document.getElementById('select_hora_inicio').selectedIndex;
 
   if( cmbSelector == null || cmbSelector == 0 )
     {
        $('#check_hora').html('<div class=" rounded px-3 py-1" style="background: #F07B3F;"><i class="fa fa-exclamation-triangle mr-2" aria-hidden="true"></i>Debe seleccionar una opcion</div>');       
        document.getElementById('registrar_evento').disabled=true;
     }

    else
    {
         $('#check_hora').html('<div class="rounded px-3 py-1" style="background: #A2E4A2;"><i class="fa fa-check mr-2" aria-hidden="true"></i>Campo correcto</div>');      
         document.getElementById('registrar_evento').disabled=false;

    }


}