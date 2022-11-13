<?php
session_start();
require 'funcs/conexion.php';
require 'funcs/funcs.php';
require 'funcs/constantes.php';



?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>VEHICULOS</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="loginstyle.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="center-block" style="margin-top: 20px;">
                <img src="img/auto.png" height="120px;">
                <h1> VEHICULOS </h1>
            </div>
            <div class="col-md-8">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            
                            <td>Modelo</td>
                            <td>Placa</td>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $clientId = $_SESSION['userId'];
                        $make_call = callAPI('GET', $URL_SERVICIO . '/api/clientvehicle/' . $clientId, false); 
                        $response = json_decode($make_call, true); 
                        ?>
                        <?php foreach ($response['items'] as $opciones): 
                        $vehicleLineModel = $opciones['vehicleLineModel'];
                        $lineName = $opciones['lineName'];
                        $modelYear= $opciones['modelYear'];
                        ?>
                            <tr>
                                
                                <td><?php echo $opciones['vehicleLineModel']['lineName'] . " ". $opciones['modelYear'] ?></td>
                                <td><?php echo $opciones['vehiclePlate']?></td>
                                
                                <td>
                                    <button type="button" class="btn btn-warning">Orden de Trabajo</button>
                                    <button type="button" class="btn btn-danger">Finalizar</button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-9">
                                <button id="btn-signup" type="submit" class="btn btn-info"><a href='welcome.php'> Regresar al menu </a></button>
								</div>
                                
    <script src="js/bootstrap.min.js"></script>
</body>

</html>