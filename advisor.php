<?php
	session_start();
	require 'funcs/conexion.php';
	require 'funcs/funcs.php';
	require 'funcs/constantes.php';
	
	
	$errors = array();
	
	if (!empty($_POST))
    {   //Ayuda a limpiar la cadena que se recibe en la cadena POST para evitar SQL injection
        $advisorLocation = $_POST["advisorLocation"];
        $userEmail = $_POST["userEmail"];
        $userPass = $_POST["userPass"];
        $advisorName = $_POST["advisorName"];
        $advisorLastName = $_POST["advisorLastName"];
        $advisorDpi = $_POST["advisorDpi"];
        $advisorPhoneNumber = $_POST["advisorPhoneNumber"];
        $advisorAddress = $_POST["advisorAddress"];
        $advisorHiringDate = $_POST["advisorHiringDate"];
         
        
        if (isNull($advisorLocation,$userEmail,$userPass,$advisorName,$advisorLastName,$advisorDpi,$advisorPhoneNumber,$advisorAddress,$advisorHiringDate))
        {
            $errors [] = "Debe llenar todos los campos";
        }

        if (!isEmail($userEmail)) // se pone el signo de negación ya que en la case funcs dice que si es un email validoo regrese true y necesitamos saber si es falso
        {
            $errors [] = "Correo inválido";
        }


        //no hubo error
        if (count($errors) == 0){

            $data_array =  array("advisorLocation" => $advisorLocation, "userEmail" => $userEmail, "userPass" => $userPass, "advisorName" => $advisorName, "advisorLastName" => $advisorLastName, "advisorDpi" => $advisorDpi, "advisorPhoneNumber" => $advisorPhoneNumber,"advisorAddress" => $advisorAddress,"advisorHiringDate" => $advisorHiringDate); 
        
            $make_call = callAPI('POST', $URL_SERVICIO . '/api/advisor', json_encode($data_array)); 
            $response = json_decode($make_call, true);

        }
    }
        
    

	
?>
<!doctype html>
<html>
    
    <head>
    
        <meta charset="utf-8">
        <title>Registro</title>
        
    </head>
    
    <body>
        <link rel="stylesheet" href="loginstyle.css">
        <script src="js/bootstrap.min.js" ></script>
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
        <h1 align="center"><img src="img/auto.png"></h1>
        <h2 align="center">REGISTRA ASESOR</h2>
        
        
        <form id="signupform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
							
							<div id="signupalert" style="display:none" class="alert alert-danger">
								<p>Error:</p>
								<span></span>
							</div>
							
                            <div class="form-group">
								<label class="col-md-3 control-label">Locación: </label>
								<div class="col-md-9">
								<select name="advisorLocation">
                            	<option value="" selected></option>
                                <?php
                                 $make_callo = callAPI('GET', $URL_SERVICIO . '/api/location', false);
                                 $response = json_decode($make_callo, true);
                                ?>

                                <?php foreach ($response['items'] as $opciones): ?>
									
									<option value ="<?php echo $opciones['locationId']?>"><?php echo $opciones['locationName']?></option>


									<?php endforeach ?>

									
										</select>
                                
                                </div>

							<div class="form-group">
								<label for="userEmail" class="col-md-3 control-label">Email</label>
								<div class="col-md-9">
									<input type="email" class="form-control" name="userEmail" placeholder="Email"  required>
								</div>
							</div>
							
							
							<div class="form-group">
								<label for="userPass" class="col-md-3 control-label">Password</label>
								<div class="col-md-9">
									<input type="password" class="form-control" name="userPass" placeholder="Password" required>
								</div>
							</div>
							
							<div class="form-group">
								<label for="advisorName" class="col-md-3 control-label"> Nombre</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="advisorName" placeholder="Nombre" required>
								</div>
							</div>

							<div class="form-group">
								<label for="advisorLastName" class="col-md-3 control-label"> Apellido </label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="advisorLastName" placeholder="Apellido" required>
								</div>

								</div><div class="form-group">
								<label for="advisorDpi" class="col-md-3 control-label"> Dpi </label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="advisorDpi" placeholder="Dpi" required>
								</div>
							</div>
							</div>
							
							</div><div class="form-group">
								<label for="advisorPhoneNumber" class="col-md-3 control-label"> Numero de Telefono </label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="advisorPhoneNumber" placeholder="Numero de Telefono" required>
								</div>
							</div>

							<div class="form-group">
								<label for="advisorAddress" class="col-md-3 control-label"> Direccion </label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="advisorAddress" placeholder="Direccion" required>
								</div>
							</div>

							<div class="form-group">
								<label for="advisorHiringDate" class="col-md-3 control-label"> Fecha de Contratación </label>
								<div class="col-md-9">
									<input type="date" class="form-control" name="advisorHiringDate" placeholder="Fecha de Contratación" required>
								</div>
							</div>

							<div class="form-group">                                      
								<div class="col-md-offset-3 col-md-9">
									<button id="btn-signup" type="submit" class="btn btn-info"><i class="icon-hand-right"></i>Registrar</button> 
								</div>
							</div>
						</form>
						<?php echo resultBlock($errors); ?>

						<div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
										Regresa al Login <a href="loginformulario.php">Login aquí</a>
									</div>
                        
        
        </form>

        <?php echo resultBlock($errors); ?>
    
    </body>
    
</html>