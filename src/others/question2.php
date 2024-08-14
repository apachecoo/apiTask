<?php

/*Escribir un programa en php que imprima una x construida a base de la letra X y utilizar el carácter 
de subrayado como espacio. El tamaño de la x se basa en una variable n que indicará el tamaño de la 
letra para imprimir (en una matriz de n x n). Por ejemplo, para n=5 se obtiene:

X___X
_X_X_
__X__
_X_X_
X___X

Para n=6 se obtiene

X____X
_X__X_
__XX__
__XX__
_X__X_
X____X

Si n es igual a cero imprimir "ERROR"

Tenga en cuenta que el código debe imprimir los resultados exactamente como se muestra con el fin de que la 
pregunta sea considerada válida durante la prueba (El caracter "X" en mayúscula y el guion bajo "_" para
los espacios) */

$n = 3;

function printX(int $n)
{

    if ($n === 0) {
        return "ERROR \n";
    }

    $paintX = '';
    for ($f = 0; $f < $n; $f++) {
        for ($c = 0; $c < $n; $c++) {
            //   echo "$c == $f || $c == ($n - $f - 1) \n";
            if ($c == $f || $c == ($n - $f - 1)) {
                $paintX .= 'X';
            } else {
                $paintX .= '_';
            }
        }
        $paintX .= "\n";
    }

    return $paintX;
}


echo printX($n);