<?php

$array[0][0] = "a1";
$array[0][1] = "a2";
$array[0][2] = "a3";

$array[1][0] = "a11";
$array[1][1] = "a22";
$array[1][2] = "a33";

$array[2][0] = "a111";
$array[2][1] = "a222";
$array[2][2] = "a333";

$array = json_encode($array);

echo ($array);

echo '<hr>';

$array2 = json_decode($array);

print_r($array2);
