<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Namu darbai Nr.2</title>

    <style>

        html {
            background-color: rgb(232, 232, 232);
        }

        h4 {
            width: 100%;
            text-align: center;
            font-style: italic;
            background-color: lightgrey;
        }

    </style>


</head>
<body>


<h4>1. Uzduotis</h4>
<!-- ------------------------------------1-------------------------------- -->
<?php

    $vard="Kristiną";
    $pavard="Applegatė";

    echo "Pilnai: " .$vard. " " .$pavard ."<br>";
    echo "Sutrump.: " .substr($vard,0,3). " " .substr($pavard,0,5) ."<br>";


?>


<h4>2. Uzduotis</h4>
<!-- ------------------------------------2-------------------------------- -->
<?php


echo mb_strtoupper($vard, "UTF-8") ." ".mb_strtolower($pavard, "UTF-8") ."<br>";

?>


<h4>3. Uzduotis</h4>
<!-- ------------------------------------3-------------------------------- -->
<?php

$fMix=mb_substr($vard,0,1,"UTF-8").
    mb_substr($pavard,0,1,"UTF-8");

echo $fMix;
?>
    

<h4>4. Uzduotis</h4>
<!-- ------------------------------------4-------------------------------- -->
<?php

echo $vard. " " .$pavard ."<br>";

$fMix=mb_substr($vard,-3, null, "UTF-8").
    mb_substr($pavard,-3, null,"UTF-8");

echo $fMix;
?>


<h4>5. Uzduotis</h4>
<!-- ------------------------------------5-------------------------------- -->
<?php


$txt = "An American in Paris";
echo $txt ."<br>";

$txtC = str_ireplace("a", "*",$txt, $keista);
echo $txtC ."<br>";
echo "Pakeista: " .$keista ."<br>";

?>


<h4>6. Uzduotis</h4>
<!-- ------------------------------------6-------------------------------- -->
<?php

echo $txt ."<br>";
$r1="a";
$r2="A";

$aAsk1=substr_count($txt,$r1);
$aAsk2=substr_count($txt,$r2);
echo $r1 ." raidziu yra: " .$aAsk1 ." / ".
$r2 ." raidziu yra: " .$aAsk2 ." / ".
"Viso: " .($aAsk1+$aAsk2) ."<br>";


?>

<h4>7. Uzduotis</h4>
<!-- ------------------------------------7-------------------------------- -->
<?php

echo $txt ."<br>";
$balsesEnL=array("a","e","i","y","o","u");
// $balsesEnAll=array("A","a","E","e","I","i","Y","y","O","o","U","u");
// $balsesLtAll=array("A","a","Ą","ą","E","e","Ę","ę","Ė","ė","I","i","Į","į","Y","y","O","o","U","u","Ų","ų","Ū","ū");

$txtC=str_ireplace($balsesEnL,"",$txt);
echo $txtC ."<br>";
echo "------------------------"."<br>";

$txtC="Breakfast at Tiffany's";
echo $txtC ."<br>";
$txtC=str_ireplace($balsesEnL,"",$txtC);
echo $txtC ."<br>";
echo "------------------------"."<br>";

$txtC="2001: A Space Odyssey";
echo $txtC ."<br>";
$txtC=str_ireplace($balsesEnL,"",$txtC);
echo $txtC ."<br>";
echo "------------------------"."<br>";

$txtC="It's a Wonderful Life";
echo $txtC ."<br>";
$txtC=str_ireplace($balsesEnL,"",$txtC);
echo $txtC ."<br>";

?>


<h4>8. Uzduotis</h4>
<!-- ------------------------------------8-------------------------------- -->
<?php

$txt='Star Wars: Episode '.str_repeat(' ', rand(0,5)). rand(1,9) . ' - A New Hope';
echo $txt ."<br>";
// echo strlen($txt);

$tmpL="";
$skOut=null;

for ($i=0; $i<strlen($txt); $i++ ){
    $tmpL= substr($txt,$i,1);
    if (is_numeric($tmpL)) {
        $skOut=$skOut .$tmpL;
    }
}

echo "Epizodo Nr: " .$skOut;

?>


<h4>9. Uzduotis</h4>
<!-- ------------------------------------9-------------------------------- -->
<?php


$txt="Don't Be a Menace to South Central While Drinking Your Juice in the Hood";
$txtEN=$txt;

SuLt:


// $txt="Pirms zodinas ir ant zodis";
echo $txt ."<br>";

$tarpas=0;
$iki5=null;
$countas=0;

for ($i=0; $i<strlen($txt); $i++ ){
    $countas++;
    if( substr($txt,$i,1) == " " or substr($txt,$i,1) == "," or ($i+1==strlen($txt)) ) {

        if(($countas-1)<=5) {
            $iki5++;
        }
        $countas=0;
    }

}

// echo is_null($iki5)?"Nieko":$iki5. " rado" ."<br>";
echo "1. Budas. Iki (ir 5) 5 raidziu zodziu cia yra: " .$iki5 ."<br>";

//--------------------

$txt=str_ireplace("'", "*",$txt);


$atskyr="/[ ,]/";
$words=preg_split($atskyr, $txt);
// print_r($words);

$iki52=0;
for ($i=0; $i<count($words); $i++) {
    if(strlen($words[$i]) <=5) {
        $iki52++;
    }
}

echo "2. Budas. Iki (ir 5) 5 raidziu zodziu cia yra: " .$iki52 ."<br>";

if (strpos($txt, "Menace")==true) {
    $txt="Tik nereikia gąsdinti Pietų Centro, geriant sultis pas save kvartale";
    echo "------------------------------------------"."<br>";
    goto SuLt;
}

?>


<h4>10. Uzduotis</h4>
<!-- ------------------------------------10-------------------------------- -->
<?php

echo "Atsitiktinis 'stringas':"."<br>";

$rTxt=null;
for ($i=0; $i<3;$i++) {
    $randTxt=chr((rand(97,122)));
    $rTxt=$rTxt. $randTxt;
}

echo $rTxt ."<br>";

?>


<h4>11. Uzduotis</h4>
<!-- ------------------------------------11-------------------------------- -->
<?php

$txtLT=$txt;

echo "(EN) " .$txtEN ."<br>";
echo "(LT) " .$txtLT ."<br>";

// $txtEN=str_ireplace("'", "*",$txtEN);
$txtLT=str_replace(",", "",$txtLT);

$wordsEN=preg_split($atskyr, $txtEN);
$wordsLT=preg_split($atskyr, $txtLT);

// print_r($wordsEN)."<br>";
// print_r($wordsLT)."<br>";

$worsdAll = array_merge($wordsEN, $wordsLT);
echo "------------------------------------------"."<br>";
// print_r($worsdAll)."<br>";

$wSk=null;
$woo1=null;
$woo10=null;

$worsAllLen=count($worsdAll);
// echo $worsAllLen;
for ($t=0;$t<10;$t++) {
    $wSk=rand(0,$worsAllLen-1);
    $woo1=$worsdAll[$wSk];

    // echo "wSk: " .$wSk. " ///woo1:" .$woo1 ."<br>";

    if ($woo10 !=null) {
        if (strpos($woo10,$woo1)==false) {
            $woo10=$woo10 ." ".$woo1;
        } else {
            $t--;
        }
    } else {
        $woo10=$woo10 ." ".$woo1;
    }
}

echo $woo10."<br>";

?>
</body>
</html>