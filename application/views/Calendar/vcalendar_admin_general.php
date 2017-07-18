

 <div class="container my-5">
       <div class="row justify-content-sm-center my-3 ">
             <h4 id="titulo_historial">CALENDARIO DE PRESTAMO DE TABLETA</h4>
       </div>
       <div class="row ">
            <div class="col-sm-5">
                  <div class="form-group row justify-content-sm-center">
                  <label for="select_status" class="col-sm-5 col-form-label">Consultar Calendario : </label>
                        <select class="form-control form-control-sm  col-sm-5" id="select_his_suc" name="select_his_suc">
                              <option value="DIPRA">Seleccionar Sucursal</option>
                              <option value="PACHUCA">PACHUCA</option>
                              <option value="PACHUCAII">PACHUCAII</option>
                              <option value="SATELITE">SATELITE</option>
                              <option value="CD_AZTECA">CD AZTECA</option>
                              <option value="PUEBLA">PUEBLA</option>
                              <option value="SAN_LUIS_POTOSI">SAN LUIS POTOSI</option>                                           
                        </select>
                  </div>
            </div>       
       </div>
 </div>

<script type="text/javascript"> 

      $(document).ready(function() {
       
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
                                    events: function() 
                                    {
                                     $('#select_his_suc').on('change', function(){

                                    var sucursal_usuario =$('#select_his_suc').val();
                                    $("#titulo_historial").text("Calendario prestamo tableta "+ sucursal_usuario);
                              
                                    $.post('<?php echo base_url();?>ccalendar/getEventos',
                                    {
                                          sucursal_usuario:sucursal_usuario
                                    },  

                                    function(data){
                                          $.parseJSON(data);                      
                              
                                    })
      
                                     });
                                    },
                                                                        

                              
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
					<select class="form-control form-control-sm col-sm-5" id="select_status" name="select_status">
						<option>PENDIENTE</option>
						<option>ACEPTADO</option>
						<option>RECHAZADO</option>       							
					</select>
				</div>

				<div class="form-group row justify-content-sm-center">
					<div class="input-group date col-sm-2">

                                <input type="text" name="clave_asesor" id="clave_asesor" value="<?php echo $session; ?>" style="display: none;"> 

                                <button type="button" class="btn btn-primary" id="modificar_evento" data-dismiss="modal">MODIFICAR</button>
                          </div>
                    </div>

				<script>

					$(document).ready(function()
					{	
                                    
                                    function modificar()
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
                                          var data = '&status='+status+'&id='+id+'&color='+color;
                                                                                        
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


<!-- FORMULARIO DE REGISTRO DE USUARIOS -->
<section class="container">
      <div class="row flex-md-column  align-items-center justify-content-center">
      <div class="col-md-8  flex-md-column  align-items-center justify-content-center" id="registro"> 
      
    
      
       <div class="p-4 m-2  my-3 form-shadow">

              <form id="form_registro" name="form_registro">
           
                  <div class="row d-flex flex-row justify-content-center align-items-center mb-4">                

                        <img  class="img-fluid  mr-3" width="50px;" src="<?php echo base_url();?>/public/img/edit.svg" alt="Calendar">

                        <p class="h5 text-center">REGISTRO DE USUARIOS</p>
                                  

                  </div>
                     <hr class="hr_p2 my-5">       

                  <div class="form-group row">
                        <label for="nombre_usuario" class="d-flex flex-row align-items-center col-12 col-sm-6 col-md-4"><i class="fa fa-user mr-3" aria-hidden="true"  style="font-size: 30px;"></i>Nombre completo:</label>
                        <div class="col-12 col-sm-6 col-md-7">
                             <input type="text" class="form-control form-control-sm" id="nombre_usuario" name="nombre_usuario" placeholder="Nombre Completo"  style="text-transform:uppercase;" required>
                        </div>
                        <span class="color-error  text-center"><strong><?php echo form_error('nombre_usuario'); ?> </strong></span>
                       
                       
                  </div>

                  <div class="form-group row ">
                        <label for="rol_usuario" class="d-flex flex-row align-items-center col-12 col-sm-6 col-md-4"><i class="fa fa-user-plus mr-3" aria-hidden="true"  style="font-size: 30px;"></i>Seleccionar tipo de Usuario:</label>
                        <div class="col-12 col-sm-6 col-md-7" >
                              <select class="form-control form-control-sm" id="rol_usuario" name="rol_usuario" required>
                              <option>SELECCIONAR USUARIO </option>
                              <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                              <option value="ASESOR">ASESOR</option>                                           
                        </select>
                        </div>                     
                  </div>

                   <div class="form-group row ">
                       
                        <label for="sucursal_usuario" class="d-flex flex-row align-items-center col-12 col-sm-6 col-md-4"><i class="fa fa-building-o mr-3" aria-hidden="true"  style="font-size: 30px;"></i>Seleccionar sucursal:</label>
                        <div class="col-12 col-sm-6 col-md-7">
                              <select class="form-control form-control-sm " id="sucursal_usuario" name="sucursal_usuario" required>
                              <option>SELECCIONAR SUCURSAL</option>
                              <option value="PACHUCA">PACHUCA</option>
                              <option value="PACHUCAII">PACHUCAII</option>
                              <option value="SATELITE">SATELITE</option>
                              <option value="CD_AZTECA">CD AZTECA</option>
                              <option value="PUEBLA">PUEBLA</option>
                              <option value="SAN_LUIS_POTOSI">SAN LUIS POTOSI</option>                                           
                        </select> 
                        </div>
                       
                  </div>

                  <div class="form-group row">

                        <label for="tel_usuario" class="d-flex flex-row align-items-center  col-12 col-sm-6 col-md-4"><i class="fa fa-mobile mr-3 " aria-hidden="true" style="font-size: 30px;"></i>Telefono Celular:</label>
                        <div class="col-12 col-sm-6 col-md-7"> 
                            <input type="text" class="form-control form-control-sm" id="tel_usuario" name="tel_usuario" placeholder="Celular" required >  
                        </div>
                  
                  </div>

                  <div class="form-group row">

                        <label for="clave_usuario" class="d-flex flex-row align-items-center col-12 col-sm-6 col-md-4"><i class="fa fa-key mr-3" aria-hidden="true" style="font-size: 30px;"></i>Clave usuario:</label>
                         <div class="col-12 col-sm-6 col-md-7"> 
                             <input type="text" class="form-control form-control-sm" id="clave_usuario" name="clave_usuario" placeholder="Clave" required>
                        </div>
                        

                       

                  </div>

                  <div class="form-group row">

                        <label for="pass_usuario" class="d-flex flex-row align-items-center col-12 col-sm-6 col-md-4"><i class="fa fa-key mr-3" aria-hidden="true" style="font-size: 30px;"></i>PIN usuario:</label>
                      
                         <div class="col-12 col-sm-6 col-md-7"> 
                             <input type="password" class="form-control form-control-sm" id="pass_usuario" name="pass_usuario" placeholder="Pin usuario" required>
                        </div>
                   

                  </div>


                  <div class="d-flex flex-row justify-content-center align-items-center text-white mt-3" >

                        <div class="d-flex flex-column justify-content-center align-items-center text-white">

                              <button type="submit" class="btn  btn-success" id="registrar">Registrar</button>

                        </div>

                  </div>

      
             </form>
             <script>
                var  base_url= "<?php echo base_url();?>"
             </script>
      
      </div>

      </div>
      

</div>
</section>


<!-- FIN DE FORMULARIO DE REGISTRO DE USUARIOS -->