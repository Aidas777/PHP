<?php

require __DIR__ ."/MarsoPalydovas.php";

$palyd = MarsoPalydovas:: makePalyd();
// $palydRez = MarsoPalydovas:: getPalyd();

$palyd1 = MarsoPalydovas:: makePalyd();
// $palyd1Rez = MarsoPalydovas:: getPalyd();



$palyd2 = MarsoPalydovas:: makePalyd();
// $padyd2Rez = MarsoPalydovas:: getPalyd();

var_dump($palyd);
echo "<br>";
var_dump($palyd1);
echo "<br>";
var_dump($palyd2);