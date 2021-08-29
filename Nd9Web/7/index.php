<?php

require __DIR__ . "/Krepsys.php";
require __DIR__ . "/Grybas.php";

$krepsys = new Krepsys();


// $valg = (rand(0, 1) == 1) ? true : false;
// $sukirm  = (rand(0, 1) == 1) ? true : false;
// $svoris = rand(5,45);
// echo "Valgomas: " .$valg ." / Sukirmijes: " .$sukirm ." / Kg: ". $svoris;
// echo "<br>";



// echo $krepsys::DYDIS;

$riba = $krepsys::DYDIS;
$count=null;


while ($krepsys->getKg() < $riba) {
    $count++;
    $grybas = new Grybas();

    if ( $grybas->getGryboKg() ) {
        $krepsys->setKg( $grybas->getGryboKg() );
    }
}

echo "Krepsyje yra " .$krepsys->getKg() ." kg grybu"."<br>";
echo "Viso perrinkta " .$count ." grybu"."<br>";

// echo $grybas->getGryboKg();
