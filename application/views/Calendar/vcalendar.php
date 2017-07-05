


 
<script type="text/javascript">

	$(document).ready(function() {

		$.post('<?php echo base_url();?>ccalendar/getEventos',  
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
				<hr>
				<form action="<?php echo base_url();?>Ccalendar/insert_event" method="POST">
				 
					<div class="form-group row justify-content-sm-center">
						<label for="desc_evento" class="col-sm-3 col-form-label">Descripción:</label>
						<div class="col-sm-7">
							<textarea class="form-control form-control-sm" id="desc_evento" name="desc_evento" rows="5" placeholder="Descripción" required style="text-transform:uppercase;"></textarea>
						</div>
						<input type="text" name="nombre_asesor" value="<?php echo $usuario; ?>" style="display: none;">
					</div>
 				
					<div class="form-group row justify-content-sm-center">
						<label for="desc_evento" class="col-sm-2 col-form-label">Fecha Solicitud:</label>
						<div class="col-sm-2">	
							<div class="input-group date" id="fecha_inicio">
								<input type="text" class="form-control form-control-sm" name="fecha_inicio"><span class="input-group-addon"><i class="glyphicon glyphicon-th" required></i></span>
							</div>												
						</div>

						<label for="desc_evento" class="col-sm-2 col-form-label">Hora solicitud:</label>
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
								<div class="input-group date" id="fecha_fin">
									<input type="text" class="form-control form-control-sm" name="fecha_fin"><span class="input-group-addon"><i class="glyphicon glyphicon-th" required></i></span>
								</div>												
							</div>
				
						<label for="desc_evento" class="col-sm-2 col-form-label">Hora entrega:</label required>
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
			 

					$('#fecha_inicio').datepicker({
						format: "yyyy-mm-dd",
						language: "es"
					});

					$('#fecha_fin').datepicker({
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
						<li>Revisa el calendario</li>
						<li>Pulsa clic sobre los eventos para observar su informacion</li>
						<li>Pasa al formulario de solicitud</li>
					</ul>
				</article>			
		</div>
		<div class="col-md-3 col-sm-6 article">			
				<article>
					<h6>Paso 2</h6>
					<hr class="hr_p2">
					<ul>
						<li>Completa los campos correctamente</li>
						<li>Tu solicitud  sera registrada como pendiente</li>
						<li></li>
					</ul>
				</article>			
		</div>
		<div class="col-md-3 col-sm-6 article">	
			<article>
					<h6>Paso 3</h6>
					<hr class="hr_p3">
					<ul>
						<li>Coffee</li>
						<li>Tea</li>
						<li>Coca Cola</li>
					</ul>
				</article>			
		</div>
		<div class="col-md-3 col-sm-6 article">			
				<article>
					<h6>Paso 4</h6>
					<hr class="hr_p4">
					<ul>
						<li>Coffee</li>
						<li>Tea</li>
						<li>Coca Cola</li>
					</ul>
				</article>			
		</div>
	</div>
</div>

