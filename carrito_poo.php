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
    public function imprimir(){}
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
?>