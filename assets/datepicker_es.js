
    $(document).ready(function()
    {

        $.datepicker.regional['es'] = {
            closeText: 'Cerrar',
            prevText: '<Ant',
            nextText: 'Sig>',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
            weekHeader: 'Sm',
            dateFormat: 'dd/mm/yy',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
        };
        
        $.datepicker.setDefaults($.datepicker.regional['es']);
          
        $(function() 
        {
            $('#fecha_inicio').datepicker(
            {
                dateFormat: 'yy-mm-dd',
                minDate: 0      
             });

            $('#fecha_fin').datepicker(
            {
                dateFormat: 'yy-mm-dd',
                minDate: 0      
            });
                                
            $("#fecha_inicio").on("change", function() {
            var fecha = $("#fecha_inicio").datepicker("getDate");
            fecha.setDate(fecha.getDate() +1); 

            $("#fecha_fin").datepicker("setDate", fecha);
            });


            
            
        });

         
        $('#select_asesor_modulo').on('change', function()
        {
                
                var modulo=$('#select_asesor_modulo').val();
                if (modulo=='') 
                {
                        $("#fecha_inicio").on("change", function() {
                        var fecha = $("#fecha_inicio").datepicker("getDate");
                        fecha.setDate(fecha.getDate()+ 1); 
            
                        $("#fecha_fin").datepicker("setDate", fecha);
                        });
                    
                }
                 else 
                {
                       $("#fecha_inicio").on("change", function() {
                        var fecha = $("#fecha_inicio").datepicker("getDate");
                        fecha.setDate(fecha.getDate() +5 ); 
            
                        $("#fecha_fin").datepicker("setDate", fecha);
                        });
                   
                }
            
        })




        

    });