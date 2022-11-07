<?php
	session_start();
	require 'funcs/conexion.php';
	require 'funcs/funcs.php';
    require 'funcs/constantes.php';
	
	
	if (!empty($_POST))
    {   
        $brandName = $_POST["brandName"];
        $data_array =  array("brandName" => $brandName);
        $make_call = callAPI('POST', $URL_SERVICIO . '/api/brand', json_encode($data_array)); 
        $response = json_decode($make_call, true); 
    }
	
	
?>

<!doctype html>
<html>
    
    <head>
    
        <meta charset="utf-8">
        <title>REGISTRO DE MARCAS</title>
        
    </head>
    
    <body>
        <link rel="stylesheet" href="loginstyle.css">
        <script src="js/bootstrap.min.js" ></script>
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
        <h1 align="center"><img src="img/auto.png"></h1>
        <h2 align="center">REGISTRO DE MARCAS</h2>
        
        <form id="signupform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
							
							<div id="signupalert" style="display:none" class="alert alert-danger">
								<p>Error:</p>
								<span></span>
							</div>
							
							
							
							
							
							<div class="form-group">
								<label for="brandName" class="col-md-3 control-label">Marca: </label>
								<div class="col-md-9">
									<input type="text" class="brandName" name="brandName" placeholder="Marca" required>
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