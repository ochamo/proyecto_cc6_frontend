<?php
	session_start();
	require 'funcs/conexion.php';
    require 'funcs/funcs.php';
    require 'funcs/constantes.php';

	
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    </head>
    <body>
        <div class ="container mt-5">
            <div class="row">
            
            <form action ="<?php $_SERVER['PHP_SELF']; ?>"method ="POST">
        
                <div class = "col-md-8">
                    <table class ="table">
                        <thead class ="table-success table-striped">
                            <tr>
                            <td>Vehiculo</td>
                            <td>Dia de la Cita</td>
                            <td>Hora de la Cita</td>
                            <td>Locación</td>
                                
                            </tr>                        
                        </thead>

                        <tbody>
                            <?php
                                
                                $userId = $_SESSION['userId'];
                                $make_callo = callAPI('GET', $URL_SERVICIO . '/api/cita/' . $userId, false);
                                $response = json_decode($make_callo, true);
                            ?>
                             <?php foreach ($response['items'] as $opciones): ?>
                                <tr>
                                <td><?php echo $opciones['vehiclePlate']?></td>
                                <td><?php echo $opciones['appointmentDate']?></td>
                                <td><?php echo $opciones['appointmentTime']?></td>
                                <td><?php echo $opciones['locationName']?></td>
                                </tr>
                            <?php
                               endforeach  
                            ?>    
                            
                        </tbody>
                    </table>


                </div>

            </div>
            
        </div>

                                         
								<div class="col-md-9">
                                <button id="btn-signup" type="submit" class="btn btn-info"><a href='welcome.php'> Regresar al menu </a></button>
								</div>
							

        
    </body>
</html>