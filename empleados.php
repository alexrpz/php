<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aEmpleados=array();
$aEmpleados[]=array(
    "nombre" => "David García",
    "dni"=> 33300123,
    "bruto"=> 85000.30,
);
$aEmpleados[]=array(
    "nombre" => "Ana Del Valle",
    "dni" => 40874456,
    "bruto"=> 90000,
);
$aEmpleados[]=array(
    "nombre" => "Andrés Perez",
    "dni"=> 67567565,
    "bruto" => 100000,
);
$aEmpleados[]=array(
    "nombre"=> "Victoria Luz",
    "dni" => 75744545,
    "bruto" => 70000,
);
function calcularNeto($bruto){
    return $bruto - $bruto * 0.17;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTA EMPLEADOS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-3">
                <h1>Lista de empleados</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Sueldo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($aEmpleados as $empleados){ ?>
                    <tr>
                        <td><?php echo $empleados["dni"]; ?></td>
                        <td><?php echo mb_strtoupper($empleados["nombre"]); ?></td>
                        <td>$<?php echo number_format(calcularNeto($empleados["bruto"]), 2, ",", "."); ?></td>
                    </tr>
                    <?php } ?>                            
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-12">
                        <p>Los empleados en total son de <?php echo count($aEmpleados)?>.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>