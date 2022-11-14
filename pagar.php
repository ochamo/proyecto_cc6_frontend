<?php
	session_start();
	require 'funcs/conexion.php';
	require 'funcs/funcs.php';
    require 'funcs/constantes.php';
	

	
	if (!empty($_POST))
    {   
		
        $cardNumber = $_POST["cardNumber"];
		$cardName = $_POST["cardName"];
		$cardDate = $_POST["cardDate"];
		$cvv = $_POST["cvv"];
		$nit = $_POST["nit"];
		$orderId = $_GET["orderId"];
		echo "console.log(" . $orderId . ")";
        $data_array =  array("cardNumber" => $cardNumber, "cardName" => $cardName, "cardDate" => $cardDate, "cvv" => $cvv, "nit" => $nit);
        $make_call = callAPI('POST', $URL_SERVICIO . '/api/payment', json_encode($data_array)); 
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
								<label for="cardNumber" class="col-md-3 control-label">Numero de Tarjeta: </label>
								<div class="col-md-9">
									<input type="text" class="cardNumber" name="cardNumber" placeholder="Numero de Tarjeta" required>
								</div>
							</div>

							<div class="form-group">
								<label for="cardName" class="col-md-3 control-label">Nombre de la Tarjeta: </label>
								<div class="col-md-9">
									<input type="text" class="cardName" name="cardName" placeholder="Nombre de la Tarjeta" required>
								</div>
							</div>

							<div class="form-group">
								<label for="cardDate" class="col-md-3 control-label">Fecha de Vencimiento: </label>
								<div class="col-md-9">
									<input type="date" class="cardDate" name="cardDate" placeholder="Fecha de Vencimiento" required>
								</div>
							</div>

							<div class="form-group">
								<label for="cvv" class="col-md-3 control-label">CVV: </label>
								<div class="col-md-9">
									<input type="password" class="cvv" name="cvv" placeholder="CVV" required>
								</div>
							</div>

							<div class="form-group">
								<label for="nit" class="col-md-3 control-label">NIT: </label>
								<div class="col-md-9">
									<input type="text" class="nit" name="nit" placeholder="NIT" required>
								</div>
							</div>

                            <div class="form-group">                                      
								<div class="col-md-offset-3 col-md-9">
									<button id="btn-signup" type="submit" class="btn btn-info"><i class="icon-hand-right"></i>Pagar</button> 
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