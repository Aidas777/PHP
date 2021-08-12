<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* h3 :not(.none) { */
        h3:not(.none){
            width 100%;
            text-align: center;
            background-color: lightgrey;
        }

    </style>
</head>
<body>


<?php //-------------------1-------------------------

    echo "<h3>"."1. Uzduotis"."</h3>"; 

    $name="Aidas";
    $surn="Merlov";

    $bDate= strtotime("1977.03.04");
    $siand= strtotime("now");

    // echo $bDate;
    // echo "<br>";
    // echo $siand;
    // echo "<br>";

    $mskirt = $siand-$bDate;
    // echo $mskirt;


 
    $sekMetuos = 60*60*24*365;
    $metu = intval($mskirt/$sekMetuos);


    // echo "<h1>". "Aš esu ".$name." ".$surn.". Gimau ".$bDate." metais."."</h1>";
    // echo $siand;
    echo "<p>". "Aš esu ".$name." ".$surn.". Man yra  ".$metu." metai(-ų)."."</p>";
?>

<?php //-------------------2-------------------------

echo "<h3>"."2. Uzduotis"."</h3>";


$rnd1=rand(0, 4);
$rnd2=rand(0, 4);

echo "Pirmas skaicius:" .$rnd1." / Antras skaicius: ".$rnd2;
echo "<br>";

if($rnd1==0 or $rnd2==0) {
    $atsa="dalyba is 0 NEGALIMA !";
    goto vsio;
}

if($rnd1==$rnd2) {
    $atsa="1.00 skiciai lygus !";
}

if($rnd1>$rnd2 && $rnd1!=0 && $rnd2) {
    $at = $rnd1 / $rnd2;
    $kaip="pirmas padalintas is antro";
    $atsak = number_format((float)$at,2);
    $atsa=$atsak ." ".$kaip;
}
if($rnd1<$rnd2){
    $at = $rnd2 / $rnd1;
    $kaip="antras padalintas is pirmo";
    $atsak = number_format((float)$at,2);
    $atsa= $atsak." ".$kaip;
}
vsio:

echo $atsa;
// number_format((float)$atsa,2);

?>

<?php //-------------------3-------------------------
echo "<h3>"."3. Uzduotis"."</h3>";
$a=rand(0, 25);
$b=rand(0, 25);
$c=rand(0, 25);

echo $a." ".$b." ".$c ."<br>";

if($a>$b and $a<$c) {
    $vid="Kintamasis su vidurine reiksme yra: " .$a;
}

if($b>$a and $b<$c) {
    $vid="Kintamasis su vidurine reiksme yra: " .$b;
}

if($c>$a and $c<$b) {
    $vid="Kintamasis su vidurine reiksme yra: " .$c;
}

if($a>$c and $a<$b) {
    $vid="Kintamasis su vidurine reiksme yra: " .$a;
}

if($b<$a and $b>$c) {
    $vid="Kintamasis su vidurine reiksme yra: " .$b;
}

if($c<$a and $c>$b) {
    $vid="Kintamasis su vidurine reiksme yra: " .$c;
}

if($a==$b or $b==$c or $a==$c) {
    $vid="vidurinio skaiciaus nera, nes bent 2 skaitmenys yra vienodi !";
}

echo $vid;

?>

<?php //-------------------4-------------------------
echo "<h3>"."4. Uzduotis"."</h3>";

$a=rand(0, 10);
$b=rand(0, 10);
$c=rand(0, 10);
echo "Krastiniu ilgiai: " . $a." ".$b." ".$c ."<br>";

$rezult="Trikampi sudaryti galime";
if( ($a + $b)<$c or ($b + $c)<$a or ($a + $c)<$b ) {
    $rezult="Trikampio sudaryti NEgalime";
}

echo $rezult;
   
?>

<?php //-------------------5-------------------------
echo "<h3>"."5. Uzduotis"."</h3>";

$a=rand(0, 2);
$b=rand(0, 2);
$c=rand(0, 2);
$d=rand(0, 2);

echo $a. $b. $c. $d ."<br>";

$nuliu=0;
if($a==0) {
    $nuliu++;
}
if($b==0) {
    $nuliu++;
}
if($c==0) {
    $nuliu++;
}
if($d==0) {
    $nuliu++;
}

$vienetu=0;
if($a==1) {
    $vienetu++;
}
if($b==1) {
    $vienetu++;
}
if($c==1) {
    $vienetu++;
}
if($d==1) {
    $vienetu++;
}

$dvejetu=0;
if($a==2) {
    $dvejetu++;
}
if($b==2) {
    $dvejetu++;
}
if($c==2) {
    $dvejetu++;
}
if($d==2) {
    $dvejetu++;
}



$rez0=($nuliu>0)? $nuliu : "nera";
$rez1=($vienetu>0)? $vienetu : "nera";
$rez2=($dvejetu>0)? $dvejetu : "nera";




echo "Nuliu: " . $rez0 .", Vienetu: ". $rez1 .", Dvejetu: " .$rez2;

?>

<?php //-------------------6-------------------------
echo "<h3>"."6. Uzduotis"."</h3>";

$sk6=rand(1, 6);

echo "<h".$sk6." class='none'>".  $sk6  ."</h".$sk6.">";

?>

<?php //-------------------7-------------------------
echo "<h3>"."7. Uzduotis"."</h3>";

$a=rand(-10, 10);
$b=rand(-10, 10);
$c=rand(-10, 10);

echo $a.", ".$b.", ".$c ."<br>";

if ($a<0) {
    $colorA="green";
} else{
    $colorA="blue";
}

if ($a==0) {
    $colorA="red";
}

if ($b<0) {
    $colorB="green";
} else{
    $colorB="blue";
}

if ($b==0) {
    $colorB="red";
}

if ($c<0) {
    $colorC="green";
} else{
    $colorC="blue";
}

if ($c==0) {
    $colorC="red";
}

echo "<h4 style=color:" .$colorA .">". $a ."</h4>";
echo "<h4 style=color:" .$colorB .">". $b ."</h4>";
echo "<h4 style=color:" .$colorC .">". $c ."</h4>";

?>

<?php //-------------------8-------------------------
echo "<h3>"."8. Uzduotis"."</h3>";

$kiekZv=rand(5,3000);
$kain=1;

if ($kiekZv<1000) {
    $nuol=0;
}

if ($kiekZv>1000) {
    $nuol=3;
}

if ($kiekZv>2000) {
    $nuol=4;
}

$sum=($kiekZv * $kain)*(1-($nuol/100));


echo "Zvakiu kiekis: " .$kiekZv .", o visa kaina su ". $nuol ."% nuolaida: " . $sum . " eur";

?>

<?php //-------------------9-------------------------
echo "<h3>"."9. Uzduotis"."</h3>";

$a=rand(0, 100);
$b=rand(0, 100);
$c=rand(0, 100);

echo $a.", ".$b.", ".$c ."<br>";

$oeVid=($a+$b+$c)/3;

echo "Vidurkis: " . round($oeVid,0) . "<br>";

$skSk=3;
if($a<10 or $a>90) {
    $a=0;
    $skSk--;
}
if($b<10 or $b>90) {
    $b=0;
    $skSk--;
}
if($c<10 or $c>90) {
    $c=0;
    $skSk--;
}

$beVid =($a+$b+$c)/$skSk;

echo "Vidurkis be skaiciu iki 10 ir be virs 90: " . round($beVid,0);

?>

<?php //-------------------10-------------------------
echo "<h3>"."10. Uzduotis"."</h3>";

$h=rand(0, 23);
$m=rand(0, 59);
$s=rand(0, 59);

$h=($h<10)? 0 .$h : $h;
$m=($m<10)? 0 .$m : $m;
$s=($s<10)? 0 .$s : $s;



echo $h.":".$m.":".$s . "<br>";

$psek=rand(0, 300);
echo "Pridedamos sekundes: " .$psek ."<br>";

$s=$s+$psek;

if ($s>=60) {
    $m = $m+intval($s/60);
    $s= $s % 60;
}

if ($m>=60) {
    $h = $h+intval($m/60);
    $m= $m % 60;
}

if ($h>=24) {
    $h = intval($h/24);
}

// $h=($h<10)? 0 .$h : $h;
$m=($m<10)? 0 .$m : $m;
$s=($s<10)? 0 .$s : $s;

echo $h.":".$m.":".$s . "<br>";

?>

<?php //-------------------11-------------------------
echo "<h3>"."11. Uzduotis"."</h3>";

$sk1=rand(1000, 9999);
$sk2=rand(1000, 9999);
$sk3=rand(1000, 9999);

$sk4=rand(1000, 9999);
$sk5=rand(1000, 9999);
$sk6=rand(1000, 9999);

echo $sk1.", ".$sk2.", ".$sk3.", ".$sk4.", ".$sk5.", ".$sk6."<br>";

if ($sk1<$sk2) {
    $temp=$sk1;
    $sk1=$sk2;
    $sk2=$temp;
}

if ($sk2<$sk3) {
    $temp=$sk2;
    $sk2=$sk3;
    $sk3=$temp;
}

if ($sk3<$sk4) {
    $temp=$sk3;
    $sk3=$sk4;
    $sk4=$temp;
}

if ($sk4<$sk5) {
    $temp=$sk4;
    $sk4=$sk5;
    $sk5=$temp;
}

if ($sk5<$sk6) {
    $temp=$sk5;
    $sk5=$sk6;
    $sk6=$temp;
}

// echo "Mezejanciai: " .$sk1.", ".$sk2.", ".$sk3.", ".$sk4.", ".$sk5.", ".$sk6."<br>";
//-----
if ($sk1<$sk2) {
    $temp=$sk1;
    $sk1=$sk2;
    $sk2=$temp;
}

if ($sk2<$sk3) {
    $temp=$sk2;
    $sk2=$sk3;
    $sk3=$temp;
}

if ($sk3<$sk4) {
    $temp=$sk3;
    $sk3=$sk4;
    $sk4=$temp;
}

if ($sk4<$sk5) {
    $temp=$sk4;
    $sk4=$sk5;
    $sk5=$temp;
}

if ($sk5<$sk6) {
    $temp=$sk5;
    $sk5=$sk6;
    $sk6=$temp;
}


// echo "Mezejanciai: " .$sk1.", ".$sk2.", ".$sk3.", ".$sk4.", ".$sk5.", ".$sk6."<br>";
//-----
if ($sk1<$sk2) {
    $temp=$sk1;
    $sk1=$sk2;
    $sk2=$temp;
}

if ($sk2<$sk3) {
    $temp=$sk2;
    $sk2=$sk3;
    $sk3=$temp;
}

if ($sk3<$sk4) {
    $temp=$sk3;
    $sk3=$sk4;
    $sk4=$temp;
}

if ($sk4<$sk5) {
    $temp=$sk4;
    $sk4=$sk5;
    $sk5=$temp;
}

if ($sk5<$sk6) {
    $temp=$sk5;
    $sk5=$sk6;
    $sk6=$temp;
}


// echo "Mezejanciai: " .$sk1.", ".$sk2.", ".$sk3.", ".$sk4.", ".$sk5.", ".$sk6."<br>";

//-----
if ($sk1<$sk2) {
    $temp=$sk1;
    $sk1=$sk2;
    $sk2=$temp;
}

if ($sk2<$sk3) {
    $temp=$sk2;
    $sk2=$sk3;
    $sk3=$temp;
}

if ($sk3<$sk4) {
    $temp=$sk3;
    $sk3=$sk4;
    $sk4=$temp;
}

if ($sk4<$sk5) {
    $temp=$sk4;
    $sk4=$sk5;
    $sk5=$temp;
}

if ($sk5<$sk6) {
    $temp=$sk5;
    $sk5=$sk6;
    $sk6=$temp;
}


// echo "Mezejanciai: " .$sk1.", ".$sk2.", ".$sk3.", ".$sk4.", ".$sk5.", ".$sk6."<br>";

//-----
if ($sk1<$sk2) {
    $temp=$sk1;
    $sk1=$sk2;
    $sk2=$temp;
}

if ($sk2<$sk3) {
    $temp=$sk2;
    $sk2=$sk3;
    $sk3=$temp;
}

if ($sk3<$sk4) {
    $temp=$sk3;
    $sk3=$sk4;
    $sk4=$temp;
}

if ($sk4<$sk5) {
    $temp=$sk4;
    $sk4=$sk5;
    $sk5=$temp;
}

if ($sk5<$sk6) {
    $temp=$sk5;
    $sk5=$sk6;
    $sk6=$temp;
}


echo "Mezejanciai: " .$sk1.", ".$sk2.", ".$sk3.", ".$sk4.", ".$sk5.", ".$sk6."<br>";


?>

</body>
</html>