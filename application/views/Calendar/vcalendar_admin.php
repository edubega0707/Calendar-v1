 
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
				editable: false,
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
                                                $('#no_tramites_evento').val(item.no_tramites_evento);
								$('#nom_asesor').val(item.nombre_asesor);                                              
                                                $('#serie_tableta').val(item.no_serie_tableta);
                                                $('#serie_biometrico').val(item.no_serie_biometrico);
                                                $('#serie_modulo').val(item.no_serie_modulo);                                                                                       
								$('#fec_inic').val(item.fecInicio);							
                                                $('#hora_inic').val(item.hora_inicio);
                                                $('#fec_entrega').val(item.fecFin);
                                                $('#hora_entrega').val(item.hora_inicio);                                               													
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

<!-- INICIO DEL MODAL -->

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
                                          <input type="text" class="form-control form-control-sm" id="no_tramites_evento" name="no_tramites_evento" style="display: none;">
       						<input type="text" class="form-control form-control-sm" id="nom_asesor">
       					</div>
       					

                                     <div class="form-group row justify-content-sm-center">   				
       						<label for="fec_fin" class="col-sm-4 col-form-label">No. serie tableta</label>
       						<div class="col-sm-4">	
       							<input type="text" class="form-control form-control-sm" id="serie_tableta" >
       						</div>                                     
       					</div>
                                    <div class="form-group row justify-content-sm-center">   				
                                          <label for="fec_fin" class="col-sm-4 col-form-label">No.serie biometrico</label>
                                          <div class="col-sm-4">	
                                                <input type="text" class="form-control form-control-sm" id="serie_biometrico" >
                                          </div>                                
                                    </div>
                                     <div class="form-group row justify-content-sm-center">   				
                                          <label for="fec_fin" class="col-sm-4 col-form-label">No.serie modulo</label>
       						<div class="col-sm-4">	
       							<input type="text" class="form-control form-control-sm" id="serie_modulo" >
       						</div>                                  
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
       						<label for="fec_inic" class="col-sm-3 col-form-label">Fecha entrega</label>
       						<div class="col-sm-4">	
       							<input type="text" class="form-control form-control-sm" id="fec_entrega" >
       						</div>

       						<label for="hora_inic" class="col-sm-2 col-form-label">Hora Entrega:</label>
       						<div class="col-sm-3">	
       							<input type="text" class="form-control form-control-sm" id="hora_entrega">
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
       						<select class="form-control form-control-sm  col-sm-5" id="select_status" name="select_status">
       			
       							<option>PENDIENTE</option>
       							<option>ACEPTADO</option>
       							<option>RECHAZADO</option>
                                                <option>FINALIZADO</option>        							
       						</select>
       					</div>

                              <div class="form-group row justify-content-sm-center" style="display: none;" id="titu_tramites">     				
                                    <label for="select_status" class="col-sm-10 col-form-label">Ingresa Tus tramites: </label>     						
       				</div>
                              <?php 
                              for ($i=1; $i <=5 ; $i++) { ?>		  
                              <div class="form-group row justify-content-sm-center" id="folio_tys_evento<?php echo$i; ?>" style="display: none;">
                                    <label for="folio_tys_evento" class="col-sm-4 col-form-label">Folio TYS No<?php echo " ".$i.":"; ?></label>
                                    <div class="col-sm-5">
                                          <input type="text" class="form-control form-control-sm" id="folio_evento<?php echo$i; ?>" name="folio_evento<?php echo$i;?>" placeholder="Folio TYS <?php echo$i;?>"  >
                                    </div> 
                              </div>
                              <?php } ?>

                              <div class="form-group" style="display: none;" id="observaciones_evento">
                                    <label for="notas_evento">Observaciones:</label>
                                    <textarea class="form-control form-control-sm" id="notas_evento" rows="3" ></textarea>
                              </div> 


                                     <script>
                                           $("#select_status").on('change', function() 
                                           {
                                                 var  no_tramites_evento=$('#no_tramites_evento').val();
                                                 var status=$("#select_status").val();

                                                 if(status=='FINALIZADO')
                                                 {      
                                                      $('#observaciones_evento').show(600); 
                                                                                    
                                                      switch (no_tramites_evento) 
                                                      {
                                                            case '0':
                                                                  $('#titu_tramites').hide(1000);
                                                                  $('#folio_tys_evento1').hide(1000);
                                                                  $('#folio_tys_evento2').hide(1000);
                                                                  $('#folio_tys_evento3').hide(1000);
                                                                  $('#folio_tys_evento4').hide(1000);
                                                                  $('#folio_tys_evento5').hide(1000);
                                                                
                                                            break;
                                                            case '1':
                                                                  $('#titu_tramites').show(1000);
                                                                  $('#folio_tys_evento1').show(1000);
                                                                  $('#folio_tys_evento2').hide(1000);
                                                                  $('#folio_tys_evento3').hide(1000);
                                                                  $('#folio_tys_evento4').hide(1000);
                                                                  $('#folio_tys_evento5').hide(1000);
                                                
                                                            break;
                                                            case '2':
                                                                  $('#titu_tramites').show(1000);
                                                                  $('#folio_tys_evento1').show(1000);
                                                                  $('#folio_tys_evento2').show(1000);
                                                                  $('#folio_tys_evento3').hide(1000);
                                                                  $('#folio_tys_evento4').hide(1000);
                                                                  $('#folio_tys_evento5').hide(1000);
                                                
                                                            break;
                                                            case '3':
                                                                  $('#titu_tramites').show(1000);
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
                                                                  $('#titu_tramites').show(1000);
                                                                  $('#folio_tys_evento1').show(1000);
                                                                  $('#folio_tys_evento2').show(1000);
                                                                  $('#folio_tys_evento3').show(1000);
                                                                  $('#folio_tys_evento4').show(1000);
                                                                  $('#folio_tys_evento5').show(1000);
                                                            break;
                                                      
                                                            default:
                                                                  $('#titu_tramites').hide(1000);
                                                                  $('#folio_tys_evento1').hide(1000);
                                                                  $('#folio_tys_evento2').hide(1000);
                                                                  $('#folio_tys_evento3').hide(1000);
                                                                  $('#folio_tys_evento4').hide(1000);
                                                                  $('#folio_tys_evento5').hide(1000);                                                              
                                                            break;
                                                      }	
                                                 }
                                                 else
                                                 {
                                                      
                                                 }
                                                                                     
                                      })
                                     </script>

       					<div class="form-group row justify-content-sm-center">
       						<div class="input-group date col-sm-2">			     			
       				                  <button type="button" class="btn btn-primary" id="modificar_evento" data-dismiss="modal">Guardar</button>
       						</div>
       					</div>   		
		
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




<!-- fORMULARIO DE REGISTRO DE TRAMITES -->
<div class="container formulario">
                        <h4>Solicitar Equipo</h4>
                        <hr>

                        <form id="form_eventos" name="form_eventos" >
                              <div class="form-group row justify-content-sm-center" >
                                    <label for="select_status" class="col-sm-2 col-form-label">Seleccionar asesor:</label>
                                    <select class="form-control form-control-sm col-sm-6" id="select_asesor_evento" name="select_asesor_evento" required>
                                         <option>Seleccionar asesor</option> 
                                         <?php foreach ($lista_asesores as $asesor): ?>             
                                                <option><?php echo $asesor['nombre_usuario']; ?></option>                                                   
                                           <?php endforeach; ?>  							
                                    </select>
                              </div>
                              <!-- <div class="form-group row justify-content-sm-center">
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

                              </div> -->

                              <!-- Inicio Seleccionar tableta Y biometrico -->
                              <div class="form-group row justify-content-sm-center">                              
                                    <select class="form-control form-control-sm col-sm-3 mr-3" id="select_asesor_tableta" name="select_asesor_tableta">
                                         <option value="">Seleccionar Tableta</option>
                                         <?php foreach ($lista_tableta as $tableta): ?>                                              
                                                <option><?php echo $tableta['no_serie'];?></option>                                                   
                                           <?php endforeach; ?>  							
                                    </select>
                                    <div id="check_asesor" class="">                                  
                                    </div>

                                    <select class="form-control form-control-sm col-sm-3 mr-3" id="select_asesor_biometrico" name="select_asesor_biometrico">
                                         <option value="">Seleccionar biometrico</option>
                                         <?php foreach ($lista_biometrico as $biometrico): ?>                                            
                                                <option><?php echo $biometrico['no_serie'];?></option>                                                   
                                           <?php endforeach; ?>  							
                                    </select>

                                 
                                    <select class="form-control form-control-sm col-sm-3" id="select_asesor_modulo" name="select_asesor_modulo">
                                         <option value="">Seleccionar Modulo</option>
                                         <?php foreach ($lista_modulos as $lista_modulos): ?>                                            
                                                <option><?php echo $lista_modulos['no_serie'];?></option>                                                   
                                           <?php endforeach; ?>  							
                                    </select>

                              </div>
                              

                              <script>
                                $('#select_asesor_tableta').on('change',deshabilitar);
                                $('#select_asesor_biometrico').on('change',deshabilitar);
                                $('#select_asesor_modulo').on('change',deshabilitar_tableta);

                                function deshabilitar()
                                {
                                    var opcion=$('#select_asesor_tableta').val();
                                    var opcion2=$('#select_asesor_biometrico').val();

                                    if (opcion=='' && opcion2=='') 
                                    {
                                          document.getElementById('select_asesor_modulo').disabled=false;  
                                    }
                                     
                                    else 
                                    {
                                          document.getElementById('select_asesor_modulo').disabled=true; 
                                    }
                                    
                                }
                                function deshabilitar_tableta()
                                {               
                                    var opcion=$('#select_asesor_modulo').val();                     
                                    if (opcion=='') 
                                    {
                                          document.getElementById('select_asesor_tableta').disabled=false;
                                          document.getElementById('select_asesor_biometrico').disabled=false;
                                          document.getElementById('select_asesor_folios').disabled=false; 
                                    } 
                                    else 
                                    {
                                          document.getElementById('select_asesor_tableta').disabled=true;
                                          document.getElementById('select_asesor_biometrico').disabled=true;
                                          document.getElementById('select_asesor_folios').disabled=true;
                                    } 
                                   
                                }
                              </script>
      

                              <div class="form-group row justify-content-sm-center">
                        
                                    <input type="text" name="sucursal_usuario" id="sucursal_usuario" value="<?php echo $sucursal_usuario; ?>" style="display: none;">
                                    <input type="text" name="usuarios_id_usuario" id="usuarios_id_usuario" value="<?php echo $usuarios_id_usuario; ?>" style="display: none;">
                              </div>

                               <div class="form-group row justify-content-sm-center">

					 	<label for="select_status" class="col-sm-3 col-form-label">No tramites a ingresar:</label>
							<select class="form-control form-control-sm col-sm-2" id="select_asesor_folios" name="select_asesor_folios" required>
									<option value="0">Tramites</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>															
							</select>
						                              
                               </div> 
                 
        
                              <div class="form-group row justify-content-sm-center">
                                    <label for="desc_evento" class="col-sm-2 col-form-label">Fecha Solicitud:</label>
                                    <div class="col-sm-2">  
                                          <div class="input-group date" id="fecha_inicio_evento">
                                                <input type="text" class="form-control form-control-sm" name="fecha_inicio" id="fecha_inicio" required>                                                       
                                          </div>
                                          <div class="input-group date" id="fecha_inicio_evento">                                               
                                                <input type="text" class="form-control form-control-sm" name="fecha_fin" id="fecha_fin" style="display: none;">            
                                          </div>                                                                         
                                    </div>

                                    <label for="desc_evento" class="col-sm-2 col-form-label">Hora solicitud:</label>
                                    <div class="col-sm-2">  
                                          <select class="form-control form-control-sm" id="select_hora_inicio" name="select_hora_inicio" placeholder="Fecha Inicio" required>                             
                                                 <option>Hora</option>
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
                                          <div id="check_hora" class="">                                  
                                          </div>
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
                                               

                                          <input type="text" class="form-control form-control-sm" id="nombre_usuario" name="nombre_usuario" placeholder="Nombre Completo"   required> 
                                          <div id="check_username" class="" style="display: none;"></div>                                 

                                    </div>

                                    <!-- <div class="form-group">

                                          <label for="tel_usuario" class="d-flex flex-row align-items-center"><i class="fa fa-mobile mr-3" aria-hidden="true" style="font-size: 30px;"></i>Telefono Celular:</label>

                                          <input type="text" class="form-control form-control-sm" id="tel_usuario" name="tel_usuario" placeholder="Celular"  maxlength="10"  >

                                    </div> -->
                                     <div class="form-group">

                                          <label for="correo_usuario" class="d-flex flex-row align-items-center"><i class="fa fa-envelope-o mr-3 " aria-hidden="true" style="font-size: 30px;"></i>Correo Usuario:</label>
                                          <input type="mail" class="form-control form-control-sm" id="correo_usuario" name="correo_usuario" placeholder="correo electronico"  required>
                                           <div id="check_correo" class="">                                  
                                           </div>   
                                          
                                    </div>

                                    <div class="form-group">

                                          <label for="clave_usuario" class="d-flex flex-row align-items-center"><i class="fa fa-key mr-3" aria-hidden="true" style="font-size: 30px;"></i>Clave:</label>

                                          <input type="text" class="form-control form-control-sm" id="clave_usuario" name="clave_usuario" placeholder="Clave Usuario"  maxlength="5" required>
                                            <div id="check_clave" class="">                                  
                                          </div>
                                        

                                    </div>

                                    <div class="form-group">

                                          <label for="pass_usuario" class="d-flex flex-row align-items-center"><i class="fa fa-key mr-3" aria-hidden="true" style="font-size: 30px;"></i>PIN:</label>
                                          <input type="password" class="form-control form-control-sm" id="pass_usuario" name="pass_usuario" placeholder="Contraseña"   maxlength="5" required>
                                          

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