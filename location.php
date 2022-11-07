<?php
	session_start();
	require 'funcs/conexion.php';
	require 'funcs/funcs.php';
    require 'funcs/constantes.php';
	
	
	if (!empty($_POST))
    {   
        $locationName = $_POST["locationName"];
        $locationLatitude = $_POST["locationLatitude"];
        $locationLongitude = $_POST["locationLongitude"];
        $locationAddress = $_POST["locationAddress"];
        $data_array =  array("locationName" => $locationName, "locationLatitude" => $locationLatitude, "locationLongitude" => $locationLongitude, "locationAddress" => $locationAddress );
        $make_call = callAPI('POST', $URL_SERVICIO . '/api/location/', json_encode($data_array)); 
        $response = json_decode($make_call, true); 
    }
	
	
?>

<!doctype html>
<html>
    
    <head>
    
        <meta charset="utf-8">
        <title>Registro de locación</title>
        
    </head>
    
    <body>
        <link rel="stylesheet" href="loginstyle.css">
        <script src="js/bootstrap.min.js" ></script>
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
        <h1 align="center"><img src="img/auto.png"></h1>
        <h2 align="center">Resgistro de Locación</h2>
        
        <form id="signupform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
							
							<div id="signupalert" style="display:none" class="alert alert-danger">
								<p>Error:</p>
								<span></span>
							</div>
							
							
							
							
							
							<div class="form-group">
								<label for="locationName" class="col-md-3 control-label">Nombre de la locación: </label>
								<div class="col-md-9">
									<input type="text" class="locationName" name="locationName" placeholder="Nombre" required>
								</div>
							</div>

                            <div class="form-group">
								<label for="locationLatitude" class="col-md-3 control-label">Latitud: </label>
								<div class="col-md-9">
									<input type="text" class="locationLatitude" name="locationLatitude" placeholder="Latitud" required>
								</div>
							</div>

                            <div class="form-group">
								<label for="locationLongitude" class="col-md-3 control-label">Longitud: </label>
								<div class="col-md-9">
									<input type="text" class="locationLongitude" name="locationLongitude" placeholder="Longitud" required>
								</div>
							</div>

                            <div class="form-group">
								<label for="locationAddress" class="col-md-3 control-label">Dirección exacta: </label>
								<div class="col-md-9">
									<input type="text" class="locationAddress" name="locationAddress" placeholder="Dirección" required>
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