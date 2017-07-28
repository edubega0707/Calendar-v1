<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"></meta>
	<title>Agenda Dipradigital</title>
	<meta name="viewport" content="width=device-width, user-scalable=no initial-scale=1.0, maximum-scale=1.0, minimum-sacale=1.0">

	<link href="https://fonts.googleapis.com/css?family=Khula|Lato" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans|Roboto+Slab" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/public/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/public/libs/bootstrap-datepicker/css/bootstrap-datepicker.css">
	<link href='<?php echo base_url();?>/assets/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
	<link href='<?php echo base_url();?>/assets/fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print'/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/public/css/estilosagenda.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/public/css/jquery-confirm.min.css">


	<script type="text/javascript" src="<?php echo base_url();?>/public/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/public/js/tether.min.js"></script>
	<script src='<?php echo base_url();?>/assets/fullcalendar/lib/moment.min.js'></script>
	<script type="text/javascript" src="<?php echo base_url();?>/public/js/bootstrap.min.js"></script>		
	<script type="text/javascript" src="<?php echo base_url();?>/public/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>/public/libs/bootstrap-datepicker/locales/bootstrap-datepicker.ar.min.js"></script>
	
	
	<script  type="text/javascript" src='<?php echo base_url();?>/assets/fullcalendar/fullcalendar.js'></script> 
	<script  type="text/javascript" src='<?php echo base_url();?>/assets/fullcalendar/locale/es.js'></script>
	<script  type="text/javascript" src="<?php echo base_url();?>/public/js/jquery-confirm.min.js"></script>
	<script  type="text/javascript" src="<?php echo base_url();?>/public/js/smooth-scroll.min.js"></script>

	
	 
	
	<style>

	.bienvenido{background: #E3FDFD; }

	.color1{background: #95E1D3;} 

	.color2{background: #EAFFD0;}

	.color3{background: #A8D8EA;}

	.sesion{ height: auto;}

</style>

	

</head>
<body >
	<div class="container-fluid header ">
		<div class="row justify-content-center">
				<div class="col-md-3 col-sm-3 col-12 logo"><img src="<?php echo base_url();?>/public/img/logo.png"></div>
				<div class="col-md-6 col-sm-6 col-12 titulo"><h4>Sistema Integral para el prestamo de tablet</h4></div>
				<div class="col-md-3 col-sm-3 col-12 sesion ">

				<div class="btn-group my-2 p-2">
						<button type="button" class="btn btn-danger dropdown-toggle d-flex flex-row justify-content-around align-items-center" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fa fa-user" aria-hidden="true" style="color: #fff;">
							</i><?php echo $usuario; ?>
						</button>
						<div class="dropdown-menu">
							<a class="dropdown-item d-flex flex-row justify-content-center align-items-center" href="<?php echo base_url()."Cregistro/logout"; ?>"><i class="fa fa-sign-out" aria-hidden="true"></i>Cerrar Sesion</a>
						</div>
					</div>

				</div>



				<!-- Example single danger button -->

				


		</div>
	
	</div>
	


