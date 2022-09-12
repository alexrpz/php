<?php
include_once("config.php");
include_once("header.php"); 
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Listado de ventas</h1>
        </div>
    </div>
    <table class="table table:hover">
        <div class="py-3">
            <a href="venta-formulario.php" class="btn btn-primary">Nuevo</a>
        </div>
        <tr class="border">
            <th>Fecha:</th>
            <th>Cantidad:</th>
            <th>Producto:</th>
            <th>Cliente:</th>
            <th>Total:</th>
            <th>Acciones:</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
</div>