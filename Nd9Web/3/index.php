<?php

require __DIR__ ."/Kibiras2.php";



$kibiras = new Kibiras2();
$kibiras1 = new Kibiras2();
$kibiras2 = new Kibiras2();


// $kibiras1->akmenuKiekis = 10; Tieisia, bet kadangi protected neleidzia
$kibiras->prideti1Akmeni();
$kibiras1->prideti1Akmeni();
$kibiras2->prideti1Akmeni();

$kibiras->prideti1Akmeni();


$kibiras->pridetiDaugAkmenu(10);
$kibiras2->pridetiDaugAkmenu(5);


// $kibiras1->pridetiDaugAkmenu(5);

echo "I kibira 0 prideta akmenu: " .$kibiras->kiekPririnktaAkmenu();
echo "<br>";
echo "I kibira 1 prideta akmenu: " .$kibiras1->kiekPririnktaAkmenu();
echo "<br>";
echo "I kibira 2 prideta akmenu: " .$kibiras2->kiekPririnktaAkmenu();
echo "<hr>";
echo "Visuose kibiruose yra: " .$kibiras2->kiekPririnktaAkmenuVisuose() . " akmenu (-ys).";



