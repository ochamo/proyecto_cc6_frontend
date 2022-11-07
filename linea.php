<?php
	session_start();
	require 'funcs/conexion.php';
	require 'funcs/funcs.php';
    require 'funcs/constantes.php';
	
	
	if (!empty($_POST))
    {   
        $brandId = $_POST["Line"];
        $lineName = $_POST["lineName"];
        $data_array =  array("brandId" => intval($brandId),"lineName" => $lineName);
        $make_call = callAPI('POST', $URL_SERVICIO . '/api/vehicleline', json_encode($data_array)); 
        $response = json_decode($make_call, true); 
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
        <h2 align="center">REGISTRO DE LINEA</h2>
        
        <form id="signupform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
							
							<div id="signupalert" style="display:none" class="alert alert-danger">
								<p>Error:</p>
								<span></span>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label">Marca: </label>
								<div class="col-md-9">
								<select name="Line">
                            	<option value="" selected></option>
                                <?php
                                 $make_callo = callAPI('GET', $URL_SERVICIO . '/api/brand', false);
                                 $response = json_decode($make_callo, true);
                                ?>

                                <?php foreach ($response['items'] as $opciones): ?>
									
									<option value ="<?php echo $opciones['brandId']?>"><?php echo $opciones['brandName']?></option>


									<?php endforeach ?>

									
								</select>
                                </div>
                            
                                <div class="form-group">
								<label for="lineName" class="col-md-3 control-label">Linea: </label>
								<div class="col-md-9">
									<input type="text" class="lineName" name="lineName" placeholder="Linea" required>
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