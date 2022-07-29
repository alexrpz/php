<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function print_f($variable)
{
    if(is_array($variable)){
    $archivo1=fopen('datos1.txt','a+');
    foreach($variable as $item){
        fwrite($archivo1,$item,'Hola como estas capolandia master');
        } 
        fclose($archivo1);
    }else{

    }
}
//uso
$aNotas=array(8,5,7,9,10);
$msg ="este es un mensaje";
print_f($msg);
?>