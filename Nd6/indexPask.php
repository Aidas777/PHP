<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>


<?php

sayHi();
sayHiYou("Aidai");

$vardas="Kazkas";
sayHiYou($vardas);

sayHiYou("Aidai");
sayHiYou();
sum(7,20);

$pi=myPi();
echo $pi. "<br>";


function sayHi()
{
    echo "Labas". "<br>";
}

function sayHiYou($name="") 
{
    echo "Labas " .$name. "<br>";
}

function sum($a, $b) {
    echo $a+$b. "<br>";
}

function myPi() {
    return 3.1415;
}

echo gooDay() ."<br>";
function gooDay() {
    return "Siandien yra labai grazi diena";
}
echo sq(5);
function sq($sk) {
    return $sk*$sk;
}

h1("Voras");
h1("Saule");

function h1($txt) {
    echo "<h1>".$txt ."</h1>";
}

recursija(5);
function recursija($num) {
    if($num > 0) {
        recursija($num-1);
    }
    echo $num." ";
}

echo "<br>";

recursijaB(5);
function recursijaB($num) {
    echo $num." ";
    if($num > 0) {
        recursijaB($num-1);
    }
}

a();

function a() {
    echo "labas";
    echo "labas";
    b();
    echo "labas";
    echo "labas";
}

function b() {
    echo "rytas";
    echo "rytas";
}

// make("Latte");

// function make($product) {
//     if (hasIngredients($product)) {
//         boilWater(); //async
//         prepareCup($product);
//         fillCup($product);
//         while(waterNotReady()) {
//             thread.Sleep(100);
//         }
//         addWater();
//         returnCup();
//     }
// }
echo "<br>";
print_r(rndNumArr(20));
echo "<br>";

print_r(rndNumArr(20,40,60));

function rndNumArr($len, $from=null, $to=null) {
    $arr=[];

    for ($i=0; $i < $len; $i++) { 
        if( is_numeric($from) && is_numeric($to) ) {
            $rnd[]=rand($from, $to);
        } else {
            $rnd=rand();
        }
        $arr[]=$rnd;
    }
    return $arr;
}





?>