<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Namu darbai Nr.6 (funkijos)</title>

    <style>

        html {
            background-color: rgb(232, 232, 232);
            margin: 0 auto;
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
<!-- /////////////////////////////////////////////////// 1 /////////////////////////////////////////////////// -->

<?php
// Parašykite funkciją, kurios argumentas būtų tekstas, kuris yra įterpiamas į h1 tagą;

$text="Labas baobabas";
tag_H1($text);

function tag_H1($txt) {
    echo "<h1>H1 tekstas php-e: ".$txt."</h1>";
}

function tagH1($text) {
    echo $text;
}

?>
<h1><?= tagH1("Tekstas tage") ?></h1>


<h4>2. Uzduotis</h4>
<!-- /////////////////////////////////////////////////// 2 /////////////////////////////////////////////////// -->

<?php
// Parašykite funkciją su dviem argumentais, pirmas argumentas tekstas, įterpiamas į h tagą, o antrasis tago numeris (1-6).
// Rašydami šią funkciją remkitės pirmame uždavinyje parašytą funkciją;

$text="Labas krabas";
$sz=2;
tagSz($text, $sz);

function tagSz($txt, $s=6) {
    echo "<h".$s.">" ."h" .$s ." tagas ". $txt."</h".$s.">";
}

?>


<h4>3. Uzduotis</h4>
<!-- /////////////////////////////////////////////////// 3 /////////////////////////////////////////////////// -->

<?php
// Generuokite atsitiktinį stringą, pasinaudodami kodu md5(time()). Visus skaitmenis stringe įdėkite į h1 tagą.
// Raides palikite.
// Jegu iš eilės eina keli skaitmenys, juos į tagą reikią dėti kartu (h1 atsidaro prieš pirmą ir užsidaro po paskutinio)
// Keitimui naudokite pirmo patobulintą (jeigu reikia) uždavinio funkciją ir preg_replace_callback();

$rndStr = md5(time());
echo $rndStr ."<br>";
echo "<br>";

$mdSk=null;

for ($i=0; $i < strlen($rndStr); $i++) { 
   if (   is_numeric($rndStr[$i])   ) {
       $mdSk=$mdSk ." ".$rndStr[$i];
//        echo "<h1>". $rndStr[$i] ."</h1>";
//    } else {
//        echo "<span>". $rndStr[$i] ."</span>";
   }
}
echo "<h1>". $mdSk ."</h1>";

?>



<h4>4. Uzduotis</h4>
<!-- /////////////////////////////////////////////////// 4 /////////////////////////////////////////////////// -->
<?php
// Parašykite funkciją, kuri skaičiuotų, iš kiek sveikų skaičių jos argumentas dalijasi be liekanos (išskyrus vienetą ir patį save)
// Argumentą užrašykite taip, kad būtų galima įvesti tik sveiką skaičių;
$skc=256;

$Psk = PirmF($skc);

if ($Psk) {
    echo "argumentas (". $skc .") dalijasi be liekanos is " .$Psk ." skaitmenu."."<br>";
} else {
    echo "Iveskite sveika skaiciu, be po kalbio !!!"."<br>";
}

function PirmF($sk) {
    if (   ! is_int($sk)   ) {
        // echo "Iveskite sveika skaiciu, be po kalbio !!!"."<br>";
        return false;
    }

    $count=0;
    for ($i=2; $i < $sk; $i++) { 
        if ($sk % $i ==0) {
            $count++;
        }
    }
    return $count;
    // echo "argumentas (". $sk .") dalijasi be liekanos is " .$count ." skaitmenu."."<br>";
}
// echo '<script>alert("Ka tu cia darai ?")</script>';

?>



<h4>5. Uzduotis</h4>
<!-- /////////////////////////////////////////////////// 5 /////////////////////////////////////////////////// -->
<?php
// Sugeneruokite masyvą iš 100 elementų, kurio reikšmės atsitiktiniai skaičiai nuo 33 iki 77.
// Išrūšiuokite masyvą pagal daliklių be liekanos kiekį mažėjimo tvarka, panaudodami ketvirto uždavinio funkciją.

for ($i=0; $i < 100 ; $i++) { 
    $arrSS[]=rand(33, 77);
}

$arrSSLen=count($arrSS);

for ($i=0; $i < $arrSSLen; $i++) { 
    // echo $arrSS[$i] ." dalikliu skaicius: " .PirmF($arrSS[$i])."<br>";
    for ($y=0; $y <$arrSSLen ; $y++) { 
        if (PirmF($arrSS[$i])>PirmF($arrSS[$y])) {
            $tempi=$arrSS[$i];
            $arrSS[$i]=$arrSS[$y];
            $arrSS[$y]=$tempi;
        }
    }
}

for ($i=0; $i <$arrSSLen; $i++) { 
    echo $arrSS[$i] ." dalikliu skaicius: " .PirmF($arrSS[$i])."<br>";
}

// var_dump($arrDD);

?>



<h4>6. Uzduotis</h4>
<!-- /////////////////////////////////////////////////// 6 /////////////////////////////////////////////////// -->
<?php
// Sugeneruokite masyvą iš 100 elementų, kurio reikšmės atsitiktiniai skaičiai nuo 333 iki 777.
// Naudodami 4 uždavinio funkciją iš masyvo ištrinkite pirminius skaičius.

for ($i=0; $i < 100 ; $i++) { 
    $arrSSS[]=rand(333, 777);
}

$arrSSSLen=count($arrSSS);

for ($i=0; $i <$arrSSSLen ; $i++) { 
    echo $arrSSS[$i] .", ";
}
// var_dump($arrSSS);

for ($i=0; $i < $arrSSSLen; $i++) { 
    if (   PirmF($arrSSS[$i]) ==0    ) {
        unset($arrSSS[$i]);
    }
}
echo "<hr>";

echo "Pirminiai istrinti:"."<br>";

$arrSSS=array_values($arrSSS);
for ($i=0; $i <count($arrSSS) ; $i++) { 
    echo $arrSSS[$i] .", ";
}

?>


<h4>7. Uzduotis</h4>
<!-- /////////////////////////////////////////////////// 7 /////////////////////////////////////////////////// -->
<?php
// Sugeneruokite atsitiktinio (nuo 10 iki 20) ilgio masyvą, kurio visi, išskyrus paskutinį, elementai yra
// atsitiktiniai skaičiai nuo 0 iki 10, o paskutinis masyvas, kuris generuojamas pagal tokią pat salygą kaip ir pirmasis masyvas.
// Viską pakartokite atsitiktinį nuo 10 iki 30  kiekį kartų.
// Paskutinio masyvo paskutinis elementas yra lygus 0;


// MakeArr(5);
// $arrOuter=[];

// $circles=rand(10, 30);
$circles=2;

function MakeArr($n) {
    $arrOuter=[];
    if ($n<=0) {
        return;
    }
    $arrLen=rand(10, 20);
    for ($i=0; $i < $arrLen-1 ; $i++) { 
        $arrOuter[]=rand(0, 10);
    }
    if ($n>1) {
        $arrOuter[]=MakeArr($n-1);
    } else {
        $arrOuter[count($arrOuter)-1]=0;
    }
    return $arrOuter;
}

// $arrLen=rand(10, 20);
// for ($i=0; $i < $arrLen-1; $i++) { 
//     $arrInner[]=rand(0, 10);
// }

// $arrOuter[]=$arrInner;

// var_dump(MakeArr(5));
echo "<br>";
// echo json_encode(MakeArr(5));
// echo "<br>";
// var_export(MakeArr(5));
// echo "<br><br>";
$arrBig=MakeArr($circles);
print_r($arrBig);
// echo "<hr>";
// print_r(MakeArr($circles));

?>


<h4>8. Uzduotis</h4>
<!-- /////////////////////////////////////////////////// 8 /////////////////////////////////////////////////// -->
<?php
// Suskaičiuokite septinto uždavinio elementų, kurie nėra masyvai, sumą.
// Skaičiuoti reikia visuose masyvuose ir submasyvuose.

// echo count($arrBig);
var_dump($arrBig);
$sumaSk=0;
$allSum=0;

// $allSum=null;
function DisArr($arr, $sumaSk) {
    $sumaSk;
    $allSum;
    foreach ($arr as $key => $value) {
        if ( is_array($value) ) {
            DisArr($value, $sumaSk);
        } else {
            // echo $value .", ";
            $sumaSk = $sumaSk + $value;
        }
        // $allSum=$allSum + $sumaSk;
    }
    
    return $sumaSk;
}

echo "Masyvu skaitmenu suma: " .DisArr($arrBig, 0) ."<br>";

?>
</body>
</html>