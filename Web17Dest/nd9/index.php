<?php

require __DIR__ . '/Grybas.php';
require __DIR__ . '/Krepsys.php';


$kasikas = new Krepsys;


while($kasikas->deti(new Grybas)){}


var_dump($kasikas);
echo "<br>";
print_r($kasikas);
