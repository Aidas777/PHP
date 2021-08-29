<?php

require __DIR__ ."/Kibiras.php";



$kibiras1 = new Kibiras();

// $kibiras1->akmenuKiekis = 10; Tieisia, bet kadangi protected neleidzia
$kibiras1->prideti1Akmeni();
$kibiras1->prideti1Akmeni();


$kiekis=10;
$kibiras1->pridetiDaugAkmenu($kiekis);


// $kibiras1->pridetiDaugAkmenu(5);

echo "I kibira prideta akmenu: " .$kibiras1->kiekPririnktaAkmenu();



