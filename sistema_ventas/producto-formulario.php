<?php

include_once "config.php";
include_once "entidades/producto.php";
include_once "entidades/tipoproducto.php";

$pg = "Edición de producto";

$producto = new Productos();
$producto->cargarFormulario($_REQUEST);

if ($_POST) {
    if (isset($_POST["btnGuardar"])) {
        if (isset($_GET["id"]) && $_GET["id"] > 0) {
            //Almacenamos la imagen en el servidor
            if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) {
                $nombreAleatorio = date("Ymdhmsi");
                $archivo_tmp = $_FILES["archivo"]["tmp_name"];
                $nombreArchivo = $_FILES["archivo"]["name"];
                $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
                $nombreImagen = "$nombreAleatorio.$extension";

                if($extension =="png" || $extension =="jpg" || $extension == "jpeg"){
                    //elimino la imagen anterior
                    $productoAnt = new Productos();
                    $productoAnt->idproducto = $_GET["id"];
                    $productoAnt->obtenerPorId();
                    if(file_exists("files/$productoAnt->imagen")){
                        unlink("files/$productoAnt->imagen");
                    }
                    //subo la imagen nueva
                    move_uploaded_file($archivoTmp, "files/$nombreImagen");
                }
                $producto->imagen = $nombreImagen;
            }else{
                $productoAnt = new Productos();
                $productoAnt->idproducto = $_GET["id"];
                $productoAnt->obtenerPorId();
                $imagenAnterior = $productoAnt->imagen;
            }

            $producto->actualizar();
                //Si es una actualizacion y se sube una imagen, elimina la anterior
        } else {  
            if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) {
                $nombreAleatorio = date("Ymdhmsi");
                $archivo_tmp = $_FILES["archivo"]["tmp_name"];
                $nombreArchivo = $_FILES["archivo"]["name"];
                $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
                $nombreImagen = "$nombreAleatorio.$extension";

                if($extension == "png" || $extension == "jpg" || $extension == "jpeg"){
                    move_uploaded_file($archivo_tmp, "files/$nombreImagen");
                }
                $producto->imagen =$nombreImagen;
                }
            
                //Es nuevo
                $producto->insertar();
            } 
        } else if (isset($_POST["btnBorrar"])) {
            $producto= new Productos();
            $producto->obtenerPorId();
            if(file_exists("files/$producto->imagen"))
            unlink("files/$producto->imagen");
            $producto->eliminar();
            header("Location: producto-listado.php");
    }
}
if (isset($_GET["id"]) && $_GET["id"] > 0) {
    $producto->obtenerPorId();

}

$tipoProducto = new TipoProducto();
$aTipoProductos = $tipoProducto->obtenerTodos();

include_once "header.php";
?>
<script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Productos</h1>
        </div>
    </div>
    <form action="" method="POST">
        <div class="col-12 py-3">   
            <a href="producto-listado.php" class="btn btn-primary">Listado</a>
            <a href="producto-formulario.php" class="btn btn-primary">Nuevo</a>
            <button type="submit" name="btnGuardar" id="btnGuardar" class="btn btn-success">Guardar</button>
            <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="txtNombre">Nombre:</label>
                <input type="text" name="txtNombre" id="txtNombre" class="form-control" value="<?php echo $producto->nombre; ?>">
            </div>
            <div class="col-6 form-group">
                    <label for="txtNombre">Tipo de producto:</label>
                    <select name="lstTipoProducto" id="lstTipoProducto" class="form-control selectpicker" data-live-search="true" required>
                        <option value="" disabled selected>Seleccionar</option>
                        <?php foreach ($aTipoProductos as $tipo): ?>
                            <?php if ($tipo->idtipoproducto == $producto->fk_idtipoproducto): ?>
                                <option selected value="<?php echo $tipo->idtipoproducto; ?>"><?php echo $tipo->nombre; ?></option>
                            <?php else: ?>
                                <option value="<?php echo $tipo->idtipoproducto; ?>"><?php echo $tipo->nombre; ?></option>
                            <?php endif;?>
                        <?php endforeach;?>
                    </select>
                </div>
        </div>
        <div class="row py-3">
            <div class="col-6">
                <label for="txtCantidad">Cantidad:</label>
                <input type="number" name="txtCantidad" id="txtCantidad" class="form-control" value="<?php echo $producto->cantidad; ?>">
            </div>
            <div class="col-6">
                <label for="txtPrecio">Precio:</label>
                <input type="text" name="txtPrecio" id="txtPrecio" class="form-control" value="<?php echo number_format($producto->precio, 2, ","); ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <label for="txtDescripcion">Descripción:</label>
                <textarea type="text" name="txtDescripcion" id="txtDescripcion"><?php echo $producto->descripcion; ?></textarea>
                <script>
                    ClassicEditor
                    .create(document.querySelector('#txtDescripcion'))
                    .catch(error=>{
                        console.error(error);
                    });
                    </script>
                
            </div>
        </div>
        <div class="py-3">
            <label for="fileImagen">Imagen:</label>
            <input type="file" class="form-control-file" name="archivo" id="imagen">
            <?php if($producto->imagen !=""):?>
                <img src="files/<?php echo $producto->imagen; ?>" class="img-thumbnail">
            <?php endif; ?>
        </div>
    </form>
</div>