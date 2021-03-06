<!DOCTYPE html>

<html lang="en"> 
 
<head>
 
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no initial-scale=1.0, maximum-scale=1.0, minimum-sacale=1.0">

	<title>SISTEMA DE AGENDA DE INTEGRACION DINAMICA</title>

</head>

  
	<link rel="shortcut icon" href="<?php echo base_url();?>/public/img/favicon.ico" />
    <link href="https://fonts.googleapis.com/css?family=Khula|Lato" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet"> 

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

	

	.color1{background: #95E1D3;} 

	.color2{background: #EAFFD0;}

	.color3{background: #A8D8EA;}

	.sesion{height: 500px;}

	.img-encabezado{background: #48466D;}


	

</style>

	

	

</body>

<section class="container-fluid">
	<div class="row   color_dipra py-3">
		<div class="col-md-3 p-2 d-flex flex-row justify-content-center align-items-center">
		    <img  class="img-fluid w-25" src="<?php echo base_url();?>/public/img/calendar.svg" alt="Calendar">
		</div>
		<div class="col-md-6 p-2 d-flex flex-row justify-content-center align-items-center">
			<p class="h3 text-center text-white">SERVICIO DE AGENDA DE INTEGRACION DINAMICA</p>
		</div>
		<div class="col-md-3 p-2 d-flex flex-row justify-content-center align-items-center">
			<img  class="img-fluid w-25" src="<?php echo base_url();?>/public/img/calendar.svg" alt="Calendar">
		</div>
	</div>
</section >


<div class="modal fade" id="modalEvento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

	<div class="modal-dialog" role="document">

		<div class="modal-content">

			<div class="modal-header bg-primary" >
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

									<label for="des_event">Descripción del movimiento:</label>

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

			<div class="rounded p-4  bg-sesion">

			<form action="<?php echo base_url();?>Cregistro/login_validation" method="POST">


				<div class="d-flex flex-column justify-content-center align-items-center my-2" >

					<p class="h4">Iniciar Sesión</p>

				</div>

				<div class="d-flex flex-column justify-content-center align-items-center  mb-3" >

				</div>

				<div class="form-group">

					<label for="correo_usuario" class="d-flex flex-row align-items-center width-icons"><i class="fa fa-user mr-3 " aria-hidden="true"></i>CLAVE:</label>

					<input type="text" class="form-control" id="clave_usuario" name="clave_usuario" placeholder="Usuario"  >

					<span class="color-error  text-center"><strong><?php echo form_error('clave_usuario'); ?> </strong></span>

				</div>

				<div class="form-group">

					<label for="pass_usuario" class="d-flex flex-row align-items-center width-icons"><i class="fa fa-key mr-3 " aria-hidden="true"></i>PIN:</label>

					<input type="password" class="form-control" id="pass_usuario" name="pass_usuario" placeholder="Contraseña">

					<span class="color-error  text-center"><strong><?php echo form_error('pass_usuario'); ?></strong></span>
				</div>
				<div class="d-flex flex-column justify-content-center align-items-center text-white mb-5">
					<button type="submit" class="btn btn btn-success"  href="#login_registro" name="inicia_sesion" id="inicia_sesion">Iniciar Sesion</button>
						
						
						<span class="color-error  text-center"><strong><?php echo $this->session->flashdata('error'); ?> </strong></span>
				

				</div>

			</form>
	
		</div>

	</div>

</section>

 <footer class="container-fluid">
	
		<div class="row  bg-inverse text-white flex-row justify-content-center align-items-center ">
			<div class="col-md-4 col-sm-4 text-center my-1">
				<img  class="img-fluid w-50" src="<?php echo base_url();?>/public/img/logodipra.png" alt="Calendar">
			</div>
			<div class="col-md-4 col-sm-4 text-center my-1">
				<h6 class="text-white">DIRECCION EN PREVENCION DE RIESGOS Y ASESORIA FINANCIERA</h6>
			</div>
			<div class="col-md-4 col-sm-4 d-flex flex-md-row align-items-center justify-content-center my-1">
				<i class="fa fa-facebook-official text-white mr-2" aria-hidden="true" style="font-size: 16px;"></i>
				<a href="" class="text-white" style="text-decoration: none; font-size: 16px;">DIPRA</a>
				
			</div>		
		</div>

</footer> 


</html>