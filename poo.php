<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Persona{
    public $dni;
    public $nombre;
    public $edad;
    public $nacionalidad;
    public function imprimir(){}
}

class Alumno extends Persona{
    public $legajo;    
    public $notaPortfolio= 0.0;     
    public $notaPhp= 0.0;   
    public $notaProyecto= 0.0;

    public function __construct()
    {
       $this->notaPortfolio= 0.0;
       $this->notaPhp= 0.0;
       $this->notaProyecto= 0.0;
    }   

    public function imprimir(){
        echo "DNI: " . $this->dni ."<br>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Edad: " . $this->edad . "<br>";
        echo "Nacionalidad: " . $this->nacionalidad . "<br>";
        echo "Nota Portfolio: " . $this->notaPortfolio . "<br>";
        echo "Nota Php: " . $this->notaPhp . "<br>";
        echo "Nota Proyecto: " . $this->notaProyecto . "<br>";
        echo "Promedio: " . number_format($this->calcularPromedio(), 2, ".", ",") . "<br><br>";
    }

    public function calcularPromedio(){
        return ($this->notaPhp + $this->notaPortfolio + $this->notaProyecto)/3;
    }
}

class Docente extends Persona{
    public $especialidad;
    public function imprimir(){}
    public function imprimirEspecialidadesHabilitadas(){}
}
$alumno1= new Alumno();
$alumno1->nombre = "Mauricio Fernández";
$alumno1->dni = "4234234223";
$alumno1->nacionalidad = "Argentina";
$alumno1->notaPhp = 10;
$alumno1->notaPortfolio = 10;
$alumno1->notaProyecto = 10;
$alumno1->imprimir();
?>