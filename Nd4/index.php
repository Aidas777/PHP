<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Namu darbai - Masyvai</title>

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
// Sugeneruokite masyvą iš 30 elementų (indeksai nuo 0 iki 29), kurių reikšmės yra atsitiktiniai skaičiai nuo 5 iki 25.


for ($i=0; $i<30; $i++) {
    $arr[]=rand(5, 25);
}

$arrLen=count($arr);

for ($i=0; $i < $arrLen ; $i++) { 
    echo $arr[$i] ." ";
}

// print_r($arr);

?>

<h4>2. Uzduotis</h4>
<!-- /////////////////////////////////////////////////// 2 /////////////////////////////////////////////////// -->

<?php

///////////////////////////////////////////////////////// Naudodamiesi 1 uždavinio masyvu:
//////////////////////////////////// A
// Suskaičiuokite kiek masyve yra reikšmių didesnių už 10;
echo "<p>a)</p>";

//------------------------- Su for

$over10=null;
for ($i=0; $i<$arrLen; $i++) {
    if ($arr[$i]>10){
        $over10++;
    }
}
echo "Virs 10 (su 'for') yra: " . $over10 . " skaitmenys(-u)." ."<br>";


//------------------------- Su forEACH
$over10=null;
foreach ($arr as $key => $value) {
    !($value >10)? :$over10++;
}
echo "Virs 10 (su 'forEACH') yra: " . $over10 . " skaitmenys(-u)."."<br>";



//////////////////////////////////// B
//Raskite didžiausią masyvo reikšmę ir jos indeksą arba indeksus jeigu yra keli;
echo "<p>b)</p>";

$maxVal=max($arr);
$maxKey=array_keys($arr, $maxVal);

echo "Didziausia reiksme: " .$maxVal ."<br>";
echo "Jos indexai (-as): ";
foreach ($maxKey as $key) {
    echo $key ." ";
}


//////////////////////////////////// C
//Suskaičiuokite visų porinių (lyginių) indeksų reikšmių sumą;
echo "<p>c)</p>";

$evenSum=0; #lyginiu indexu reiksmiu suma

echo "Lyginiai indexai:"."<br>";
for ($i=0; $i < $arrLen; $i+=2) { 
    $evenSum=$evenSum + $arr[$i];
    echo $arr[$i] ." ";
}
echo "<br><br>";
echo "Lyginiu indexu reiksmiu suma: " .$evenSum ."<br>";


//////////////////////////////////// D
//Sukurkite naują masyvą, kurio reikšmės yra 1 uždavinio masyvo reikšmes minus tos reikšmės indeksas;
echo "<p>d)</p>";

for ($i=0; $i < $arrLen ; $i++) { 
    $arrLower[] = $arr[$i] - $i;
}
echo "Masyvo reikšmes minus tos reikšmės indeksas:"."<br>";
for ($i=0; $i < $arrLen ; $i++) { 
    echo $arrLower[$i] ." ";
}


//////////////////////////////////// E
//Papildykite masyvą papildomais 10 elementų su reikšmėmis nuo 5 iki 25, kad bendras masyvas padidėtų iki indekso 39;
echo "<p>e)</p>";

for ($i=0; $i < 9 ; $i++) { 
    $arrLower[]=rand(5, 25);
}

$arrLoLen=count($arrLower); # minusuoto masyvo dydis

echo "Papildyto masyvo dydis: " .$arrLoLen."<br>";
for ($i=0; $i < $arrLoLen ; $i++) { 
    echo $arrLower[$i] ." ";
}


//////////////////////////////////// F
//Iš masyvo elementų sukurkite du naujus masyvus. Vienas turi būti sudarytas iš neporinių indekso reikšmių, o kitas iš porinių;
echo "<p>f)</p>";

for ($i=0; $i < $arrLoLen; $i++) { 
    if ($i % 2 ==0) {
        $arrLowerLyg[]=$arrLower[$i];
    } else {
        $arrLowerNELyg[]=$arrLower[$i];
    }
}

echo "Gautas NElyginiu indexu masyvas:". "<br>";
for ($i=0; $i < count($arrLowerNELyg) ; $i++) { 
    echo $arrLowerNELyg[$i] ." ";
}
echo "<br>";

echo "Gautas lyginiu indexu masyvas:" ."<br>";
for ($i=0; $i < count($arrLowerLyg) ; $i++) { 
    echo $arrLowerLyg[$i] ." ";
}


//////////////////////////////////// G
//Pirminio masyvo elementus su poriniais indeksais padarykite lygius 0 jeigu jie didesni už 15;
echo "<p>g)</p>";

// $arrLen

for ($i=0; $i < $arrLen ; $i++) { 
    if ($arr[$i]>15) {
        $arr[$i]=0;
    }
}

for ($i=0; $i < $arrLen ; $i++) { 
        echo $arr[$i] ." ";
}


//////////////////////////////////// H
//Suraskite pirmą (mažiausią) indeksą, kurio elemento reikšmė didesnė už 10;
echo "<p>h)</p>";

echo "Pirmas indeksas, kurio elemento reikšmė didesnė už 10 (pagal g punkto masyva): "."<br>";
foreach ($arr as $key => $value) {
    if($value>10) {
        echo $key ." ";
        break;
    } 
}

//////////////////////////////////// I
//Naudodami funkciją unset() iš masyvo ištrinkite visus elementus turinčius porinį indeksą;
echo "<p>i)</p>";

for ($i=0; $i < $arrLen ; $i+=2) { 
    unset($arr[$i]);
    // $arr = array_values($arr);
}

echo "Ištrynus visus porius indeksus, liko sie: "."<br>";
foreach ($arr as $key => $value) {
    echo "key".$key.": " .$value ." , ";
}

?>

<h4>3. Uzduotis</h4>
<!-- /////////////////////////////////////////////////// 3 /////////////////////////////////////////////////// -->
<!-- Sugeneruokite masyvą, kurio reikšmės atsitiktinės raidės A, B, C ir D, o ilgis 200. Suskaičiuokite kiek yra kiekvienos raidės. -->

<?php

for ($i=0; $i < 200 ; $i++) { 
   $arr200[]=chr(rand(65,68));
}
$arr200Len=count($arr200);

for ($i=0; $i < $arr200Len; $i++) { 
    echo $arr200[$i] ." ";
}

echo "<br><br>";

$arrABCD=array_count_values($arr200);

foreach ($arrABCD as $key => $value) {
    echo $key ." raidziu yra ".$value. "; ";
}
    
?>


<h4>4. Uzduotis</h4>
<!-- /////////////////////////////////////////////////// 4 /////////////////////////////////////////////////// -->
<!-- Išrūšiuokite 3 uždavinio masyvą pagal abecėlę. -->

<?php

$lett="";
sort($arr200);
for ($i=1; $i < $arr200Len; $i++) {
    // if ($lett != $arr200[$i]) {
    //     echo $lett ." ";
    // }
    $lett= $arr200[$i];
    echo $lett ." ";
}

?>


<h4>5. Uzduotis</h4>
<!-- /////////////////////////////////////////////////// 5 /////////////////////////////////////////////////// -->
<!-- Sugeneruokite 3 masyvus pagal 3 uždavinio sąlygą. Sudėkite masyvus, sudėdami atitinkamas reikšmes.
Paskaičiuokite kiek unikalių (po vieną, nesikartojančių) reikšmių ir kiek unikalių kombinacijų gavote. -->

<?php

for ($i=0; $i < 200 ; $i++) { 
    $arr2001[]=chr(rand(65,68));
    $arr2002[]=chr(rand(65,68));
    $arr2003[]=chr(rand(65,68));

    $arr200Sum[]=$arr2001[$i] .$arr2002[$i] .$arr2003[$i];
}
$arr2001Len=count($arr2001);

echo "Pirmas masyvas:"."<br>";
for ($i=0; $i < $arr2001Len; $i++) { 
    echo $arr2001[$i] ." ";
}
echo "<br><br>";

echo "Antras masyvas:"."<br>";
for ($i=0; $i < $arr2001Len; $i++) { 
    echo $arr2002[$i] ." ";
}
echo "<br><br>";

echo "Trecias masyvas:"."<br>";
for ($i=0; $i < $arr2001Len; $i++) { 
    echo $arr2003[$i] ." ";
}
echo "<br><br>";

echo "Sudetas masyvas:"."<br>";
for ($i=0; $i < count($arr200Sum); $i++) { 
    echo $arr200Sum[$i] ." ";
}
echo "<br><br>";

echo "Unikaliu (gali kartotis) raidziu deriniu yra: ";
// print_r(array_unique($arr200Sum));
// echo "<br><br>";
$unicArr200Sum=array_unique($arr200Sum);
$unicNr200Sum=count($unicArr200Sum);
echo $unicNr200Sum ."<br>";
echo "Unikalus (nesikartojantys) reiksmiu deriniai: ";
// echo count(array_unique($unicArr200Sum));

// print_r(count(array_count_values($arr200Sum)));
// print_r(array_search($arr200Sum, array_count_values($arr200Sum)));

$unic=null;
$count=null;
for ($i=0; $i < count($arr200Sum) ; $i++) { 
    $unic=0;
    $single=true;
    for ($y=0; $y < count($arr200Sum) ; $y++) { 
        if ($arr200Sum[$i] == $arr200Sum[$y]) {
            $unic++;
            // echo "unic:" . $unic ."Single: " . json_encode($single) ." ";
            if ($unic>1) {
                $single=false;
                break;
            }
        }
    }
    if ($single==true) {
        $count++;
    }
}
echo $count;

?>


<h4>6. Uzduotis</h4>
<!-- /////////////////////////////////////////////////// 6 /////////////////////////////////////////////////// -->
<!-- Sugeneruokite du masyvus, kurių reikšmės yra atsitiktiniai skaičiai nuo 100 iki 999. Masyvų ilgiai 100.
Masyvų reikšmės turi būti unikalios savo masyve (t.y. neturi kartotis). -->

<?php

$arr101=[];
$arr102=[];

for ($i=0; $i <100 ; $i++) { 
    $rndSk = rand(100, 999);
    if (in_array($rndSk, $arr101) == false) {
        $arr101[]=$rndSk;
    } else {
        $i--;
    }
}

for ($i=0; $i <100 ; $i++) { 
    $rndSk = rand(100, 999);
    if (in_array($rndSk, $arr102) == false) {
        $arr102[]=$rndSk;
    } else {
        $i--;
    }
}

$arrLen=count($arr101);
// echo "arrLen:" .$arrLen ." /// arrLen2:" .$arrLen2;

sort($arr101);
sort($arr102);

echo "Pirmas masyvas:" ."<br>";
for ($i=0; $i <$arrLen ; $i++) { 
    // echo $arr101[$i]. " /// " .$arr102[$i]. " ";
    echo $arr101[$i]. " ";
}
echo "<br><br>";
echo "Antras masyvas:" ."<br>";
for ($i=0; $i <$arrLen ; $i++) { 
    echo $arr102[$i]. " ";
}

?>

<h4>7. Uzduotis</h4>
<!-- /////////////////////////////////////////////////// 7 /////////////////////////////////////////////////// -->
<!-- Sugeneruokite masyvą, kuris būtų sudarytas iš reikšmių, kurios yra pirmame 6 uždavinio masyve, bet nėra antrame 6 uždavinio masyve.
 -->

<?php

$arr100S=[];

for ($i=0; $i <$arrLen ; $i++) { 
    $same=false;
    for ($y=0; $y <$arrLen ; $y++) { 
       if ( $arr101[$i] ==  $arr102[$y]) {
        $same=true;
        break;
       }
    }
    if ($same==false) {
        $arr100S[]=$arr101[$i];
    }
}
echo "Pirmojo masyvo reiksmes, kuriu nera antrajame (is 6 uzd.):"."<br>";
for ($i=0; $i < count($arr100S); $i++) { 
   echo $arr100S[$i]. " ";
}


?>


<h4>8. Uzduotis</h4>
<!-- /////////////////////////////////////////////////// 8 /////////////////////////////////////////////////// -->
<!-- Sugeneruokite masyvą iš elementų, kurie kartojasi abiejuose 6 uždavinio masyvuose. -->

<?php

$arr100Same=[];

for ($i=0; $i <$arrLen ; $i++) { 
    $same=false;
    for ($y=0; $y <$arrLen ; $y++) { 
       if ( $arr101[$i] ==  $arr102[$y]) {
        $same=true;
        break;
       }
    }
    if ($same==true) {
        $arr100Same[]=$arr101[$i];
    }
}
echo "Elementai, kurie kartojasi abiejuose 6 uždavinio masyvuose"."<br>";
for ($i=0; $i < count($arr100Same); $i++) { 
   echo $arr100Same[$i]. " ";
}

?>


<h4>9. Uzduotis</h4>
<!-- /////////////////////////////////////////////////// 9 /////////////////////////////////////////////////// -->
<!-- Sugeneruokite masyvą, kurio indeksus sudarytų pirmo 6 uždavinio masyvo reikšmės, o jo reikšmės iš būtų antrojo masyvo. -->

<?php

for ($i=0; $i < $arrLen; $i++) { 
   $arrInd1Val2[$arr101[$i]]=$arr102[$i];
}

// print_r($arrInd1Val2);

echo "Masyvas, kurio indeksus sudaro pirmo 6 uždavinio masyvo reikšmės, o jo reikšmės yra iš antrojo masyvo:"."<br>";
foreach ($arrInd1Val2 as $indexas => $reiksme) {
    echo "Ind:" .$indexas ."(Val:". $reiksme .")  ";
}

?>


<h4>10. Uzduotis</h4>
<!-- /////////////////////////////////////////////////// 10 /////////////////////////////////////////////////// -->
<!-- Sugeneruokite 10 skaičių masyvą pagal taisyklę:
 Du pirmi skaičiai- atsitiktiniai nuo 5 iki 25.
  Trečias, pirmo ir antro suma.
  Ketvirtas- antro ir trečio suma.
  Penktas trečio ir ketvirto suma ir t.t. -->

<?php

for ($i=0; $i < 10; $i++) { 
    if($i<2){
        $arrS[] = rand(5, 25);
    } else {
        $arrS[]=$arrS[$i-1] + $arrS[$i-2];
    }
//    $arrS[] = $i<2? rand(5, 25): "";
}

echo "10 skaičių masyvas pagal 10 uzd. taisykles:"."<br>";

for ($i=0; $i < count($arrS); $i++) { 
    echo $arrS[$i] ." ";
}
// echo "<br><br>";
// echo count($arrS);

?>


<h4>11. Uzduotis</h4>
<!-- /////////////////////////////////////////////////// 11 /////////////////////////////////////////////////// -->
<!-- Sugeneruokite 101 elemento masyvą su atsitiktiniais skaičiais nuo 0 iki 300.
 Reikšmes kurios tame masyve yra ne unikalios pergeneruokite iš naujo taip, kad visos reikšmės masyve būtų unikalios.
  Išrūšiuokite masyvą taip, kad jo didžiausia reikšmė būtų masyvo viduryje, o einant nuo jos link masyvo pradžios ir pabaigos reikšmės mažėtų.
  Paskaičiuokite pirmos ir antros masyvo dalies sumas (neskaičiuojant vidurinės).
  Jeigu sumų skirtumas (modulis, absoliutus dydis) yra didesnis nei | 30 | rūšiavimą kartokite.
  (Kad sumos nesiskirtų viena nuo kitos daugiau nei per 30) -->

<?php

//SUKURIAM PIRMINI MASYVA
for ($i=0; $i <101 ; $i++) { 
    $arrManipulate[]=rand(0, 300);
}

//PASKAICUOJAM PIRMINIO MASYVO ILGI
$arrManipLen=count($arrManipulate);
// sort($arrManipulate);

echo "Pirminis masyvas:" ."<br>";
for ($i=0; $i <$arrManipLen; $i++) { 
    echo $arrManipulate[$i] ." ";
}
// //////////////////////////////////////////////////////
// velSukam:

// for ($i = 0; $i < $arrManipLen; $i++) { 
//     $same=0;
//     for ($y=0; $y < $arrManipLen; $y++) { 
//         if ($arrManipulate[$i] == $arrManipulate[$y]) {
//             ++$same;
//             // break;
//         }
//     }
//     if($same > 1) {
//         for ($j=0; $j < $arrManipLen; $j++) { 
//             $rndReDo=rand(0, 300);
//             $sameReDo=0;

//             for ($k=0; $k < $arrManipLen; $k++) { 
//                 if ($rndReDo == $arrManipulate[$k]) {
//                     ++$sameReDo;
//                 }
//             }
//             if ($sameReDo > 1) {
//                 $k--;
//                 $j--;
//                 $i--;
//                 break;
//             }else{
//                 $arrManipulate[$i]=$rndReDo;
//             }

//         }
//     }
// }

// if ( max(array_count_values($arrManipulate))>1 ) {
//     goto velSukam;
// }
// //////////////////////////////////////////////////////

//RANDAM PASIKARTOJANCIUS ELEMENTUS IR JIEMS ISNAUJO SUGENERUOJAM IR PRISKIRIAM ATSITIKTINI SKAICIU,
//PRIES TAI PATIKRINUS AR TOKIO MASYVE NERA 
for ($i = 0; $i < $arrManipLen; $i++) { 
    $same=0;
    for ($y=0; $y < $arrManipLen; $y++) { 
        if ($arrManipulate[$i] == $arrManipulate[$y]) {
            ++$same;
        }
    }
    if($same > 1) {
        $rndReDo=rand(0, 300);
        $sameReDo=0;
        for ($k=0; $k < $arrManipLen; $k++) { 
            if ($rndReDo == $arrManipulate[$k]) {
                ++$sameReDo;
            }
        }
            if ($sameReDo > 0) {
                 $i--;
                $rndReDo=rand(0, 300);
            }else{
                $arrManipulate[$i]=$rndReDo;
                $sameReDo=0;
            }
    }
}

//////////////////////////////////////////////////////

//ATVAIZDUOJAM PERTAISYTA MASYVA
echo "<br><br>";
echo "Masyvas su pakeistom i UNIkalias reiksmes is buvusiu NEunikaliu:" ."<br>";
for ($i=0; $i <$arrManipLen; $i++) { 
    echo $arrManipulate[$i] ." ";
}
echo "<br><br>";

//ISRIKIUOJAM DID.TVARKA PERTAISYTA MASYVA
sort($arrManipulate);
//ATVAIZDUOJAM ISRIKIUOTA PERTAISYTA MASYVA
echo "(Tik Perziurai) Isrikiuotas masyvas su pakeistom i UNIkalias reiksmes is buvusiu NEunikaliu:" ."<br>";
for ($i=0; $i <$arrManipLen; $i++) { 
    echo $arrManipulate[$i] ." ";
}


//PASITIKRINAM AR VISGI NERA PASIKARTOJIMU
echo "<br>";
echo "Didziausias pasikartojimu skaicius:" .(max(array_count_values($arrManipulate)));
echo "<br>";

// print_r(array_count_values($arrManipulate));

$arrABCD=array_count_values($arrManipulate);
foreach ($arrABCD as $key => $value) {
    if ($value>1) {
        echo $key ." skaicius kartojasi ".$value. "/// ";
    }
}

//IMAM DESINE (NUO VIDURIO) ISRIKIUOTO DID.TVARKA MASYVO DALI
echo "<br><hr><br>";
for ($i=$arrManipLen/2; $i < $arrManipLen; $i++) { 
    $arrTemp[] = $arrManipulate[$i];
}

//JA APVERCIAM
rsort($arrTemp);
//IDEDAM ATGAL APVERSTA DESINE MASYVO DALI
$indx=0;
// print_r($arrTemp);
for ($i=$arrManipLen/2; $i < $arrManipLen; $i++) { 
    $arrManipulate[$i] = $arrTemp[$indx];
    $indx++;
}

//NAIKINAM LAIKINA PANAUDOTA MASYVA
unset($arrTemp);

//ATVAIZDUOJAM PJAUTINE VERIJA
echo "Vidurine reiksme DIDZIAUSIA, o i sonus skaiciai mazeja (pjautine perpus versija) :" ."<br>";
for ($i=0; $i <$arrManipLen; $i++) { 
    echo $arrManipulate[$i] ." ";
}

echo "<br><br>";

//LR RH SUMU SKAICIAVIMAS
//KAD NEISKAICIUOTI RANDAM DIDZIAUSIOS (VIDURINES) REIKSMES INDEXA
$indMax=array_keys($arrManipulate, max($arrManipulate))[0];
// echo $indMax;

//SKAICIUOJAM NUO RASTOS DIDZIAUSIOS (VIDURINES) REIKSMES REIKSMIU SUMAS I KAIRE IR I DESINE PUSES
$sumLeft=0;
$sumRight=0;
for ($i=0; $i < $indMax; $i++) { 
    $sumLeft += $arrManipulate[$i];
}
for ($i=$indMax+1; $i < $arrManipLen; $i++) { 
    $sumRight += $arrManipulate[$i];
}

echo "Vidurio (didziausio) skaitmens (".max($arrManipulate) .") indexas: ". $indMax .". I kaire nuo jo (be jo) skaiciu suma: " .$sumLeft .". I desine nuo jo (be jo) skaiciu suma: " .$sumRight ."."; 
echo "<br><hr><br>";

// E G L U T E//// E G L U T E//// E G L U T E//// E G L U T E//// E G L U T E//// E G L U T E//
//KITAS VARIANTAS - PERDELIOJIMAS EGLUTE
rsort($arrManipulate);

// for ($i=; $i <; $i++) { 
//     echo $arrManipulate[$i] ." ";
// }

//DALINAM MASYVA I KAIRE IR DESINE
for ($i=0; $i <$arrManipLen; $i++) { 
    if ($i %2 ==0){
        $arrLeft[]=$arrManipulate[$i];
    }else{
        $arrRight[]=$arrManipulate[$i];
    }
}


// //ARBA GALIM PADALINTI IR TAIP (DALINAM MASYVA I KAIRE IR DESINE)
// for ($i=0; $i <$arrManipLen; $i++) { 
//     $arrLeft[]=$arrManipulate[$i];
//     if ($i<$arrManipLen-1) {
//         $i++;
//         $arrRight[]=$arrManipulate[$i];
//     }
// }

//ISRIKIUOJAM DID.TVARKA KAIRE MASYVO DALI
sort($arrLeft);

//PRIIE KAIRIO MASYVO PRIKLIJUOJAM DESINI
for ($i=0; $i < count($arrRight); $i++) { 
    $arrLeft[]=$arrRight[$i];
}

//SUKLIJUOTA MASYVA PADAROM PIRMINIU
$arrManipulate=$arrLeft;

echo "Vidurine reiksme DIDZIAUSIA, o i sonus skaiciai mazeja (eglutes versija) :" ."<br>";
for ($i=0; $i <$arrManipLen; $i++) { 
    echo $arrManipulate[$i] ." ";
}
echo "<br><br>";


//SKAICIUOJAM KAIRES IR DESINES PUSIU SUMAS IR JU SKIRTUMA (EGLUTE)
$indMax=array_keys($arrManipulate, max($arrManipulate))[0];
// echo $indMax;

$sumLeft=0;
$sumRight=0;
for ($i=0; $i < $indMax; $i++) { 
    $sumLeft += $arrManipulate[$i];
}
for ($i=$indMax+1; $i < $arrManipLen; $i++) { 
    $sumRight += $arrManipulate[$i];
}

echo "(Eglutes versija) Vidurio (didziausio) skaitmens (".max($arrManipulate) .") indexas: ". $indMax .". I kaire nuo jo (be jo) skaiciu suma: " .$sumLeft .". I desine nuo jo (be jo) skaiciu suma: " .$sumRight ."<br>";
echo "Kaires ir desines pusiu sumu skirtumas: ". abs($sumLeft-$sumRight).".";


?>
</body>
</html>