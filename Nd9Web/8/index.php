<?php

require __DIR__ ."/Pinigine.php";

$pinigine1 = new Pinigine();

// $pinigine1->popieriniaiPinigai = 18; // IDEJIMAS TIEISIAI, BET KADANGI popieriniaiPinigai YRA PRIVATE - NELEIDZIA

$pinigine1->ideti(5);
$pinigine1->ideti(1);

$pinigine1->ideti(10);
$pinigine1->ideti(2);


$pinigine1->skaiciuokMet() ."<br>";
echo "<br>";
$pinigine1->skaiciuokPop()."<br>";
echo "<hr>";

$pinigine1->skaiciuoti();
echo "<br>";
$pinigine1->vnt();
