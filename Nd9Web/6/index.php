<?php

require __DIR__ ."/Stikline.php";

// turiai 200, 150, 100

$stikline1= new Stikline(200);
$stikline2= new Stikline(150);
$stikline3= new Stikline(100);

$stikline1->ipilti(200);
// $stikline1->ispilti();

$stikline2->ipilti( $stikline1->ispilti() );
$stikline3->ipilti( $stikline2->ispilti() );

// $stikline3->ispilti();

echo  "Stikline 1 Turis: " .$stikline1->rodykT() ."<br>";
echo  "Stikline 1 Kiekis: " .$stikline1->rodykK() ."<br>";
echo "<hr>";
echo  "Stikline 2 Turis: " .$stikline2->rodykT() ."<br>";
echo  "Stikline 2 Kiekis: " .$stikline2->rodykK() ."<br>";
echo "<hr>";
echo  "Stikline 3 Turis: " .$stikline3->rodykT() ."<br>";
echo  "Stikline 3 Kiekis: " .$stikline3->rodykK() ."<br>";
