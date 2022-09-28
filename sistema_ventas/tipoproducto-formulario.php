<?php

include_once("config.php");
include_once "entidades/tipoproducto.php";
include_once "entidades/producto.php";
$pg = "Edición de tipo de productos";

$tipoProducto = new TipoProducto();
$tipoProducto->cargarFormulario($_REQUEST);

if ($_POST) {
    if (isset($_POST["btnGuardar"])) {
        if (isset($_GET["id"]) && $_GET["id"] > 0) {
            //Actualizo un  registro existente
            $tipoProducto->actualizar();
            $msg["texto"] = "Actualizado correctamente";
            $msg["codigo"] = "alert-success";
        } else {
            //Es nuevo
            $tipoProducto->insertar();
            $msg["texto"] = "Guardado correctamente";
            $msg["codigo"] = "alert-success";
        }
    } else if (isset($_POST["btnBorrar"])) {
        $producto = new Productos();
        if ($producto->obtenerPorTipo($tipoProducto->idtipoproducto)) {
            $msg["texto"] = "No se puede eliminar un tipo de producto con productos asociados.";
            $msg["codigo"] = "alert-danger";
        } else {
            $tipoProducto->eliminar();
            header("Location: tipoproducto-listado.php");
        }
    }
}
if (isset($_GET["id"]) && $_GET["id"] > 0) {
    $tipoProducto->obtenerPorId();
}

include_once("header.php");
?>
<div class="container-fluid">
    <div class="col-12">
        <h1>Tipo de productos</h1>
    </div>
    <div class="row">
        <form action="" method="POST">
            <div class="col-12 py-3">
                <a href="tipoproducto-listado.php" class="btn btn-primary">Listado</a>
                <a href="producto-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
                <button type="submit" name="btnGuardar" id="btnGuardar" class="btn btn-success">Guardar</button>
                <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
            </div>
            <div class="col-12">
                <label for="txtNombre">Nombre:</label>
                <input type="text" name="txtNombre" id="txtNombre" class="form-control" value="<?php echo $tipoProducto->nombre; ?>">
            </div>
        </form>
    </div>
</div>