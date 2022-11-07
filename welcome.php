<?php
	//para poder usar var de sesion
	session_start();
	require 'funcs/conexion.php';
    require 'funcs/funcs.php';
	require 'funcs/constantes'


	//validar si hay inicio de sesion se indica que si la variable de sesion id_usuario no tiene valor  que redireccione al login
	//para no permitir hasta que se haya loggeado  
	if (!isset($_SESSION["id_usuario"])){
		header("Location: loginformulario.php");
	}

	$idUsuario = $_SESSION['id_usuario'];
	//Se consuta el nombre del usuario que esta iniciando sesion
	$sql = "SELECT id, nombre FROM usuarios WHERE id ='$idUsuario'";
	
	$result = $mysqli->query($sql);

	$row = $result->fetch_assoc();


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
			padding-top: 20px;
			padding-bottom: 20px;
			}
		</style>
	</head>
	
	<body>
		<div class="container">
			
		<nav class="navbar navbar-inverse navbar-fixed-top">
				<div class='container'>
					<a class="navbar-brand" href="#">Veterinaria</a>
					
					
						
						<ul class='nav navbar-nav'>
							<li><a href='registromascota.php'>Ingresar Mascota </a> </li>			
						</ul>
					
						
						
						<ul class='nav navbar-nav'>
							<li><a href='newespecies.php'>Ingresar Especie</a></li>			
						</ul>

						
						<ul class='nav navbar-nav'>
							<li><a href='newraza.php'>Ingresar Razas</a></li>			
						</ul>
						
						
						<?php if($_SESSION['tipo_usuario']==1) { ?>
						<ul class='nav navbar-nav'>
							<li><a href='registrodres.php'>Ingresar Doctores</a></li>			
						</ul>
						<?php } ?>
						
						<?php if($_SESSION['tipo_usuario']==1) { ?>
						<ul class='nav navbar-nav'>
							<li><a href='registrodres.php'>Ingresar Doctores</a></li>			
						</ul>
						<?php } ?>

						
						<?php if($_SESSION['tipo_usuario']==1) { ?>
						<ul class='nav navbar-nav'>
							<li><a href='registroproducto.php'>Ingresar Producto</a></li>			
						</ul>
						<?php } ?>

						
						<?php if($_SESSION['tipo_usuario']==1) { ?>
						<ul class='nav navbar-nav'>
							<li><a href='registrodres.php'>Ingresar Doctores</a></li>			
						</ul>
						<?php } ?>

						
						<?php if($_SESSION['tipo_usuario']==1) { ?>
						<ul class='nav navbar-nav'>
							<li><a href='registrarconsulta.php'>Ingresar Consulta</a></li>			
						</ul>
						<?php } ?>


						
						<?php if($_SESSION['tipo_usuario']==1) { ?>
						<ul class='nav navbar-nav'>
							<li><a href='newespecialidad.php'>Ingresar Especialidades</a></li>			
						</ul>
						<?php } ?>

						
						<?php if($_SESSION['tipo_usuario']==1) { ?>
						<ul class='nav navbar-nav'>
							<li><a href='newclinica.php'>Ingresar Clinicas</a></li>			
						</ul>
						<?php } ?>

						
						<?php if($_SESSION['tipo_usuario']==1) { ?>
						<ul class='nav navbar-nav'>
							<li><a href='newpiso.php'>Ingresar Piso</a></li>			
						</ul>
						<?php } ?>

						
						
						<?php if($_SESSION['tipo_usuario']==1) { ?>
							<ul class='nav navbar-nav'>
								<li><a href='users.php'>Administrar Usuarios</a></li>
							</ul>
						<?php } ?>
						
						<?php if($_SESSION['tipo_usuario']==1) { ?>
						<ul class='nav navbar-nav'>
							<li><a href='mascota.php'>Administrar Masoctas</a></li>			
						</ul>
						<?php } ?>


						
						<?php if($_SESSION['tipo_usuario']==1) { ?>
						<ul class='nav navbar-nav'>
							<li><a href='administrarproductos.php'>Administrar Productos</a></li>			
						</ul>
						<?php } ?>
						

						
						<?php if($_SESSION['tipo_usuario']==1) { ?>
							<ul class='nav navbar-nav'>
								<li><a href='administrardres.php'>Administrar Doctores</a></li>
							</ul>
						<?php } ?>

						
						<?php if($_SESSION['tipo_usuario']==1) { ?>
						<ul class='nav navbar-nav'>
							<li><a href='administrarconsulta.php'>Administrar Consultas</a></li>			
						</ul>
						<?php } ?>

						
						<?php if($_SESSION['tipo_usuario']==1) { ?>
						<ul class='nav navbar-nav'>
							<li><a href='adminespecies.php'>Administrar Especies</a></li>			
						</ul>
						<?php } ?>

						
						<?php if($_SESSION['tipo_usuario']==1) { ?>
						<ul class='nav navbar-nav'>
							<li><a href='adminrazas.php'>Administrar Razas</a></li>			
						</ul>
						<?php } ?>

						
						<?php if($_SESSION['tipo_usuario']==1) { ?>
						<ul class='nav navbar-nav'>
							<li><a href='admincomentarios.php'>Administrar Comentarios</a></li>			
						</ul>
						<?php } ?>

						
						<?php if($_SESSION['tipo_usuario']==1) { ?>
						<ul class='nav navbar-nav'>
							<li><a href='adminalbum.php'>Administrar Album</a></li>			
						</ul>
						<?php } ?>



						
						<?php if($_SESSION['tipo_usuario']==2) { ?>
							<ul class='nav navbar-nav'>
								<li><a href='mascotasuser.php'>Mis mascotas</a></li>
							</ul>
						<?php } ?>

						<?php if($_SESSION['tipo_usuario']==2) { ?>
							<ul class='nav navbar-nav'>
								<li><a href='admindres.php'>Doctores</a></li>
							</ul>
						<?php } ?>

						<?php if($_SESSION['tipo_usuario']==2) { ?>
							<ul class='nav navbar-nav'>
								<li><a href='productos.php'>Productos</a></li>
							</ul>
						<?php } ?>

						<?php if($_SESSION['tipo_usuario']==2) { ?>
							<ul class='nav navbar-nav'>
								<li><a href='consultas.php'>Consultas</a></li>
							</ul>
						<?php } ?>

						<?php if($_SESSION['tipo_usuario']==2) { ?>
							<ul class='nav navbar-nav'>
								<li><a href='comentarios.php'>Comentarios</a></li>
							</ul>
						<?php } ?>


						<?php if($_SESSION['tipo_usuario']==2) { ?>
							<ul class='nav navbar-nav'>
								<li><a href='album.php'>Ingresar foto en Album</a></li>
							</ul>
						<?php } ?> 
				
						<ul class='nav navbar-nav'>
							<li><a href='consulta.php'>Album</a></li>			
						</ul>
						<ul class='nav navbar-nav navbar-right'>
							<li><a href='logout.php'>Cerrar Sesi&oacute;n</a></li>
						</ul>
					</div>
				</div>

				
				
						
			</nav>	
			<img src="img/vet.png">
			
			
			</div>
		</div>
	</body>
</html>		