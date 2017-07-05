<!DOCTYPE html>

<html lang="en">

<head>
 
	<meta charset="UTF-8">

	<title>Registro  de Usuario de tableta</title>

</head>



<link href="https://fonts.googleapis.com/css?family=Khula|Lato" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/public/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/public/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/public/libs/bootstrap-datepicker/css/bootstrap-datepicker.css">

	<link href='<?php echo base_url();?>/assets/fullcalendar/fullcalendar.min.css' rel='stylesheet' />

	<link href='<?php echo base_url();?>/assets/fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print'/>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/public/css/estilosagenda.css">





	<script type="text/javascript" src="<?php echo base_url();?>/public/js/jquery-3.2.1.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url();?>/public/js/tether.min.js"></script>

	<script src='<?php echo base_url();?>/assets/fullcalendar/lib/moment.min.js'></script>

	<script type="text/javascript" src="<?php echo base_url();?>/public/js/bootstrap.min.js"></script>		

	<script type="text/javascript" src="<?php echo base_url();?>/public/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url();?>/public/libs/bootstrap-datepicker/locales/bootstrap-datepicker.ar.min.js"></script>

	

	

	<script src='<?php echo base_url();?>/assets/fullcalendar/fullcalendar.js'></script>

	<script src='<?php echo base_url();?>/assets/fullcalendar/locale/es.js'></script>



<style>

	.bienvenido{background: #E3FDFD; }

	.color1{background: #95E1D3;} 

	.color2{background: #EAFFD0;}

	.color3{background: #A8D8EA;}

	.sesion{ height: auto;}

	

</style>

	

	

</body>

<section class="container-fluid bienvenido">

	<div class="row  d-flex flex-row justify-content-around align-items-center">

		<div>

		    <img  class="img-fluid w-75" src="<?php echo base_url();?>/public/img/calendar.svg" alt="Calendar">

		</div>

		<div>

			<p class="h3  text-center">Sistema  Agenda Dipra digital</p>

		</div>

		<div>

			<img  class="img-fluid w-75" src="<?php echo base_url();?>/public/img/calendar.svg" alt="Calendar">

		</div>

	</div>

</section >







<section class="container" >

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

									<input type="text" class="form-control form-control-sm" id="nom_asesor"  >

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

</section>

<section class="container">

	<div class="row sesion" id="login_registro">  	

		<div class="col-md-5  my-3 d-flex	flex-md-column  align-items-center justify-content-center">

			<div class="rounded p-5 bg-primary text-white">

			<form action="<?php echo base_url();?>Cregistro/login_validation" method="POST">


				<div class="d-flex flex-column justify-content-center align-items-center text-white my-2" >

					<p class="h4">Iniciar Sesion</p>

				</div>

				<div class="d-flex flex-column justify-content-center align-items-center text-white mb-3" >

				</div>

				<div class="form-group">

					<label for="correo_usuario" class="d-flex flex-row align-items-center"><i class="fa fa-user mr-3" aria-hidden="true"></i>clave:</label>

					<input type="text" class="form-control" id="clave_usuario" name="clave_usuario" placeholder="Usuario"  >

					<span class="text-warning"><strong><?php echo form_error('clave_usuario'); ?> </strong></span>

				</div>

				<div class="form-group">

					<label for="contraseña_usuario" class="d-flex flex-row align-items-center"><i class="fa fa-key mr-3" aria-hidden="true"></i>PIN:</label>

					<input type="password" class="form-control" id="contraseña_usuario" name="contraseña_usuario" placeholder="Contraseña">

					<span class="text-warning"><strong><?php echo form_error('contraseña_usuario'); ?></strong></span>

				</div>

				<div class="d-flex flex-column justify-content-center align-items-center text-white mb-5">

					<button type="submit" class="btn btn btn-success"  href="#login_registro" name="inicia_sesion" id="inicia_sesion">Iniciar Sesion</button>

					<?php

							echo $this->session->flashdata('error');

					?>

				</div>

			</form>
	
		</div>

	</div>

</section>





<footer></footer>



	

	

</html>