<?php
/*
Tienes un arreglo (llamado myArray) con 5 elementos (enteros en el rango de 1 a 100). Escribe un programa en PHP 
que imprima el valor mas alto del arreglo (Si se repite, solo imprimir una vez). El programa solo debe 
imprimir el numero, sin ningun texto.
*/


$myArray = [13, 2, 4, 35, 35, 1, 1];

$maxNumber = 0;

for ($i = 0; $i < count($myArray); $i++) {
    $number = $myArray[$i];
    if($number > $maxNumber){
        $maxNumber = $number;
    }
}

echo $maxNumber."\n";