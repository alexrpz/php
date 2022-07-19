<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_POST){
    $usuario=$_POST["txtUsuario"];
    $clave=$_POST["txtClave"];

    if($usuario=="admin" && $clave=="12345"){
        header("location:acceso-confirmado.php");
    }else{
        $msg = "Usuario o clave incorrectos";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-5">
                <h1>Formulario</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <?php if(isset($msg)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $msg; ?>        
                    </div> 
                <?php endif; ?>  
                <form method="POST" action="" >                                 
                    <div>
                        <label for="txtUsuario">Usuario:</label>
                        <input type="text" name="txtUsuario" id="txtUsuario" class="form-control" required>
                    </div>
                    <div>
                        <label for="txtClave">Clave:</label>
                        <input type="password" name="txtClave" id="txtClave" class="form-control" required>
                    </div>
                    <div class="py-3">
                        <button type="submit" class=" btn btn-primary">Ingresar</button>
                    </div>
                </form>
            </div>
        </div>
    </main> 
</body>
</html>