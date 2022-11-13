<?php
session_start();
require 'funcs/conexion.php';
require 'funcs/funcs.php';
require 'funcs/constantes.php';

$countOrders = 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>ORDEN DE TRABAJO</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="loginstyle.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="center-block" style="margin-top: 20px;">
                <img src="img/auto.png" height="120px;">
                <h1>BIENVENIDO ASESOR</h1>
            </div>
            <div class="col-md-8">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>Vehiculo</td>
                            <td>Lugar</td>
                            <td>Fecha</td>
                            <td>Hora</td>
                            <td>Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $clientId = $_SESSION['userId'];
                        $make_callo = callAPI('GET', $URL_SERVICIO . '/api/cita', false);
                        $response = json_decode($make_callo, true);
                        
                        ?>
                        <?php foreach ($response['items'] as $opciones): 
                        ?>
                            <tr>
                                <td><?php echo $opciones['appointmentDate']?></td>
                                <td><?php echo $opciones['appointmentTime']?></td>
                                <td><?php echo $opciones['locationName']?></td>
                                <td>
                                    <button type="button" class="btn btn-warning">Orden de Trabajo</button>
                                    
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                    <p>Revisa tus ordenes de trabajo. <b>¡Tienes <?php echo $countOrders ?> ordenes pendientes!</b></p>
                </table>
            </div>
        </div>
    </div><div class="col-md-9">
                                <button id="btn-signup" type="submit" class="btn btn-info"><a href='welcome.php'> Regresar al menu </a></button>
								</div>


    <script src="js/bootstrap.min.js"></script>
</body>

</html>