<?php

$array = [
    0 => 11,
    1 => 12,
    2 => 23,
    3 => 34,
    4 => 45,
    5 => 56,
    6 => 67
];


// codifica el array a string
$array = json_encode($array);

echo ($array);

echo '<hr>';

// decodifica el string en array
$array2 = json_decode($array);

print_r($array2);

echo '<hr>';
//Obtener un dato directamente del array
echo $array[0];
