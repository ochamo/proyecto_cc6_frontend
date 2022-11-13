<?php
	session_start();
	require 'funcs/conexion.php';
	require 'funcs/funcs.php';
    require 'funcs/constantes.php';
	
	if (!empty($_POST))
    {   
		echo var_dump($_POST);
        $clientId = $_SESSION['userId'];
        $appointmentDate = $_POST["appointmentDate"];
        $appointmentTime = $_POST["appointmentTime"];
		$vehicleId = $_POST["vehicleId"];
        $locationId = $_POST["locationId"];
        $data_array =  array("userId" => intval($clientId), "vehicleId" => intval($vehicleId), "appointmentDate" => $appointmentDate,"appointmentTime" => $appointmentTime,"locationId" => $locationId);
        $make_call = callAPI('POST', $URL_SERVICIO . '/api/cita', json_encode($data_array)); 
		$responses = json_decode($make_call, true); 
	}
	
	
?>

<!doctype html>
<html>
    
    <head>
    
        <meta charset="utf-8">
        <title>REGISTRO DE LINEA</title>
        
    </head>
    
    <body>
        <link rel="stylesheet" href="loginstyle.css">
        <script src="js/bootstrap.min.js" ></script>
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
        <h1 align="center"><img src="img/auto.png"></h1>
        <h2 align="center">REGISTRO DE CITA</h2>
        
        <form id="signupform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
							
							<div id="signupalert" style="display:none" class="alert alert-danger">
								<p>Error:</p>
								<span></span>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Vehiculo: </label>
								<div class="col-md-9">
								<select name="vehicleId">
                            	<option value="" selected></option>
                                <?php
								 $clientId = $_SESSION['userId'];
                                 $make_callo = callAPI('GET', $URL_SERVICIO . '/api/clientvehicle/' . $clientId, false);
                                 $response = json_decode($make_callo, true);
								 
                                 
                                ?>

                                <?php foreach ($response['items'] as $opciones): ?>
									
									<option value ="<?php echo $opciones['vehicleId']?>"><?php echo $opciones['vehiclePlate']?></option>
									<?php echo var_dump($opciones); ?>
									
									<?php endforeach ?>
								</select>

								
								
								
							<div class="form-group">
                            
								<label for="appointmentDate" class="col-md-3 control-label">Fecha: </label>
								<div class="col-md-9">
									<input type="date" class="form-control" name="appointmentDate" placeholder="Fecha" required >
								</div>
							</div>

                            <div class="form-group">
                            
								<label for="appointmentTime" class="col-md-3 control-label">Hora: </label>
								<div class="col-md-9">
									<input type="time" class="form-control" name="appointmentTime" placeholder="Hora" required >
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Locación: </label>
								<div class="col-md-9">
								<select name="locationId">
                            	<option value="" selected></option>
                                <?php
                                 $make_callo = callAPI('GET', $URL_SERVICIO . '/api/location', false);
                                 $response = json_decode($make_callo, true);
                                 
                                
                                ?>

                                <?php foreach ($response['items'] as $opciones): ?>
									<option value="<?php echo $opciones['locationId']?>"><?php echo $opciones['locationName']?></option>
      
									<?php endforeach ?>


									
										</select>
                                
                                </div>                         

                            <div class="form-group">                                      
								<div class="col-md-offset-3 col-md-9">
									<button id="btn-signup" type="submit" class="btn btn-info"><i class="icon-hand-right"></i>Registrar</button> 
								</div>
							</div>

							<div class="form-group">                                      
								<div class="col-md-offset-3 col-md-9">
									<button id="btn-signup" type="submit" class="btn btn-info"><i class="icon-hand-right"><a href='welcome.php'> Volver al menu </a></i></button> 
								</div>
							</div>
							
							
							
							
		</form>
					
        
        
    
    </body>
    
</html>