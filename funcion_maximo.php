<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function maximo($aVector){
    $valoMaximo=0;
    foreach ($aVector as $valor){
        if($valoMaximo < $valor){
            $valoMaximo= $valor;
        }

    }
    return $valoMaximo;
}
$aNotas= array(8, 4, 5, 3, 9, 1);
$aSueldo= array(800.30, 400.87, 500.45, 300, 900.70, 100, 900, 1800);

echo "La nota máxima es:" .maximo($aNotas)."<br>";
echo "El sueldo máximo es:" .maximo($aSueldo);
?>