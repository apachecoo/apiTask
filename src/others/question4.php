<?php

/*
Tienes un arreglo (llamado mi arreglo) con 10 elementos (enteros en el rango de 1 a 9). Escribe un programa
en PHP que imprima el número que tenga mas ocurrencias consecutivas en el arreglo y también imprimir
la cantidad de veces que aparece en la secuencia.

El código que llena el arreglo ya esta escrito, pero puedes editarlo para probar con otros valores. Con el 
botón de refrescar puedes recuperar el valor original que será utilizado para evaluar la pregunta como 
correcta o incorrecta durante la ejecución. 

Su programa debe analizar el arreglo de izquierda a derecha para que en caso de que dos numeros cumplan la 
condición, el que aparece por primera vez de izquierda a derecha sera el que se imprima. La salida de los 
datos para el arreglo en el ejemplo (1,2,2,5,4,6,7,8,8,8) sería lo siguiente:
Longest: 3
Number: 8 

En el ejemplo, la secuencia mas larga la tiene el numero 8, con una secuencia de tres 8 seguidos . Tenga 
en cuenta que el código que escriba debe imprimir los resultados exactamente como se muestra con el de que 
la pregunta sea considerada válida.

*/

$myArray = [1, 2, 2, 5, 4, 6, 7, 8, 8, 8];

$maxLength = 0;
$maxNumber = $myArray[0];

$currentLength = 1;
$currentNumber = $myArray[0];


for ($i = 1; $i < count($myArray); $i++) {
    $number = $myArray[$i];
    if ($number === $currentNumber) {
        $currentLength++;
    } else {
        if ($currentLength > $maxLength) {
            $maxLength  = $currentLength;
            $maxNumber = $currentNumber;
        }

        $currentLength = 1;
        $currentNumber = $myArray[$i];
    }
}

if ($currentLength>$maxLength){
    $maxLength = $currentLength;
    $maxNumber = $currentNumber;
}


echo "Longest: ".$maxLength."\n";
echo "Number: ".$maxNumber."\n";