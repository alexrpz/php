<?php
$valor = rand(1,30);
if($valor == 1 || $valor == 3 || $valor == 5 || $valor == 7 || $valor == 9 || $valor == 11 || $valor == 13 || $valor == 15 || $valor == 17 || $valor == 19 || $valor == 21 || $valor == 23 || $valor == 25 || $valor == 27 || $valor == 29) {
    echo "El numero $valor es impar";
} else {
    echo "El numero $valor es par";
}
?>