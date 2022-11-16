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
    <title>ORDEN DE TRABAJO</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="loginstyle.css">
</head>

<body style="max-width:70em !important;">
    <div class="container">
        <div class="row">
            <div class="center-block" style="margin-top: 20px;">
                <img src="img/auto.png" height="120px;" />
                <h1>BIENVENIDO ASESOR</h1>
                <H3>Ordenes de trabajo</H3>
            </div>
            <div class="col-md-8">
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
                        <?php foreach ($response['items'] as $opciones) : ?>
                            <tr>
                                <td><?php echo $opciones['orderId'] ?></td>
                                <td><?php echo $opciones['statusModel']['wokrOrderStatusDescription'] ?></td>
                                <td><?php echo $opciones['clientVehicleModel']['vehicleModel']['vehicleLineModel']['lineName'] . ' ' . $opciones['clientVehicleModel']['vehicleModel']['modelYear'] ?></td>
                                <td><?php echo $opciones['vehiclePlate'] ?></td>
                                <td><?php if ($opciones['total'] == null) echo 'Q0.00';
                                    else echo 'Q' . $opciones['total']; ?></td>
                                <td>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <button onclick="runForm(<?php echo $opciones['orderId'] ?>)" id="btn-signup" type="submit" class="btn btn-info">Comprar piezas</button>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <button data-toggle="modal" data-target="#orderDetails" type="button" class="btn btn-info mt-3" onclick="getOrderDetails(<?php echo $opciones['orderId'] ?>)">Detalles</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="orderDetails" tabindex="-1" role="dialog" aria-labelledby="orderDetailsLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title p-0" id="orderDetailsLabel">Orden de trabajo</h3>
                    <button type="button" class="close p-0" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body row mt-0">
                    <div class="col-12 col-md-7" id="workerorder-detail"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        let inter;

        function runForm(orderId) {
            window.location.href = "buscarCatalogo.php?orderId=" + orderId;
        }

        function getOrderDetails(id) {
            const workerOrderDetail = document.getElementById('workerorder-detail');
            let HTMLData = 'Cargando';

            inter = setInterval(() => {
                if (HTMLData == 'Cargando...') {
                    HTMLData = 'Cargando';
                } else {
                    HTMLData += '.';
                }
                workerOrderDetail.innerHTML = HTMLData;
            }, 800);

            const options = {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    url: '/api/workorder/detail/'+ id,
                    method: 'GET'
                })
            };
            fetch('proxy.php', options)
                .then(res => res.json())
                .then(({
                    items
                }) => {
                    const item = items[0]; // always have only one element so.
                    HTMLData = `
                <h5>Estatus: </h5> <h4>${item.statusModel.wokrOrderStatusDescription}</h4>
                <h5>Placa: </h5> <h4>${item.vehiclePlate}</h4>
                <h5>Vehiculo: </h5> <h4>${(item.clientVehicleModel.vehicleModel.vehicleLineModel.vehicleBrand || 'NO DISPONIBLE -- ')}
                                        ${item.clientVehicleModel.vehicleModel.vehicleLineModel.lineName}
                                        ${item.clientVehicleModel.vehicleModel.modelYear}</h4>
                <h5>Dueño: </h5> <h4>${(item.advisorModel.advisorName || 'NO DISPONIBLE -- ')} ${(item.advisorModel.advisorLastName || 'NO DISPONIBLE -- ')} 
                        (${(item.advisorModel.advisorDpi || 'NO DISPONIBLE -- ')})</h4>
                <h5>Telefono dueño: </h5> <h4>${(item.advisorModel.advisorPhoneNumber || 'NO DISPONIBLE ')}</h4>
                <h5>Estatus: </h5> <h4>${(item.total|| 'NO DISPONIBLE')}</h4>
                `;
                    workerOrderDetail.innerHTML = HTMLData;
                    clearInterval(inter);
                }).catch(err => {
                    HTMLData = 'Ocurrio un error al cargar los datos ☹️🥺';
                    workerOrderDetail.innerHTML = HTMLData + " Error: " + err;
                    clearInterval(inter);
                });
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>