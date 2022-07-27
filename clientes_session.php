<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$aClientes=array();

session_start();

if(isset($_SESSION["usuarios"])){

    $aClientes = $_SESSION["usuarios"];
} else {
    $aClientes = array();
}

if($_POST){
    $nombre= $_POST["txtNombre"];
    $dni= $_POST["txtDni"];
    $telefono= $_POST["txtTelefono"];
    $edad= $_POST["txtEdad"];

    $aClientes[]=array("nombre"=> $nombre,
                        "dni"=> $dni,
                        "telefono"=> $telefono,
                        "edad"=>$edad
);
    $_SESSION["usuarios"] = $aClientes;
    
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Tabla de clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <form action="" method="POST">
                    <div class="pb-2">
                        <label for="txtNombre">Nombre:</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control">
                    </div>   
                    <div class="pb-2">
                        <label for="txtDni">DNI:</label>
                        <input type="text" name="txtDni" id="txtDni" class="form-control">
                    </div> 
                    <div class="pb-2">
                        <label for="txtTelefono">Teléfono:</label>
                        <input type="tel" name="txtTelefono" id="txtTelefono" class="form-control">
                    </div> 
                    <div class="pb-2">
                        <label for="txtEdad">Edad:</label>
                        <input type="number" name="txtEdad" id="txtEdad" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <button class="btn btn-primary" type="submit"><Em>Enviar</Em></button>
                        </div>
                        <div class="col-3">
                            <button class="btn btn-danger" type="submit"><Em>Eliminar</Em></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-8">
                <table class="table table:hover shadow border">
                    <thead>
                        <tr>
                            <th>Nombre:</th>
                            <th>DNI:</th>
                            <th>Teléfono:</th>
                            <th>Edad:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($aClientes as $cliente):?>
                            <tr>
                                <td><?php echo $cliente["nombre"]; ?></td>
                                <td><?php echo $cliente["dni"]; ?></td>
                                <td><?php echo $cliente["telefono"]; ?></td>
                                <td><?php echo $cliente["edad"]; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>