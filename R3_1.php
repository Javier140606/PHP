<?php
/*
Ejercicio 1: Crea una función suma que reciba dos números y devuelva su suma.
Utiliza la función en un script que reciba dos números y muestre el resultado.
*/
$num1 = 5;
$num2 = 10;

echo "El primer numero es $num1 y el segundo numero es $num2";

function sumar($num1, $num2){
    return $num1 + $num2;
}

echo "<br>La suma es: " . sumar($num1, $num2);
?>