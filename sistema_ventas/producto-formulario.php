<?php
include_once("config.php");
include_once("header.php"); 
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
            <button type="submit" class="btn btn-primary">Listado</button>
            <button type="submit" class="btn btn-primary">Nuevo</button>
            <button type="submit" class="btn btn-success">Guardar</button>
            <button type="reset" class="btn btn-danger">Borrar</button>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="txtNombre">Nombre:</label>
                <input type="text" name="txtNombre" id="txtNombre" class="form-control">
            </div>
            <div class="col-6">
                <label for="lstTipoProducto">Tipo de producto:</label>
                <select name="lstTipoProducto" id="lstTipoProducto" class="form-control">
                    <option value="" disabled selected>Seleccionar</option>
                </select>
            </div>
        </div>
        <div class="row py-3">
            <div class="col-6">
                <label for="txtCantidad">Cantidad:</label>
                <input type="text" name="txtCantidad" id="txtCantidad" class="form-control">
            </div>
            <div class="col-6">
                <label for="txtPrecio">Precio:</label>
                <input type="text" name="txtPrecio" id="txtPrecio" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <label for="txtDescripcion">Descripción:</label>
                <textarea type="text" name="txtDescripcion" id="txtDescripcion"></textarea>
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
            <label for="txtImagen">Imagen:</label>
            <input type="file" name="txtImagen" id="txtImagen">
        </div>
    </form>
</div>