<?php

require __DIR__ ."/Pinigine.php";

$pinigine1 = new Pinigine();

// $pinigine1->popieriniaiPinigai = 18; // IDEJIMAS TIEISIAI, BET KADANGI popieriniaiPinigai YRA PRIVATE - NELEIDZIA

$pinigine1->ideti(5);
$pinigine1->ideti(1);


$pinigine1->skaiciuokMet() ."<br>";
$pinigine1->skaiciuokPop()."<br>";
echo "<br>";

$pinigine1->skaiciuoti();
