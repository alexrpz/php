<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function calcularNeto($bruto){
    $neto = $bruto - ($bruto*0.17);
    return $neto;
}
echo "El sueldo neto es $" .calcularNeto(70000);
?>