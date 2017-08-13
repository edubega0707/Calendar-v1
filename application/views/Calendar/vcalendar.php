
<script type="text/javascript">

	$(document).ready(function() {

        var sucursal_usuario=$('#sucursal_usuario').val();
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
				editable: false,
				eventLimit: true, // allow "more" link when too many events
				events: $.parseJSON(data),

				eventClick: function(event, jsEvent, view){
					 $('#modalEvento').modal();
					 var id= event.id;					
					 $.post("<?php echo base_url();?>Ccalendar/mostrar_evento",
						{
							id:id							
						},
						function(data){
					
							var c=JSON.parse(data);								
							$.each(c,function(i,item){
								$('#nom_asesor').val(item.nombre_asesor);
								$('#des_event').val(item.des_evento);
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
       						<input type="text" class="form-control form-control-sm" id="nom_asesor">
						</div>						

       					<div class="form-group">
       						<label for="des_event">Descripción:</label>
       						<textarea class="form-control form-control-sm" id="des_event" rows="3" ></textarea>
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




<div class="container formulario">
				<h4>Solicitar Tableta</h4>
				<span>Recuerda que unicamente los equipos se prestaran un dia habil de la semana.</span>
				<hr>
				<form id="form_registra_evento_asesor" name="form_registra_evento_asesor">
				 
					<div class="form-group row justify-content-sm-center">
						<label for="desc_evento" class="col-sm-2 col-form-label">Descripción:</label>
						<div class="col-sm-6">
							<textarea class="form-control form-control-sm" id="desc_evento" name="desc_evento" rows="5" placeholder="Descripción" required style="text-transform:uppercase;"></textarea>
						</div>
						<input type="text" name="nombre_asesor" id="nombre_asesor" value="<?php echo $usuario; ?>"  style="display:none;">
						<input type="text" name="sucursal_usuario" id="sucursal_usuario" value="<?php echo $sucursal_usuario; ?>" style="display:none;" >
						<input type="text" name="usuarios_id_usuario"  id="usuarios_id_usuario" value="<?php echo $usuarios_id_usuario; ?>" style="display:none;">
						<input type="text" name="correo_usuario"  id="correo_usuario" value="<?php echo $correo_usuario; ?>" style="display:none;" >
					</div>

					

					<div class="form-group row justify-content-sm-center">									
							<label for="select_asesor_tableta" class="col-sm-2 col-form-label">Seleccionar tableta:</label>
							<select class="form-control form-control-sm col-sm-2 mb-3" id="select_asesor_tableta" name="select_asesor_tableta">
									<option value="">Seleccionar tableta</option>
									<?php foreach ($lista_tableta as $tableta): ?>                                              
										<option><?php echo $tableta['id_tableta'];?></option>                                                   
									<?php endforeach; ?>  							
							</select>

							<label for="select_asesor_biometrico" class="col-sm-2 col-form-label ">Seleccionar Biometrico:</label>
							<select class="form-control form-control-sm col-sm-2 mb-3" id="select_asesor_biometrico" name="select_asesor_biometrico">
									<option value="">Seleccionar biometrico</option>
									<?php foreach ($lista_biometrico as $biometrico): ?>									
										<option><?php echo $biometrico['id_biometrico']; ?></option>                                                   
									<?php endforeach; ?>  							
							</select>
					</div>

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
											$('#descripcion_tableta').text("");												
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
											
											$("#descripcion_biometrico").text("");	
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
					 	<label for="select_asesor_folios" class="col-sm-3 col-form-label">Seleccionar el numero de tramites:</label>
							<select class="form-control form-control-sm col-sm-2" id="select_asesor_folios" name="select_asesor_folios">
									<option value="0">NO de tramites</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>															
							</select>						                              
                     </div>


 				
					<div class="form-group row justify-content-sm-center">
						<label for="fecha_inicio" class="col-sm-2 col-form-label">Fecha Solicitud:</label>
						<div class="col-sm-2">	
							<div class="input-group date" id="fecha_inicio_date">
								<input type="text" class="form-control form-control-sm" name="fecha_inicio" id="fecha_inicio"><span class="input-group-addon"><i class="glyphicon glyphicon-th" required></i></span>
							</div>												
						</div>

						<label for="select_hora_inicio" class="col-sm-2 col-form-label">Hora solicitud:</label>
						<div class="col-sm-2">	
							<select class="form-control form-control-sm" id="select_hora_inicio" name="select_hora_inicio" required>
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
							<label for="desc_evento" class="col-sm-2 col-form-label">Fecha entrega:</label>
							<div class="col-sm-2">	
								<div class="input-group date" id="fecha_fin_date">
									<input type="text" class="form-control form-control-sm" name="fecha_fin" id="fecha_fin"><span class="input-group-addon"><i class="glyphicon glyphicon-th" required></i></span>
								</div>												
							</div>
				
						<label for="desc_evento" class="col-sm-2 col-form-label">Hora entrega:</label>
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
			 

					$('#fecha_inicio_date').datepicker({
						format: "yyyy-mm-dd",
						language: 'es'
					});

					$('#fecha_fin_date').datepicker({
						format: "yyyy-mm-dd",
						language: "es"
					});
				</script>
				<div class="row justify-content-end link_instruc">
					<div class="col-md-3 col-sm-6">
						<a href="#instruc_toggle" id="a_instruct"><i class="fa fa-book " aria-hidden="true"></i>Instrucciones</a>
						</div>					
				</div>	
</div>

 <script type="text/javascript"> 
  var  base_url= "<?php echo base_url();?>"
	$(document).ready(function(){

	$('#a_instruct').click(function(){
    $('#instruc_toggle').toggle(1000);
});
});

</script>


<div class="container instrucciones" id="instruc_toggle">
	<div class="row">
		<div class="col-md-3 col-sm-6 article">		
				<article>
					<h6>Paso 1</h6>
					<hr class="hr_p1">
					<ul>
						<li>Revisa tu calendario</li>
						<li>Puedes pulsar clic sobre los eventos para saber su información</li>
						<li>Completa los campos correctamente</li>
					</ul>
				</article>			
		</div>
		<div class="col-md-3 col-sm-6 article">			
				<article>
					<h6>Paso 2</h6>
					<hr class="hr_p2">
					<ul>
						<li>Tu solicitud  sera registrada como pendiente</li>
						<li>Automaticamente se enviara un correo al jefe de oficina</li>
						<li>El jefe de oficina autorizara tu solcitud.</li>
					</ul>
				</article>			
		</div>
		<div class="col-md-3 col-sm-6 article">	
			<article>
					<h6>Paso 3</h6>
					<hr class="hr_p3">
					<ul>
						<li>Verificar el estado de su peticion</li>
						<li>Si la peticion es aceptada presentarse en la oficina en el horario que solicito el equipo</li>
						<li>Presentarse de forma puntual para la entrega del equipo</li>
					</ul>
				</article>			
		</div>
		<div class="col-md-3 col-sm-6 article">			
				<article>
					<h6>Paso 4</h6>
					<hr class="hr_p4">
					<ul>
						<li>Se hara entrega de los dispositivos</li>
						<li>Entregar en tiempo y forma el dispositivo</li>
						<li>En caso de no hacerlo se hara acredor a una sancion</li>
					</ul>
				</article>			
		</div>
	</div>
</div>

