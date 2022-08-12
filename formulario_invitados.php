<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//si existe el archivo invitados lo abrimos y cargamos en una variable del tipo array
if(file_exists("invitados.txt")){
    $archivo = fopen("invitados.txt", "r");
    $aDatos= fgetcsv($archivo, 0, ",");//los DNIs permitidos
}else{
    $aDatos= array(); //sino el array queda como un array vacio
}


if($_POST){
    
    if(isset($_POST["btnInvitado"])){
        $datos= $_REQUEST["txtInvitado"];
        //si el dni ingresado se encuentra en la lista se mostrara ujn mensaje de bienvenido
        if(in_array($datos, $aDatos));
        $msg= "Bienvenido a la fiesta";
        //sino un mensaje de no se encuentra en la lista de invitados    
    }else{
        $msg= "No se encuentra en la lista de invitados";
    }
    if(isset($_POST["btnVip"])){
        $cod= $_REQUEST["txtCodigo"];
        //si el codigo es verde entonces mostrara su codigo de acceso es .....
        if($cod=="verde"){
            $msg= "su codigo de acceso es". rand(1000, 9999);
        }else{
            $msg= "Usted no tiene el pase VIP"; //sino ud. no tiene pase VIP
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invitados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    
</head>
<body>
    <main class="container">
        <div class="row py-5">
            <div class="col-12 text-center">
                <h1>Lista de invitados</h1>
            </div>
        </div>
        <div class="row pb-5">
            <div class="col-12">
                <h5>Complete el siguiente formulario</h2>
            </div>
        </div>
        <form method="POST" action="">
            <?php if (isset($msg)): ?>
            <div class="col-12">
                <div class="alert alert-info" role="alert">
                    <?php echo $msg; ?>
                </div>
            </div>
            <?php endif;?>
            
            <div class="row">
                <div class="col-6">
                    <label for="txtInvitado">Ingrese el DNI:</label>
                    <input type="text" name="txtInvitado" id="txtInvitado" class="form-control">
                    <button type="submit" name="btnInvitado" class="btn btn-primary" class="form-control">Verificar Invitado</button>
                
                </div>
            </div>
            <div class="row py-3">
                <div class="col-6">
                    <label for="txtCodigo">Ingresa el código secreto para el pase VIP:</label>
                    <input type="text" name="txtCodigo" id="txtCodigo" class="form-control">
                    <button type="submit" name="btnVip" class="btn btn-primary" class="form-control">Verificar código</button>
                </div>
            </div>
        </form>
    </main>
</body>
</html>