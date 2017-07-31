 
<script type="text/javascript"> 

	$(document).ready(function() {
            var sucursal_usuario =$('#sucursal_usuario').val();
		$.post('<?php echo base_url();?>ccalendar/getEventos',
                  {
                        sucursal_usuario:sucursal_usuario
                  },  
			function(data){
				//alert(data);

				$('#calendar').fullCalendar({
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'month,basicWeek,basicDay'
					},
					defaultDate: new Date(),
				navLinks: true, // can click day/week names to navigate views
				editable: true,
				eventLimit: true, // allow "more" link when too many events
				events: $.parseJSON(data),

                        eventClick: function(event, jsEvent, view)
                        {
					 $('#modalEvento').modal();
					 var id= event.id;	
					
					 			
					 $.post("<?php echo base_url();?>Ccalendar/mostrar_evento",
						{
							id:id							
						},
						function(data){
					
							var c=JSON.parse(data);								
							$.each(c,function(i,item){
								$('#id_Evento').val(item.idEvento);
								$('#nom_asesor').val(item.nombre_asesor);
                                                $('#des_event').val(item.des_evento);
                                                $('#id_tableta').val(item.tableta_evento);
                                                $('#id_biometrico').val(item.biometrico_evento);
                                                $('#desc_tableta').val(item.desc_tableta_evento );
                                                $('#desc_biometrico').val(item.desc_biometrico_evento);
								$('#fec_inic').val(item.fecInicio);
								$('#fec_fin').val(item.fecFin);
								$('#hora_inic').val(item.hora_inicio);
								$('#hora_finic').val(item.hora_fin);							
								$('#status_evento').val(item.status);
								
							});

						});

                        }
                        				
			});
			});
		
	     });

</script>

<div id='calendar'>
	
</div>


<div class="modal fade" id="modalEvento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" >
        <h5 class="modal-title" id="exampleModalLabel">Informacíon del evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> 
       <div class="container-fluid">
       		<div class="row">
       			<div class="col-sm-12">

       				<fieldset disabled>
       					<div class="form-group">
       						<label for="nom_asesor">Nombre asesor:</label>
       						<input type="text" class="form-control form-control-sm" id="id_Evento" name="id_Evento" style="display: none;">
       						<input type="text" class="form-control form-control-sm" id="nom_asesor">
       					</div>
       					<div class="form-group">
       						<label for="des_event">Descripción:</label>
       						<textarea class="form-control form-control-sm" id="des_event" rows="3" ></textarea>
       					</div>

                                     <div class="form-group row justify-content-sm-center">   				
       						<label for="fec_fin" class="col-sm-2 col-form-label">Nombre Tableta</label>
       						<div class="col-sm-4">	
       							<input type="text" class="form-control form-control-sm" id="id_tableta" >
       						</div>
                                           <label for="fec_fin" class="col-sm-2 col-form-label">Nombre Biometrico</label>
       						<div class="col-sm-4">	
       							<input type="text" class="form-control form-control-sm" id="id_biometrico" >
       						</div>
       					</div>

                                     <div class="form-group">
       						<label for="des_eve">Descripción tableta:</label>
       						<textarea class="form-control form-control-sm" id="desc_tableta" rows="2" ></textarea>
       					</div>
                                     <div class="form-group">
       						<label for="des_event">Descripción biometrico:</label>
       						<textarea class="form-control form-control-sm" id="desc_biometrico" rows="2" ></textarea>
       					</div>
  					
                             
       					<div class="form-group row justify-content-sm-center">
       						<label for="fec_inic" class="col-sm-3 col-form-label">Fecha solicitud:</label>
       						<div class="col-sm-4">	
       							<input type="text" class="form-control form-control-sm" id="fec_inic" >
       						</div>

       						<label for="hora_inic" class="col-sm-2 col-form-label">Hora solicitud:</label>
       						<div class="col-sm-3">	
       							<input type="text" class="form-control form-control-sm" id="hora_inic">
       						</div>

       					</div>

       					<div class="form-group row justify-content-sm-center">   				
       						<label for="fec_fin" class="col-sm-3 col-form-label">Fecha Entrega:</label>
       						<div class="col-sm-4">	
       							<input type="text" class="form-control form-control-sm" id="fec_fin" >
       						</div>

       						<label for="hora_finc" class="col-sm-2 col-form-label">Hora de entrega:</label>
       						<div class="col-sm-3">	
       							<input type="text" class="form-control form-control-sm" id="hora_finic" >
       						</div>

       					</div>
       			
       		      		<div class="form-group row justify-content-sm-center">   				
       						<label for="fec_fin" class="col-sm-3 col-form-label">Status</label>
       						<div class="col-sm-4">	
       							<input type="text" class="form-control form-control-sm" id="status_evento" >
       						</div>
       					</div>
                               </fieldset>

       					<div class="form-group row justify-content-sm-center">
       						<label for="select_status" class="col-sm-4 col-form-label">Cambiar Status: </label>
       						<select class="form-control-sm  col-sm-5" id="select_status" name="select_status">
       			
       							<option>PENDIENTE</option>
       							<option>ACEPTADO</option>
       							<option>RECHAZADO</option>
                                                <option>FINALIZADO</option>        							
       						</select>
       					</div>

       					<div class="form-group row justify-content-sm-center">
       						<div class="input-group date col-sm-2">	
       				<!-- <input type="text" name="correo_asesor" id="correo_asesor" value="<?php echo $session; ?>" style="display: none;">             -->				
       				<button type="button" class="btn btn-primary" id="modificar_evento" data-dismiss="modal">Guardar</button>
       						</div>
       					</div>

       				<script>

                                          $(document).ready(function()
                                          {	
                                                
                                                function modificar()
                                                {
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
                                                                  color='#C50000';
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
                                                      var data = '&status='+status+'&id='+id+'&color='+color+'&tableta_evento='+tableta_evento+'&biometrico_evento='+biometrico_evento+'&status_evento='+status_evento+'&nombre_oficina='+nombre_oficina;
                                                                                                
                                                      $.ajax
                                                      ({  

                                                            url: '<?php echo base_url();?>Ccalendar/modificar_evento',
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
                                                            }
                                                            

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
                                    
                              </script>
		
       			</div>
       		</div>
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
</div>

<!-- FIND DEL MODAL -->

<!-- fORMULARIO DE REGISTRO DE EVENTOS -->
<div class="container formulario">
                        <h4>Solicitar Tableta</h4>
                        <hr>

                        <form id="form_eventos" name="form_eventos" >
                              <div class="form-group row justify-content-sm-center">
                                    <label for="select_status" class="col-sm-2 col-form-label">Seleccionar asesor:</label>
                                    <select class="form-control form-control-sm col-sm-6" id="select_asesor_evento" name="select_asesor_evento">
                                         <option>Seleccionar asesor</option> 
                                         <?php foreach ($lista_asesores as $asesor): ?>             
                                                <option><?php echo $asesor['nombre_usuario']; ?></option>                                                   
                                           <?php endforeach; ?>  							
                                    </select>
                              </div>
                              <div class="form-group row justify-content-sm-center">
                                 <div class="alert alert-info col-sm-8" role="alert" id="evento_rechazado"  style="display: none;">
                                    
                                 </div> 

                                 <script>
                                       $('#select_asesor_evento').on('change',function()
                                       {
                                                function registra_eventos()
                                                {
                                                      var nombre_asesor=$('#select_asesor_evento').val();
                                                                                      
                                                      $.post( base_url+'Ccalendar/eventos_rechazados', 
                                                            { 
                                                                  nombre_asesor: nombre_asesor                                                                                                                            
                                                            }, 
                                                            function(data) 
                                                            {
                                                                  $('#evento_rechazado').fadeIn();
                                                                  $('#evento_rechazado').text(data);

                              

                                                            })
                                          
                                                }

                                       })

                                 </script>

                              </div>

                              <!-- Inicio Seleccionar tableta Y biometrico -->
                              <div class="form-group row justify-content-sm-center">
                                    <label for="select_status" class="col-sm-2 col-form-label">Seleccionar tableta:</label>
                                    <select class="form-control form-control-sm col-sm-2" id="select_asesor_tableta" name="select_asesor_tableta">
                                         <option value="">Seleccionar tableta</option>
                                         <?php foreach ($lista_tableta as $tableta): ?>                                              
                                                <option><?php echo $tableta['id_tableta'];?></option>                                                   
                                           <?php endforeach; ?>  							
                                    </select>

                                     <label for="select_status" class="col-sm-2 col-form-label">Seleccionar Biometrico:</label>
                                    <select class="form-control form-control-sm col-sm-2" id="select_asesor_biometrico" name="select_asesor_biometrico">
                                         <option value="">Seleccionar biometrico</option>
                                         <?php foreach ($lista_biometrico as $biometrico): ?>                                            
                                                <option><?php echo $biometrico['id_biometrico'];?></option>                                                   
                                           <?php endforeach; ?>  							
                                    </select>

                              </div>
                              <!-- Fin de  Seleccionar tableta y biometrico -->

                              <!-- Fin de Select Biometrico -->
                              <div id="descripcion_eventos_equipos" class="form-group row justify-content-sm-center" style="display: none;">
						<div class="alert alert-success col-md-8 col-sm-10 my-3" role="alert" >
							<div class="row">
							  <div class="col-md-12 col-sm-12 my-1">
									<strong>Tableta</strong><p id="descripcion_tableta"></p> 
							  </div>
							   <div class="col-md-12 col-sm-12">
							   		<strong>Biometrico</strong><p id="descripcion_biometrico"></p>
							  </div>				
							</div>														
						</div>
					</div>

					 <script>
					    
							$(document).ready(function()
							{ 
							   $('#select_asesor_tableta').on('change', function()
							   {
										var id_tableta=$('#select_asesor_tableta').val();
										if (id_tableta=='') 
										{
											$('#descripcion_eventos_equipos').hide(600);											
										} 
										else 
										{
											$.post( base_url+'Ccalendar/consulta_tableta', 
											{ 
													id_tableta:id_tableta
													
											}, 
											function(data) 
											{						
											$('#descripcion_eventos_equipos').show(1000);
											$('#descripcion_tableta').text(data);		
																								
											})
											.fail(function() 
											{
												console.log("Error")
											})	
										}
										
							
											
							   })

							   $('#select_asesor_biometrico').on('change', function()
							   {
										var id_biometrico=$('#select_asesor_biometrico').val();
										
										if (id_biometrico=='') 
										{
											$('#descripcion_eventos_equipos').hide(600);	
										} 
										else 
										{
											$.post( base_url+'Ccalendar/consulta_biometrico', 
											{ 
													id_biometrico:id_biometrico
													
											}, 
											function(data) 
											{					
											      $('#descripcion_eventos_equipos').show(500);
												$("#descripcion_biometrico").text(data);
												$("#descripcion_biometrico").show(1000);
													
												
												
																								
											})
											.fail(function() 
											{
												console.log("Error")
											})	
										}
									
															
							   })


								
										
							});
											
					</script>
                              
                             
                            

                              <div class="form-group row justify-content-sm-center">
                                    <label for="desc_evento" class="col-sm-2 col-form-label">Descripción:</label>
                                    <div class="col-sm-6">
                                          <textarea class="form-control form-control-sm" id="desc_evento" name="desc_evento" rows="5" placeholder="Descripción" required style="text-transform:uppercase;"></textarea>
                                    </div>                                 
                                    <input type="text" name="sucursal_usuario" id="sucursal_usuario" value="<?php echo $sucursal_usuario; ?>" style="display: none;">
                                    <input type="text" name="usuarios_id_usuario" id="usuarios_id_usuario" value="<?php echo $usuarios_id_usuario; ?>" style="display: none;">
                              </div>
                              
                              <div class="form-group row justify-content-sm-center">

					 	<label for="select_status" class="col-sm-3 col-form-label">Folios TYS a capturar:</label>
							<select class="form-control form-control-sm col-sm-2" id="select_asesor_folios" name="select_asesor_folios">
									<option value="0">Folio</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>															
							</select>
						                              
                               </div> 

					  <?php 
					  for ($i=1; $i <=5 ; $i++) { ?>		  
						<div class="form-group row justify-content-sm-center" id="folio_tys_evento<?php echo$i; ?>" style="display: none;">
							<label for="folio_tys_evento" class="col-sm-2 col-form-label">Folio TYS No<?php echo " ".$i.":"; ?></label>
							<div class="col-sm-5">
								<input type="text" class="form-control form-control-sm" id="folio_evento<?php echo$i; ?>" name="folio_evento<?php echo$i;?>" placeholder="Folio TYS <?php echo$i;?>"  >
							</div> 
						</div>
					  <?php } ?>


					  <script>
					    
							$(document).ready(function()
							{ 
							   $('#select_asesor_folios').on('change', function(){
									var no_folio=$('#select_asesor_folios').val();

									switch (no_folio) {
									
										case '1':
											$('#folio_tys_evento1').show(1000);
											$('#folio_tys_evento2').hide(1000);
											$('#folio_tys_evento3').hide(1000);
											$('#folio_tys_evento4').hide(1000);
											$('#folio_tys_evento5').hide(1000);
								
										break;
										case '2':
											$('#folio_tys_evento1').show(1000);
											$('#folio_tys_evento2').show(1000);
											$('#folio_tys_evento3').hide(1000);
											$('#folio_tys_evento4').hide(1000);
											$('#folio_tys_evento5').hide(1000);
								
										break;
										case '3':
											$('#folio_tys_evento1').show(1000);
											$('#folio_tys_evento2').show(1000);
											$('#folio_tys_evento3').show(1000);
											$('#folio_tys_evento4').hide(1000);
											$('#folio_tys_evento5').hide(1000);
										break;
										case '4':
											$('#folio_tys_evento1').show(1000);
											$('#folio_tys_evento2').show(1000);
											$('#folio_tys_evento3').show(1000);
											$('#folio_tys_evento4').show(1000);
											$('#folio_tys_evento5').hide(1000);
										break;
										case '5':
											$('#folio_tys_evento1').show(1000);
											$('#folio_tys_evento2').show(1000);
											$('#folio_tys_evento3').show(1000);
											$('#folio_tys_evento4').show(1000);
											$('#folio_tys_evento5').show(1000);
										break;
									
										default:

										 
										break;
									}

							   })

								
										
							});
											
					  </script>


                        
                              <div class="form-group row justify-content-sm-center">
                                    <label for="desc_evento" class="col-sm-2 col-form-label">Fecha Solicitud:</label>
                                    <div class="col-sm-2">  
                                          <div class="input-group date" id="fecha_inicio_evento">
                                                <input type="text" class="form-control form-control-sm" name="fecha_inicio" id="fecha_inicio"><span class="input-group-addon"><i class="glyphicon glyphicon-th" required></i></span>
                                          </div>                                                                        
                                    </div>

                                    <label for="desc_evento" class="col-sm-2 col-form-label">Hora solicitud:</label>
                                    <div class="col-sm-2">  
                                          <select class="form-control form-control-sm" id="select_hora_inicio" name="select_hora_inicio" placeholder="Fecha Inicio" required>
                                                 <option>00:00</option>
                                                 <option>01:00</option>
                                                 <option>02:00</option>
                                                 <option>03:00</option>
                                                 <option>04:00</option>
                                                 <option>05:00</option>
                                                 <option>06:00</option>
                                                 <option>07:00</option>
                                                 <option>08:00</option>
                                                 <option>09:00</option>
                                                 <option>10:00</option>
                                                 <option>11:00</option>
                                                 <option>12:00</option>
                                                 <option>13:00</option>
                                                 <option>14:00</option>
                                                 <option>15:00</option>
                                                 <option>16:00</option>
                                                 <option>17:00</option>
                                                 <option>18:00</option>
                                                 <option>19:00</option>
                                                 <option>20:00</option>
                                                 <option>21:00</option>
                                                 <option>22:00</option>
                                                 <option>23:00</option>
                                          </select>
                                    </div>      

                   </div>


                              <div class="form-group row justify-content-sm-center">
                                          <label for="fecha_fin" class="col-sm-2 col-form-label">Fecha entrega:</label>
                                          <div class="col-sm-2">  
                                                <div class="input-group date" id="fecha_fin_evento">
                                                      <input type="text" class="form-control form-control-sm" name="fecha_fin" id="fecha_fin"><span class="input-group-addon"><i class="glyphicon glyphicon-th" required></i></span>
                                                </div>                                                                        
                                          </div>
                        
                                    <label for="select_hora_fin" class="col-sm-2 col-form-label">Hora entrega:</label required>
                                    <div class="col-sm-2">
                                          <select class="form-control form-control-sm" id="select_hora_fin" name="select_hora_fin">
                                                 <option>00:00</option>
                                                 <option>01:00</option>
                                                 <option>02:00</option>
                                                 <option>03:00</option>
                                                 <option>04:00</option>
                                                 <option>05:00</option>
                                                 <option>06:00</option>
                                                 <option>07:00</option>
                                                 <option>08:00</option>
                                                 <option>09:00</option>
                                                 <option>10:00</option>
                                                 <option>11:00</option>
                                                 <option>12:00</option>
                                                 <option>13:00</option>
                                                 <option>14:00</option>
                                                 <option>15:00</option>
                                                 <option>16:00</option>
                                                 <option>17:00</option>
                                                 <option>18:00</option>
                                                 <option>19:00</option>
                                                 <option>20:00</option>
                                                 <option>21:00</option>
                                                 <option>22:00</option>
                                                 <option>23:00</option> 
                                          </select>                                                                     
                                    </div>
                                    
                                    
                              </div>

                              <div class="form-group row justify-content-sm-center">
                                    <div class="input-group date col-sm-2">                                       
                                      <button type="submit" class="btn btn-primary" id="registrar_evento">Enviar</button>
                                    </div>
                              </div>
                              
                        </form>
                       

                        <script type="text/javascript">
                              var  base_url= "<?php echo base_url();?>"

                              $('#fecha_inicio_evento').datepicker({
                                    format: "yyyy-mm-dd",
                                    language: "es"
                              });

                              $('#fecha_fin_evento').datepicker({
                                    format: "yyyy-mm-dd",
                                    language: "es"
                              });


                             
                        </script>
                       
</div>

<!-- fIN DE FORMULARIO DE REGISTRO DE EVENTOS -->



<!-- FORMULARIO DE REGISTRO DE USUARIOS -->
<section class="container">
      <div class="row flex-md-column  align-items-center justify-content-center">
                  <div class="col-md-4  flex-md-column  align-items-center justify-content-center" id="registro"> 

                      <div class="p-4 m-2  my-3 form-shadow  bg-form-asesores">
                              
                              <form id="form_asesores" name="form_asesores"> 
                                    
                                    <div class="row d-flex flex-row justify-content-center align-items-center mb-4">                

                                         
                                          <p class="h5 text-center">REGISTRO DE ASESORES</p>              

                                    </div>      

                                    <div class="form-group">

                                          <label for="nombre_usuario" class="d-flex flex-row align-items-center"><i class="fa fa-user mr-3" aria-hidden="true"  style="text-transform:uppercase; font-size: 30px;"></i>Nombre completo:</label>
                                               

                                          <input type="text" class="form-control form-control-sm" id="nombre_usuario" name="nombre_usuario" placeholder="Nombre Completo"  style="text-transform:uppercase;" required> 
                                          <span class="text-white"><strong><?php echo form_error('nombre_usuario'); ?> </strong></span>

                                        

                                    </div>

                                    <div class="form-group">

                                          <label for="tel_usuario" class="d-flex flex-row align-items-center"><i class="fa fa-mobile mr-3" aria-hidden="true" style="font-size: 30px;"></i>Telefono Celular:</label>

                                          <input type="text" class="form-control form-control-sm" id="tel_usuario" name="tel_usuario" placeholder="Celular" required>
                                          <span class="text-white"><strong><?php echo form_error('tel_usuario'); ?> </strong></span>


                                    </div>

                                    <div class="form-group">

                                          <label for="clave_usuario" class="d-flex flex-row align-items-center"><i class="fa fa-key mr-3" aria-hidden="true" style="font-size: 30px;"></i>Clave:</label>

                                          <input type="text" class="form-control form-control-sm" id="clave_usuario" name="clave_usuario" placeholder="Clave Usuario" required>
                                          <span class="text-white"><strong><?php echo form_error('clave_usuario'); ?> </strong></span>

                                    </div>

                                    <div class="form-group">

                                          <label for="pass_usuario" class="d-flex flex-row align-items-center"><i class="fa fa-key mr-3" aria-hidden="true" style="font-size: 30px;"></i>PIN:</label>

                                          <input type="password" class="form-control form-control-sm" id="pass_usuario" name="pass_usuario" placeholder="Contraseña" required>
                                          <span class="text-white"><strong><?php echo form_error('pass_usuario'); ?> </strong></span>

                                          <input type="text" name="sucursal_usuario" id="sucursal_usuario" value="<?php echo $sucursal_usuario; ?>" style="display: none;">
                                          <input type="text" name="rol_usuario" id="rol_usuario" value="ASESOR" style="display: none;">

                                    </div>



                                    <div class="d-flex flex-row justify-content-center align-items-center text-white mt-3" >

                                          <div class="d-flex flex-column justify-content-center align-items-center text-white">

                                                <button type="submit" class="btn  btn-success" id="registrar">Registrar</button>

                                          </div>

                                    </div>

                              </form>

                        </div>

            </div>

      </div>
</section>
<!-- FIN DE FORMULARIO DE REGISTRO DE USUARIOS -->