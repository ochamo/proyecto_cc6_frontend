<?php
    
    require 'funcs/conexion.php';
    require 'funcs/funcs.php';
    require 'funcs/constantes.php';

    $errors = array();

    if (!empty($_POST))
    {   //Ayuda a limpiar la cadena que se recibe en la cadena POST para evitar SQL injection
        $userEmail = $_POST["userEmail"];
        $userPassword = $_POST["userPassword"];

        $data_array =  array("userEmail" => $userEmail, "userPassword" => $userPassword); 
    
        $make_call = callAPI('POST', $URL_SERVICIO . '/login', json_encode($data_array)); 
        $response = json_decode($make_call, true); 
        echo json_encode($response, JSON_PRETTY_PRINT);
        if ($response["code"] == "1") {
            session_start();
            $_SESSION['token'] = $response["token"];
			$_SESSION['role'] = $response["role"];
            $_SESSION['userId'] =  $response["userId"];
            header("location: welcome.php");

        } else {
            // redirigir a la página de que no pudo iniciar sesión.
            header("location: notlogin.php");

        }
        
        if (isNullLogin($userEmail,$userPassword))
        {
            $errors [] = "Debe llenar todos los campos";
        }

            
            

    }
?>

<!doctype html>
<html>
    
    <head>
    
        <meta charset="utf-8">
        <title>Login</title>
        
    </head>
    
    <body>
        <link rel="stylesheet" href="loginstyle.css"> 
        <script src="js/bootstrap.min.js" ></script>
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
        <h1 align="center"><img src="img/auto.png"></h1>
        <h2 align="center">LOGIN</h2>
        
        <form id="signupform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
        <div id="signupalert" style="display:none" class="alert alert-danger">
								<p>Error:</p>
								<span></span>
							</div>
							
							
							
							<div class="form-group">
                            
								<label for="userEmail" class="col-md-3 control-label">Usuario</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="userEmail" placeholder="Usuario" required >
								</div>
							</div>
							
							<div class="form-group">
                                
								<label for="userPassword" class="col-md-3 control-label">Password</label>
								<div class="col-md-9">
									<input type="password" class="form-control" name="userPassword" placeholder="Password" required>
								</div>
							</div>
							
					
              
            <p>
            <div class="button">
									<button id="btn-login" type="submit" class="btn btn-success">Iniciar Sesi&oacute;n</a>
			</div>
            </p>
            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
										No tiene una cuenta! <a href="registroformulario.php">Registrate aquí</a>
									</div>
        </form>

        <?php echo resultBlock($errors); ?>
        
        
    
    </body>


    
</html>