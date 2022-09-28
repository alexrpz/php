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
                    move_uploaded_file($archivo_tmp, "files/$nombreImagen");
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
                    $productoAnt = new Productos();
                    $productoAnt->idproducto = $_GET["id"];
                    $imagenAnterior = $productoAnt->imagen;
                    if(file_exists("files/$productoAnt->imagen")){
                        unlink("files/$productoAnt->imagen");
                    }
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