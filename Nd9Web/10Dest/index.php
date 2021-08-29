<?php

require __DIR__ . '/Tenisininkas.php';


$t1 = new Tenisininkas('Rapolas');
$t2 = new Tenisininkas('Mykolas');

Tenisininkas::zaidimoPradzia();

$t2->perduotiKamuoliuka();
$t1->perduotiKamuoliuka();
$t2->perduotiKamuoliuka();
$t1->perduotiKamuoliuka();


echo '<pre>';
var_dump($t1);
var_dump($t2);

// echo "</pre>";

// var_dump(Tenisininkas::$zaidejas1);
var_dump($t1->get1());