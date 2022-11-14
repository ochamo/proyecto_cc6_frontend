<?php
session_start();
require 'funcs/conexion.php';
require 'funcs/funcs.php';
require 'funcs/constantes.php';

$countOrders = 0;

if(!empty($_POST)) {

    $appointmentId = $_POST["id"];
    $data_array = array("id" => intval($appointmentId));
    echo "<script>console.log(". $appointmentId .")</script>";
    echo "<script>console.log(". $data_array['id'] .")</script>";
    $make_call = callAPI("GET", $URL_SERVICIO . "/api/workorder/create/" . $appointmentId, false);
    $response = json_decode($make_call, true);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>DETALLE DE TRABAJO</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="loginstyle.css">
</head>

<body style="max-width: 70em !important;">
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
                        $make_callo = callAPI('GET', $URL_SERVICIO . '/api/cita/asesor/' . $clientId, false);
                        $response = json_decode($make_callo, true);
                        $countOrders = count($response['items']);
                        ?>
                        <?php foreach ($response['items'] as $opciones) :
                            $advisorModel = $opciones['advisorModel'];
                            $locationModel = $opciones['locationModel']; ?>
                            <tr>

                                <td><?php echo $opciones['appointmentId'] ?></td>
                                <td><?php echo $advisorModel['advisorName'] . " " . $advisorModel['advisorLastName'] ?></td>
                                <td><?php echo $locationModel['locationName'] ?></td>
                                <td><?php echo $opciones['appointmentDate'] ?></td>
                                <td><?php echo $opciones['appointmentTime'] ?></td>
                                <td>
                                    <form id="registerWorkOrder" role="form"  action="<?php $_SERVER['PHP_SELF'] ?>" method="GET" autocomplete="off">
                                        <input name="id" id="id" value="<?php echo $opciones['appointmentId'] ?>" hidden />
                                        <button type="submit" class="btn btn-warning">Orden de Trabajo</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                    <p>Revisa tu detalle de trabajo. <b>¡Tienes <?php echo $countOrders ?> Detalles pendientes!</b></p>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <button id="btn-signup" type="submit" class="btn btn-info"><a href='welcome.php'> Regresar al menu </a></button>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>