<?php
/*
Escribir un programa en php que recorra un arreglo y genere un histograma en base a los numeros de este.
El arreglo se llama myArray y contienen 10 elementos que corresponden a numeros enteros del 1 al 5. Un
histograma representa que tanto un elemento aparece en un conjunto de datos (Debe mostrar la frecuencia
para todos los numeros del 1 al 5, incluso si no estan presentes en el arreglo). Por ejemplo, para el 
arreglo myArray = (1,2,1,3,3,1,2,1,5,1) el histograma se veria así:

1: *****
2: **
3: **
4: 
5: *

*/

function countNumber(int $number, array $array): int
{
    $countNumber = 0;
    for ($i = 0; $i < count($array); $i++) {
        if ((int) $array[$i] === (int) $number) {
            $countNumber++;
        }
    }
    return $countNumber;
}

$myArray = [1, 2, 1, 3, 3, 1, 2, 1, 5, 1];
$rangeNumber = 5;
$newArray = [];

for ($i = 1; $i <= $rangeNumber; $i++) {
    $newArray[$i] = countNumber($i, $myArray);
}

foreach ($newArray as $key => $value) {
    echo "$key: " . str_pad('', $value, '*') . "\n";
}