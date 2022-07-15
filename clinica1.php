<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aPacientes=array();
$aPacientes[]=array(
    "dni"=>"33.756.012",
    "nombre"=>"Ana Acuña",
    "edad" => 45,
    "peso"=> 81.5,
);
$aPacientes[]=array(
    "dni"=>"23.684.385",
    "nombre"=>"Gonzalo Bustamante",
    "edad" => 66,
    "peso"=> 79,
);
$aPacientes[]=array(
    "dni"=>"23.684.385",
    "nombre"=>"Juan Irraola",
    "edad" => 28,
    "peso"=> 79,
);
$aPacientes[]=array(
    "dni"=>"23.684.385",
    "nombre"=>"Beatriz Ocampo",
    "edad" => 50,
    "peso"=> 79,
);
$aPacientes[]=array(
    "dni"=>"14.343.656",
    "nombre"=>"Catalina Ruíz",
    "edad" => 56,
    "peso"=> 75,
);
$aPacientes[]=array(
    "dni"=>"27.890.900",
    "nombre"=>"Alexis Fernández",
    "edad" => 33,
    "peso"=> 75,
);
$aPacientes[]=array(
    "dni"=>"33.898.233",
    "nombre"=>"Paulo Carrizo",
    "edad" => 61,
    "peso"=> 80,
);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>clinica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-3 text-center">
                <h1>LISTA PACIENTES</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombre y Apellido</th>
                            <th>Edad</th>
                            <th>Peso</th>
                        </tr>
                    </thead>
                    <tbody>
                     <?php
                     foreach($aPacientes as $paciente) { ?> //otra forma de bucle
                        <tr>
                            <td><?php echo $paciente["dni"]; ?></td>
                            <td><?php echo $paciente["nombre"]; ?></td>
                            <td><?php echo $paciente["edad"]; ?></td>
                            <td><?php echo $paciente["peso"]; ?></td>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </main>
</body>
</html>