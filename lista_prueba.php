
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$stock = 10;

$aProductos=array();
$aProductos[]=array("nombre" => "Smart TV 55*\ 4K UHD",
        "marca" => "Hitachi",
        "modelo" => "554KS20",
        "stock" => 0,
        "precio" => 58000,
);
$aProductos[]=array("nombre" => "Samsung Galaxy A30 Blanco",
        "marca" => "Samsung",
        "modelo" => "Galaxy A30",
        "stock" => 60,
        "precio" => 22000,
);
$aProductos[]=array("nombre" => "Aire Acondicionado Split F/C Surrey 2900F",
        "marca" => "Surrey",
        "modelo" => "553AIQ1201E",
        "stock" => 5,
        "precio" => 45000,
);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Prueba</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-3">
                <h2>LISTA PRODUCTOS</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Stock</th>
                            <th>Precio</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                     <?php
                     $contador=0;
                     $precioTotal=0;
                     
                     while ($contador <count($aProductos)) {
                         
                     $precioTotal += $aProductos[$contador]["precio"]    

                     ?>
                        <tr>
                            <td><?php echo $aProductos[$contador]["nombre"];?></td>
                            <td><?php echo $aProductos[$contador]["marca"];?></td>
                            <td><?php echo $aProductos[$contador]["modelo"];?></td>
                            <td><?php echo $aProductos[$contador]["stock"] > 10 ? "Hay stock" : ($aProductos[$contador]["stock"] > 0 && $aProductos[$contador]["stock"] <=10 ? "Poco stock" : "No hay stock");?></td>
                            <td><?php echo $aProductos[$contador]["precio"];?></td>                           
                            <td><button class="btn btn-primary">Comprar</button></td>
                        </tr>
                    <?php
                    $contador++;
                        }; ?>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-12">
                        <p>La suma total de los productos es de <?php echo $precioTotal?>.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>