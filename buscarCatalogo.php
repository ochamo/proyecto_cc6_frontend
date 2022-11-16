<?php
session_start();
require 'funcs/conexion.php';
require 'funcs/funcs.php';
require 'funcs/constantes.php';

$countOrders = 0;

if (!empty($_GET)) {
    $orderId = $_GET['orderId'];
    echo 'orderId = ' . $orderId;
} else {
    header("Location: welcome.php");
}

?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <title>Buscar Catalogo</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="loginstyle.css">
    </head>
    <body style="max-width:70em !important;">
    <div class="container">
        <div class="row">
            <div class="center-block" style="margin-top: 20px;">
                <img src="img/auto.png" height="120px;"/>
                <h1>BIENVENIDO ASESOR</h1>
                <H3>Ordenes de trabajo</H3>
            </div>
            <div class="col-md-8">
                <button type="button" class="btn btn-info">Detalle</button>
                <button type="button" class="btn btn-info">Actualizar</button>
            </div>
            <div class="col-md-8">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Estatus</td>
                            <td>Modelo</td>
                            <td>Placa vehiculo</td>
                            <td>Total</td>
                            <td>Opciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $userId = $_SESSION['userId'];
                            $make_call = callAPI('GET', $URL_SERVICIO . '/api/workorder/advisor/orders/' . $userId, false);
                            $response = json_decode($make_call, true);
                        ?>
                            <?php foreach ($response['items'] as $opciones): ?>
                            <tr>
                            <td><?php echo $opciones['orderId'] ?></td>
                            <td><?php echo $opciones['statusModel']['wokrOrderStatusDescription'] ?></td>
                            <td><?php echo $opciones['clientVehicleModel']['vehicleModel']['vehicleLineModel']['lineName'] . ' ' . $opciones['clientVehicleModel']['vehicleModel']['modelYear']?></td>
                            <td><?php echo $opciones['vehiclePlate']?></td>
                            <td><?php if ($opciones['total'] == null) echo 'Q0.00'; else echo 'Q' . $opciones['total'];?></td>
                            <td><button onclick="runForm(<?php echo $opciones['orderId'] ?>)" id="btn-signup" type="submit" class="btn btn-info">Comprar piezas</button></td>
                            </tr>
                            <?php endforeach?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function runForm(orderId) {
            window.location.href = "buscarCatalogo.php?orderId=" +orderId;
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>