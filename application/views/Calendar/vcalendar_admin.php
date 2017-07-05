
 

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
				editable: true,
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
								$('#id_Evento').val(item.idEvento);
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
       						<input type="text" class="form-control form-control-sm" id="id_Evento" name="id_Evento" style="display: none;">
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

       					<div class="form-group row justify-content-sm-center">
       						<label for="select_status" class="col-sm-4 col-form-label">Cambiar Status: </label>
       						<select class="form-control-sm  col-sm-5" id="select_status" name="select_status">
       							<option>Seleccionar estado</option>
       							<option>PENDIENTE</option>
       							<option>ACEPTADO</option>
       							<option>RECHAZADO</option>       							
       						</select>
       					</div>

       					<div class="form-group row justify-content-sm-center">
       						<div class="input-group date col-sm-2">	
       				<input type="text" name="correo_asesor" id="correo_asesor" value="<?php echo $session; ?>" style="display: none;">						
       				<button type="button" class="btn btn-primary" id="modificar_evento" data-dismiss="modal">Guardar</button>
       						</div>
       					</div>

       					<script>
             

       						$(document).ready(function()
       						{		

       							$('#modificar_evento').on('click',function()
                                                {
                                                      var id=$('#id_Evento').val();
                                                      var status=$('#select_status').val();
                                                      var color='';

                                                       switch(status)
                                                       {
                                                            case 'PENDIENTE':
                                                                  color='#E85B48';
                                                            break;
                                                            case 'RECHAZADO':
                                                                  color='#C50000';
                                                            break;
                                                            case 'ACEPTADO':
                                                                 color='#A5F2E7';
                                                            break;

                                                       }

       								$.post("<?php echo base_url();?>Ccalendar/modificar_evento",
       								{
       									status:status,
       									id:id,
                                                            color:color
       								},
       								function(data, status){
       									alert("El evento se modifico exitosamente");
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

<!-- Fin del modal -->
