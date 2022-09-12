<?php
include_once("config.php");
include_once("header.php"); 
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Listado de productos</h1>
        </div>
    </div>
    <table class="table table:hover">
        <div class="py-3">
            <a href="producto-formulario.php" class="btn btn-primary">Nuevo</a>
        </div>
        <tr class="border">
            <th>Foto:</th>
            <th>Nombre:</th>
            <th>Cantidad:</th>
            <th>Precio:</th>
            <th>Acciones:</th>
        </tr>
    </table>
</div>