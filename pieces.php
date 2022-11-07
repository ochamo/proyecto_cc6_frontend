<?php
	session_start();
	require 'funcs/conexion.php';
	require 'funcs/funcs.php';
    require 'funcs/constantes.php';
	
	
	if (!empty($_POST))
    {   
        $clientId = $_SESSION['userId'];
        $pieceTypeId = $_POST["pieceTypeId"];
        $pieceName = $_POST["pieceName"];
        
        $data_array =  array("clientId" => intval($clientId),"pieceTypeId" => $pieceTypeId,"pieceName" => $pieceName);
        $make_call = callAPI('POST', $URL_SERVICIO . '/api/piecetype', json_encode($data_array)); 
        $response = json_decode($make_call, true); 
    
        $clientId = $_SESSION['userId'];
        $pieceStatusDescription = $_POST["pieceStatusDescription"];
        $pieceStatusId = $_POST["pieceStatusId"];
       
        
        $data_array =  array("clientId" => intval($clientId),"pieceTypeId" => $pieceTypeId,"pieceName" => $pieceName);
        $make_call = callAPI('POST', $URL_SERVICIO . '/api/piecetype', json_encode($data_array)); 
        $response = json_decode($make_call, true); 

        $data_arrays =  array("clientId" => intval($clientId),"pieceStatusDescription" => $pieceStatusDescription,"pieceStatusId" => $pieceStatusId);
        $make_calls = callAPI('POST', $URL_SERVICIO . '/api/piecestatus', json_encode($data_arrays)); 
        $responses = json_decode($make_calls, true); 

        
    
    
    }
	
	
?>

<!doctype html>
<html>
    
    <head>
    
        <meta charset="utf-8">
        <title>ORDEN DE TRABAJO</title>
        
    </head>
    
    <body>
        <link rel="stylesheet" href="loginstyle.css">
        <script src="js/bootstrap.min.js" ></script>
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
        <h1 align="center"><img src="img/auto.png"></h1>
        <h2 align="center">ORDEN DE TRABAJO </h2>
        
        <form id="signupform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
							
							<div id="signupalert" style="display:none" class="alert alert-danger">
								<p>Error:</p>
								<span></span>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label">Tipo de Pieza: </label>
								<div class="col-md-9">
								<select name="pieceTypeId">
                            	<option value="" selected></option>
                                <?php
                                 $make_callo = callAPI('GET', $URL_SERVICIO . '/api/piecetype', false);
                                 $response = json_decode($make_callo, true);

                                 
                                ?>

                                <?php foreach ($response['items'] as $opciones): ?>
									
									<option value ="<?php echo $opciones['pieceTypeId']?>"><?php echo $opciones['pieceName']?></option>
                                    
                                    <?php echo var_dump($opciones); ?>
									<?php endforeach ?>

									
								</select>

                                </div>
                            </div>

                            <div class="form-group">
								<label class="col-md-3 control-label">Status de Pieza: </label>
								<div class="col-md-9">
								<select name="pieceStatusId">
                            	<option value="" selected></option>
                                <?php
                                 $make_callo = callAPI('GET', $URL_SERVICIO . '/api/piecestatus', false);
                                 $response = json_decode($make_callo, true);

                                 
                                ?>

                                <?php foreach ($response['items'] as $opciones): ?>
									
									<option value ="<?php echo $opciones['pieceStatusId']?>"><?php echo $opciones['pieceStatusDescription']?></option>
                                    
                                    
									<?php endforeach ?>

									
								</select>

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