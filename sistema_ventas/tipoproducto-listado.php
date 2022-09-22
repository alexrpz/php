<?php
include_once("config.php");
include_once("header.php"); 
include_once "entidades/tipoproducto.php";

$tipoProducto= new TipoProducto();
$aTipoProductos= $tipoProducto->obtenerTodos();

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Listado de tipo de productos</h1>
        </div>
    </div>
    
    <table class="table table:hover">
        <div class="py-3">
            <a href="tipoproducto-formulario.php" class="btn btn-primary">Nuevo</a>
        </div>
        <tr class="border">
            <th>Nombre:</th>
            <th>Acciones:</th>
        </tr>
        <?php foreach($aTipoProductos as $tipoProducto): ?>
            <tr>
                <td><?php echo $tipoProducto->nombre; ?></td>
                <td><a href="tipoproducto-formulario.php?id=<?php echo $tipoProducto->idtipoproducto; ?>">Editar</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>