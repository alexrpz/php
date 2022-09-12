<?php
include_once("config.php");
include_once("header.php"); 

?>
<div class="container-fluid">
    <div class="col-12">
        <h1>Tipo de productos</h1>
    </div>
    <div class="row">
        <form action="" method="POST">
            <div class="col-12 py-3">   
                <button type="submit" class="btn btn-primary">Listado</button>
                <button type="submit" class="btn btn-primary">Nuevo</button>
                <button type="submit" class="btn btn-success">Guardar</button>
                <button type="reset" class="btn btn-danger">Borrar</button>
            </div>
            <div class="col-12">
                <label for="txtNombre">Nombre:</label>
                <input type="text" name="txtNombre" id="txtNombre" class="form-control">
            </div>
        </form>
    </div>
</div>       