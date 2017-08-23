
            $(document).ready(function()
            {	
                
                function modificar()
                {
                        var folio_evento_1=$('#folio_evento1').val();
                        var folio_evento_2=$('#folio_evento2').val();
                        var folio_evento_3=$('#folio_evento3').val();
                        var folio_evento_4=$('#folio_evento4').val();
                        var folio_evento_5=$('#folio_evento5').val();
                        var folios=[folio_evento_1,folio_evento_2,folio_evento_3,folio_evento_4,folio_evento_5];                
                        var folio_evento=folios.toString();


                        var id=$('#id_Evento').val();
                        var status=$('#select_status').val();                                                     
                        var tableta_evento=$('#id_tableta').val();
                        var biometrico_evento=$('#id_biometrico').val();
                        var nombre_oficina=$('#sucursal_usuario').val();
                        var color='';
                        var status_evento= '';

                        switch(status)
                        {
                            case 'PENDIENTE':
                                    color='#E85B48';
                            break;
                            case 'RECHAZADO':
                                    color='#F38181';
                                    status_evento='DISPONIBLE';
                            break;
                            case 'ACEPTADO':
                                    color='#A5F2E7';                                                                                                                        
                            break;
                            case 'FINALIZADO':
                                    color='#DBE2EF';
                                    status_evento='DISPONIBLE';
                            break;
                        }

                            $.post( base_url+'Ccalendar/modificar_evento', 
                            { 
                                    folio_evento:folio_evento, 
                                    id:id,
                                    status:status,
                                    tableta_evento:tableta_evento,
                                    biometrico_evento:biometrico_evento,
                                    nombre_oficina:nombre_oficina,
                                    color:color,
                                    status_evento:status_evento

                            }, 
                            function() 
                            {
                                    $.alert
                                    ({
                                        title: 'Registro de tramites ',
                                        content: 'Tramites registrados', 
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

                $('#modificar_evento').on('click',function()
                {
                        $.confirm
                        ({
                            title: 'Confirmar',
                            content: '¿Desea Realmente modificar este evento?',
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
                                                    modificar();
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
    
