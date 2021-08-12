<?php

// $rndNums=[];

// for ($i=0; $i <10 ; $i++) { 
//     $rndNums[]=rand(0,5);
// }

// print_r($rndNums);

// $rndNums=[];

for ($i=0; $i < 50; $i++) { 
    $rndLetter = chr(rand(97,122));
    echo $rndLetter;
    $rndSmt[$rndLetter] = rand(0,50);
}

print_r($rndSmt);
// // var_dump($rndSmt);

echo "<br><br><br>";


// //////////////// su & (&$value) foreach ($rndSmt as $key => $value) keiciam tik kopija, OE palieka nepakites /////////////

foreach ($rndSmt as $key => $value) {
    $rndSmt[$value]="a";    
    }
    
    echo "<br>";


foreach ($rndSmt as $key => $value) {
//   echo $key ."-kejus ";
  echo $value;
    // echo $key;    
}
var_dump($rndSmt);

echo "<br><br><br>";
echo "hr>";

// $rndSmt["k"];


//// DVIMATIS


$arr =[];
$arr2=[[]];

$klase=[[]];
$klase[0]["name"] = "Vladas";
$klase[0]["surname"] = "Nauseda";
$klase[0]["age"] = "67";
$klase[0]["location"] = "London";

$klase[1]["name"] = "Jokubas";
$klase[1]["surname"] = "Valatka";

$klase[2]["name"] = "Liutauras";
$klase[2]["surname"] = "Gryzdys";

$klase[3]["name"] = "Ona";
$klase[3]["surname"] = "Mazikiene";

// unset ($arr2=[[]];)


// foreach ($klase as $key => $mokinys) {
// //    echo $mokinys. ", ";
//     echo $mokinys["name"]. ", ";
// }

foreach ($klase as $key => $mokinys) {
    foreach ($mokinys as $key => $duomuo) {
        echo $duomuo. " ";
    }
    echo "<br>";
}



var_dump($klase);
print_r($klase);


///// 

// $arrDuoble=[][];
$arrDuoble[0][0] = "petras";

var_dump($arrDuoble);
?>