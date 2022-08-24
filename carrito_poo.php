<?php

use Cliente as GlobalCliente;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Cliente{
    private $dni;
    private $nombre;
    private $correo;
    private $telefono;
    private $descuento;
    public function imprimir(){
        echo "DNI: " . $this->dni . "<br>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Correo: " . $this->correo . "<br>";
        echo "Telefono: " . $this->telefono . "<br>";
        echo "Descuento: " . $this->descuento . "<br>";
    }
    public function __construct($dni="", $nombre="", $correo="", $telefono="", $descuento="")
    {
        $this->descuento=0.0;
    }
    public function __get($propiedad)
    {
        return $this-> $propiedad;
    }
    public function __set($propiedad, $valor)
    {
        $this-> $propiedad=$valor;
    }
}


class Producto{
    private $cod;
    private $nombre;
    private $precio;
    private $descripcion;
    private $iva;
    public function imprimir(){
        echo "Cod: " . $this->cod . "<br>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Precio: " . $this->precio . "<br>";
        echo "Descripción: " . $this->descripcion . "<br>";
        echo "IVA: " . $this->iva . "<br>";
    }
    public function __construct($cod="", $nombre="", $precio="", $descripcion="", $iva="")
    {
        $this->precio = 0.0;
        $this->iva= 0.0;
    }
    public function __get($propiedad)
    {
        return $this-> $propiedad;
    }
    public function __set($propiedad, $valor)
    {
        $this-> $propiedad=$valor;
    }
}


class Carrito{
    private $cliente;
    private $aProductos;
    private $subtotal;
    private $total;
    public function cargarProducto(){}
    public function imprimirTicket(){}
    public function __construct($cliente="", $aProductos="", $subtotal="", $total="")
    {
        $this->subtotal=0.0;
        $this->total=0.0;
        $this->aProductos=array();
    }
    public function __get($propiedad)
    {
        return $this-> $propiedad;
    }
    public function __set($propiedad, $valor)
    {
        $this-> $propiedad=$valor;
    }
}
//Programa
$cliente1= new Cliente();
$cliente1->dni= "34234243";
$cliente1->nombre= "Bernabé";
$cliente1->correo= "bernabe@gmail.com";
$cliente1->telefono= "+543484360592";
$cliente1->descuento= 0.05;

$cliente1->imprimir();

$producto1= new Producto();
$producto1->cod= "ABC343";
$producto1->nombre= "Noteboock 15\"HP";
$producto1->descripcion= "Es una computadora HP";
$producto1->precio= "$25.000";
$producto1->iva= "21";

$producto1->imprimir();

$producto2= new Producto();
$producto2->cod= "DFD3434";
$producto2->nombre= "Heladera";
$producto2->descripcion= "Es una heladera original";
$producto2->precio= "$45.000";
$producto2->iva= "10.5";

$producto2->imprimir();

$carrito= new Carrito();
$carrito->cliente= $cliente1;
$carrito->cargarProducto($producto1);
$carrito->cargarProducto($producto2);

$carrito->imprimirTicket();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-4">
                <table class="table table:hover border">
                    <thead class="text-center">
                        <th>ECO MARKET</th>
                    </thead>
                    <tr>
                        <th>Fecha:</th>
                        <td><?php date("d/m/Y H:i:s")?> </td>
                    </tr>
                    <tr>
                        <th>DNI:</th>
                        <td><?php echo $cliente1->dni; ?></td>
                    </tr>
                    <tr>
                        <th>Nombre:</th>
                        <td><?php echo $cliente1->nombre; ?></td>
                    </tr>
                    <tr>
                        <th>Productos:</th>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?php echo $producto1->nombre; ?>:</td>
                        <td><?php echo number_format($producto1->precio, 2, ",", "."); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $producto2->nombre; ?>:</td>
                        <td><?php echo $producto2->precio; ?></td>
                    </tr>
                    <tr>
                        <th>Subtotal s/IVA:</th>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    </main>
</body>
</html>