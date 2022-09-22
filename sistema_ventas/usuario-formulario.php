
<?php

include_once "config.php";
include_once "entidades/usuario.php";

$pg = "Edición de usuario";

$usuario = new Usuarios();
$usuario->cargarFormulario($_REQUEST);

if($_POST){
    if(isset($_POST["btnGuardar"])){
        if(isset($_GET["id"]) && $_GET["id"] > 0){
              //Actualizo un cliente existente
              $usuario->actualizar();
        } else {
            //Es nuevo
            $usuario = new Usuarios();
            $usuario->idusuario;
            $usuario->obtenerPorId();
            if($venta->cantidad <= $usuario->cantidad){
                $total = $venta->cantidad * $usuario->precio;
                $venta->total = $total;
                $venta->insertar();

                $usuario->cantidad -= $venta->cantidad;
                $usuario->actualizar();
            } else {
                $msg = "No hay stock suficiente";
            }
        }
    } else if(isset($_POST["btnBorrar"])){
        $venta->eliminar();
        header("Location: usuario-listado.php");
    }
} 

include_once "header.php";
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Usuario</h1>
            <div class="row">
                <div class="col-12 mb-3">
                    <a href="usuario-listado.php" class="btn btn-primary mr-2">Listado</a>
                    <a href="usuario-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
                    <button type="submit" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar">Guardar</button>
                    <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
                </div>
            </div>
            <div class="row">
                <div class="col-6 form-group">
                    <label for="txtUsuario">Usuario:</label>
                    <input type="text" required class="form-control" name="txtUsuario" id="txtUsuario" value="<?php echo $usuario->usuario ?>">
                </div>
                <div class="col-6 form-group">
                    <label for="txtNombre">Nombre:</label>
                    <input type="text" required class="form-control" name="txtNombre" id="txtNombre" value="<?php echo $usuario->nombre ?>">
                </div>
                <div class="col-6 form-group">
                    <label for="txtApellido">Apellido:</label>
                    <input type="text" required class="form-control" name="txtApellido" id="txtApellido" value="<?php echo $usuario->apellido ?>">
                </div>
                <div class="col-6 form-group">
                    <label for="txtCorreo">Correo:</label>
                    <input type="email" class="form-control" name="txtCorreo" id="txtCorreo" required value="<?php echo $usuario->correo ?>">
                </div>
                <div class="col-6 form-group">
                    <label for="txtClave">Clave:</label>
                    <input type="password" class="form-control" name="txtClave" id="txtClave" value="">
                    <small>Completar únicamente para cambiar la clave</small>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php include_once "footer.php";?>