<?php
	
	require 'funcs/conexion.php';
	require 'funcs/funcs.php';
	require 'funcs/constantes.php';
	
	
	$errors = array();
	
	if (!empty($_POST))
    {   //Ayuda a limpiar la cadena que se recibe en la cadena POST para evitar SQL injection
        $userEmail = $_POST["userEmail"];
        $userPass = $_POST["userPass"];
        $clientName = $_POST["clientName"];
        $clientLastName = $_POST["clientLastName"];
        $clientDpi = $_POST["clientDpi"];
        $clientPhoneNumber = $_POST["clientPhoneNumber"];
         
        
        if (isNull($userEmail,$userPass,$clientName,$clientLastName,$clientDpi,$clientPhoneNumber))
        {
            $errors [] = "Debe llenar todos los campos";
        }

        if (!isEmail($userEmail)) // se pone el signo de negación ya que en la case funcs dice que si es un email validoo regrese true y necesitamos saber si es falso
        {
            $errors [] = "Correo inválido";
        }


        //no hubo error
        if (count($errors) == 0){

            $data_array =  array("userEmail" => $userEmail, "userPass" => $userPass, "clientName" => $clientName, "clientLastName" => $clientLastName, "clientDpi" => $clientDpi, "clientPhoneNumber" => $clientPhoneNumber); 
        
            $make_call = callAPI('POST', $URL_SERVICIO . '/api/user/registerUser', json_encode($data_array)); 
            $response = json_decode($make_call, true);

            if ($response["code"] == "1") {
                header("location: loginformulario.php");
    
            } else {
                // redirigir a la página de que no pudo iniciar sesión.
                header("location: notregister.php");
    
            }
                    
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
        <h2 align="center">REGISTRATE</h2>
        
        
        <form id="signupform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
							
							<div id="signupalert" style="display:none" class="alert alert-danger">
								<p>Error:</p>
								<span></span>
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
								<label for="clientName" class="col-md-3 control-label"> Nombre</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="clientName" placeholder="Nombre" required>
								</div>
							</div>

							<div class="form-group">
								<label for="clientLastName" class="col-md-3 control-label"> Apellido </label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="clientLastName" placeholder="Apellido" required>
								</div>

								</div><div class="form-group">
								<label for="clientDpi" class="col-md-3 control-label"> Dpi </label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="clientDpi" placeholder="Dpi" required>
								</div>
							</div>
							</div>
							
							</div><div class="form-group">
								<label for="clientPhoneNumber" class="col-md-3 control-label"> Numero de Telefono </label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="clientPhoneNumber" placeholder="Numero de Telefono" required>
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