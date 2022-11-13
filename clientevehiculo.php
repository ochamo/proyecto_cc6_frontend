<?php
	session_start();
	require 'funcs/conexion.php';
	require 'funcs/funcs.php';
    require 'funcs/constantes.php';
	
	
	if (!empty($_POST))
    {   
        $clientId = $_SESSION['userId'];
        $vehicleModelId = $_POST["vehicleModelId"];
        $vehiclePlate = $_POST["vehiclePlate"];
        $data_array =  array("clientId" => intval($clientId),"vehicleModelId" => $vehicleModelId,"vehiclePlate" => $vehiclePlate);
        $make_call = callAPI('POST', $URL_SERVICIO . '/api/clientvehicle', json_encode($data_array)); 
        $response = json_decode($make_call, true); 
    }
	
	
?>

<!doctype html>
<html>
    
    <head>
    
        <meta charset="utf-8">
        <title>REGISTRO DE CLIENTE/VEHICULO </title>
        
    </head>
    
    <body>
        <link rel="stylesheet" href="loginstyle.css">
        <script src="js/bootstrap.min.js" ></script>
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
        <h1 align="center"><img src="img/auto.png"></h1>
        <h2 align="center">REGISTRO DE CLIENTE/VEHICULO </h2>
        
        <form id="signupform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
							
							<div id="signupalert" style="display:none" class="alert alert-danger">
								<p>Error:</p>
								<span></span>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label">Modelo: </label>
								<div class="col-md-9">
								<select name="vehicleModelId">
                            	<option value="" selected></option>
                                <?php
                                 $make_callo = callAPI('GET', $URL_SERVICIO . '/api/vehicleModel', false);
                                 $response = json_decode($make_callo, true);

                                 
                                ?>

                                <?php foreach ($response['items'] as $opciones): ?>
									
									<option value ="<?php echo $opciones['modelId']?>"><?php echo $opciones['vehicleLineModel']['lineName'] . " ". $opciones['modelYear']?></option>
                                    
                                    <?php echo var_dump($opciones); ?>
									<?php endforeach ?>

									
								</select>

                                <div class="form-group">
                            
								<label for="vehiclePlate" class="col-md-3 control-label">Placa: </label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="vehiclePlate" placeholder="Placa" required >
								</div>
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