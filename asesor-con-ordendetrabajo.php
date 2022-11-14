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

<body style="max-width:70em !important;">
    <div class="container">
        <div class="row">
            <div class="center-block" style="margin-top: 20px;">
                <img src="img/auto.png" height="120px;">
                <h1>BIENVENIDO ASESOR</h1>
                <H3>Revise su orden de trabajo y actualicela.</H3>
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
                            <td>Pieza</td>
                            <td>Diagnostico</td>
                            <td>Progreso</td>
                            <td>Estado</td>
                            <td>Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            
                            <td>1</td>
                            <td>Bumper</td>
                            <td>Arruinado</td>
                            <td>Pendiente de Compra</td>
                            <td>Pendiente</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">Comprar</button>
                            </td>
                        </tr>
                        <tr>
                            
                            <td>2</td>
                            <td>Retrovisor derecho</td>
                            <td>Arruinado</td>
                            <td>Comprado</td>
                            <td>Reparado</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Compras</h4>
                </div>
                <div class="modal-body">
                <p>¡Bienvenido a la tienda de Piezas!</p>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                </div>
            </div>
            
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>