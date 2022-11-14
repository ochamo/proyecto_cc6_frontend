<?php
	//para poder usar var de sesion
	session_start();
	require 'funcs/conexion.php';
    require 'funcs/funcs.php';



?>

<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Bienvenido</title>
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
		<script src="js/bootstrap.min.js" ></script>
		
		<style>
			body {
			padding-top: 10px;
			padding-bottom: 10px;
			}
		</style>
	</head>
	
	<body>
		<div class="container">
			
		<nav class="navbar navbar-inverse navbar-fixed-top">
				<div class='container'>
					<a class="navbar-brand" href="#"><FONT COLOR="white">Taller</FONT></a>

						
						<?php if($_SESSION['role']=="3") { ?>
						<ul class='nav navbar-nav'>
							<li><a href='appointment.php'><FONT COLOR="white">Ingresar Cita </FONT></a></li>			
						</ul>
						<?php } ?>

						<?php if($_SESSION['role']=="3") { ?>
						<ul class='nav navbar-nav'>
							<li><a href='clientevehiculo.php'><FONT COLOR="white">Ingresar Vehiculo </FONT></a></li>			
						</ul>
						<?php } ?>

						<?php if($_SESSION['role']=="3") { ?>
						<ul class='nav navbar-nav'>
							<li><a href='vehiclet.php'><FONT COLOR="white">Ver Vehiculos </FONT></a></li>			
						</ul>
						<?php } ?>
						
						<?php if($_SESSION['role']=="3") { ?>
						<ul class='nav navbar-nav'>
							<li><a href='citat.php'><FONT COLOR="white">Ver Citas </FONT></a></li>			
						</ul>
						<?php } ?>
						
						<?php if($_SESSION['role']=="3") { ?>
						<ul class='nav navbar-nav'>
							<li><a href='ordenc.php'><FONT COLOR="white"> Orden de Trabajo </FONT></a></li>			
						</ul>
						<?php } ?>

						<?php if($_SESSION['role']=="3") { ?>
						<ul class='nav navbar-nav'>
							<li><a href='pagar.php'><FONT COLOR="white"> Pagar </FONT></a></li>			
						</ul>
						<?php } ?>

						<?php if($_SESSION['role']=="2") { ?>
						<ul class='nav navbar-nav'>
							<li><a href='advisor.php'><FONT COLOR="white">Ingresar Asesor </FONT></a></li>			
						</ul>
						<?php } ?>

						<?php if($_SESSION['role']=="2") { ?>
						<ul class='nav navbar-nav'>
							<li><a href='marcas.php'><FONT COLOR="white"> Marcas </FONT></a></li>			
						</ul>
						<?php } ?>

						<?php if($_SESSION['role']=="2") { ?>
						<ul class='nav navbar-nav'>
							<li><a href='linea.php'><FONT COLOR="white"> Lineas </FONT></a></li>			
						</ul>
						<?php } ?>

						<?php if($_SESSION['role']=="2") { ?>
						<ul class='nav navbar-nav'>
							<li><a href='model.php'><FONT COLOR="white">Modelos </FONT></a></li>			
						</ul>
						<?php } ?>

						<?php if($_SESSION['role']=="2") { ?>
						<ul class='nav navbar-nav'>
							<li><a href='location.php'><FONT COLOR="white"> Locaciones </FONT></a></li>			
						</ul>
						<?php } ?>

						<?php if($_SESSION['role']=="2") { ?>
						<ul class='nav navbar-nav'>
							<li><a href='asesor.php'><FONT COLOR="white">Citas </FONT></a></li>			
						</ul>
						<?php } ?>

						<?php if($_SESSION['role']=="2") { ?>
						<ul class='nav navbar-nav'>
							<li><a href='asesor-con-ordendetrabajo.php'><FONT COLOR="white"> Orden de trabajo  </FONT></a></li>			
						</ul>
						<?php } ?>

						

						<ul class='nav navbar-nav navbar-right'>
							<li><a href='logout.php'>Cerrar Sesi&oacute;n</a></li>
						</ul>
					</div>
				</div>
							
				
				
						
			</nav>	
			<div align="center"><img src="img/Mecanico-07.gif"width="500" height="460"></div>
			
			
			</div>
		</div>
	</body>
</html>		