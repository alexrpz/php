<?php
include_once("config.php");
include_once("header.php");
include_once "entidades/venta.php";
include_once "entidades/cliente.php";
include_once "entidades/producto.php"; 
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Venta</h1>
        </div>
    </div>
    <form action="" method="POST">
        <div class="col-12 py-3">   
            <button type="submit" class="btn btn-primary">Listado</button>
            <button type="submit" class="btn btn-primary">Nuevo</button>
            <button type="submit" class="btn btn-success">Guardar</button>
            <button type="reset" class="btn btn-danger">Borrar</button>
        </div>
        <label for="txtFechaNac" class="d-block">Fecha y hora:</label>
        <select class="form-control d-inline" name="txtDia" id="txtDia" style="width: 80px">
            <option value="" selected disabled>DD</option>
            <?php for($i=1; $i <= 31; $i++): ?>
                <?php if($venta->fecha != "" && $i == date_format(date_create($venta->fecha), "d")): ?>
                <option selected><?php echo $i; ?></option>
                <?php else: ?>
                <option><?php echo $i; ?></option>
                <?php endif; ?>
            <?php endfor; ?>
        </select>
        <select class="form-control d-inline" name="txtMes" id="txtMes" style="width: 80px">
            <?php for($i=1; $i <= 12; $i++): ?>
                <?php if($venta->fecha != "" && $i == date_format(date_create($venta->fecha), "m")): ?>
                <option selected><?php echo $i; ?></option>
                <?php else: ?>
                <option><?php echo $i; ?></option>
                <?php endif; ?>
            <?php endfor; ?>
        </select>
        <select class="form-control d-inline" name="txtAnio" id="txtAnio" style="width: 100px">
            <option selected="" disabled="">YYYY</option>
            <?php for($i=1900; $i <= date("Y"); $i++): ?>
                <?php if($venta->fecha != "" && $i == date_format(date_create($venta->fecha), "Y")): ?>
                <option selected><?php echo $i; ?></option>
                <?php else: ?>
                <option><?php echo $i; ?></option>
                <?php endif; ?>
            <?php endfor; ?> ?>
        </select>
        <?php if($venta->fecha == ""): ?>
        <input type="time" required="" class="form-control d-inline" style="width: 120px" name="txtHora" id="txtHora" value="00:00">
        <?php else: ?>
        <input type="time" required="" class="form-control d-inline" style="width: 120px" name="txtHora" id="txtHora" value="<?php echo date_format(date_create($venta->fecha), "H:i"); ?>">
        <?php endif; ?>
        <div class="row py-3">
            <div class="col-6">
                <label for="lstCliente">Cliente:</label>
                <select name="lstCliente" id="lstCliente" class="form-control">
                    <option value="" disabled selected>Seleccionar</option>
                </select>
            </div>
            <div class="col-6">
                <label for="lstProducto">Producto:</label>
                <select name="lstProducto" id="lstProducto" class="form-control">
                    <option value="" disabled selected>Seleccionar</option>
                </select>
            </div>
        </div>
        <div class="row py-3">
            <div class="col-6">
                <label for="txtPrecioUnitario">Precio unitario:</label>
                <input placeholder="$0" type="text" name="txtPrecioUnitario" id="txtPrecioUnitario" class="form-control">
            </div>
            <div class="col-6">
                <label for="txtCantidad">Cantidad:</label>
                <input placeholder="0" type="text" name="txtCantidad" id="txtCantidad" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="txtTotal">Total:</label>
                <input placeholder="0" type="text" name="txtTotal" id="txtTotal"  class="form-control">
            </div>
        </div>
    </form>
</div>