<?php
	session_start();
	require 'funcs/conexion.php';
    require 'funcs/funcs.php';
    require 'funcs/constantes.php';
    $countOrders = 0;
	
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
                            <td>#</td>
                            <td>Cliente</td>
                            <td>Lugar</td>
                            <td>Fecha</td>
                            <td>Hora</td>
                            <td>Acciones</td>
                                
                            </tr>                        
                        </thead>

                        <tbody>
                        <?php
                        $clientId = $_SESSION['userId'];
                        $make_callo = callAPI('GET', $URL_SERVICIO . '/api/cita/asesor/'.$clientId, false);
                        $response = json_decode($make_callo, true);
                        $countOrders = count($response['items']);
                        ?>
                        <?php foreach ($response['items'] as $opciones): 
                            $advisorModel = $opciones['advisorModel'];
                            $locationModel = $opciones['locationModel'];?>
                            <tr>
                                
                                <td><?php echo $opciones['appointmentId'] ?></td>
                                <td><?php echo $advisorModel['advisorName'] . " " . $advisorModel['advisorLastName'] ?></td>
                                <td><?php echo $locationModel['locationName']?></td>
                                <td><?php echo $opciones['appointmentDate']?></td>
                                <td><?php echo $opciones['appointmentTime']?></td>
                                <td>
                                    <button type="button" class="btn btn-warning">Orden de Trabajo</button>
                                    <button type="button" class="btn btn-danger">Finalizar</button>
                                </td>
                            </tr>
                        <?php endforeach ?>    
                            
                        </tbody>
                        <p>Revisa tus ordenes de trabajo. <b>¡Tienes <?php echo $countOrders ?> ordenes pendientes!</b></p>
                    </table>


                </div>

            </div>
            
        </div>

                                         
								<div class="col-md-9">
                                <button id="btn-signup" type="submit" class="btn btn-info"><a href='welcome.php'> Regresar al menu </a></button>
								</div>
							

        
    </body>
</html>