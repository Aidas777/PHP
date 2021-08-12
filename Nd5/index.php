<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Namu darbai Papildomi arba Nr.5</title>

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
// Sugeneruokite masyvą iš 10 elementų, kurio elementai būtų masyvai iš 5 elementų su reikšmėmis nuo 5 iki 25.

// SUKURIAM DVIMATI MASYVA
for ($i=0; $i < 10; $i++) { 
    for ($y=0; $y <5 ; $y++) { 
       $arrMain[$i][$y]=rand(5, 25);
    }
}

// SPAUSDINAM DVIMATI MASYVA
echo "Sukurtas masyvas:" ."<br>";
foreach ($arrMain as $keyMain => $valMain) {
    foreach ( $valMain as $key => $value) {
        echo "[".$keyMain ."][" .$key ."]=" .$value .",  ";
    }
    echo "<br>";
}

// var_dump($arrMain);
// print_r($arrMain);


    
?>

<h4>2. Uzduotis</h4>
<!-- /////////////////////////////////////////////////// 2 /////////////////////////////////////////////////// -->

<?php
// Naudodamiesi 1 uždavinio masyvu:
// Suskaičiuokite kiek masyve yra elementų didesnių už 10;
//////////////////////////////////////////////////////// A
echo "<p>a)</p>";

echo "Visi pavieniai elementai:"."<br>";
// echo count($arrMain, COUNT_RECURSIVE);
$more10=null;
foreach ($arrMain as $keyMain => $valMain) {
    foreach ( $valMain as $key => $value) {
        echo $value ." ";
        if($value>10) {
            $more10++;
        }
    }
}
echo "<br><br>";
echo "Elementų didesnių už 10 yra: " .$more10 ."<br>";


//////////////////////////////////////////////////////// B
// Raskite didžiausio elemento reikšmę;
echo "<p>b)</p>";

$maxVal=0;
foreach ($arrMain as $keyMain => $valMain) {
    foreach ( $valMain as $key => $value) {
        echo $value ." ";
        if($value>$maxVal) {
            $maxVal=$value;
        }
    }
}
echo "<br><br>";
echo "Didziausia reiksme: " . $maxVal."<br>";
// print_r(max($arrMain))."<br>";
// echo "<br>";
// echo max(max($arrMain))."<br>";


//////////////////////////////////////////////////////// C
// Suskaičiuokite kiekvieno antro lygio masyvų su vienodais indeksais sumas (t.y. suma reikšmių turinčių indeksą 0, 1 ir t.t.)
echo "<p>c)</p>";

echo "Kiekvieno antro lygio masyvų su vienodais indeksais sumos (t.y. 0:0,  1:0,  2:0... / 0:1,  1:1,  2:1... /...): "."<br>";

for ($i=0; $i < count(($arrMain)[$i]); $i++) { 
    $ind2Sum=0;
    for ($y=0; $y <count($arrMain) ; $y++) { 
        $ind2Sum = $ind2Sum + $arrMain[$y][$i];
    }
    echo $ind2Sum . " ";
}


//////////////////////////////////////////////////////// D
// Visus masyvus “pailginkite” iki 7 elementų
echo "<p>d)</p>";

// PADIDINAM VIDINIUS MASYVUS IKI 7
for ($i=0; $i < count($arrMain); $i++) { 
    for ($y=0; $y <2 ; $y++) { 
       $arrMain[$i][]=rand(5, 25);
    }
}

// SPAUSDINAM PADIDINTA MASYVA
echo "Masyvas su iki 7 elementu padidintais vidiniais masyvais:" ."<br><br>";
foreach ($arrMain as $keyMain => $valMain) {
    foreach ( $valMain as $key => $value) {
        echo "[".$keyMain ."][" .$key ."]=" .$value .",  ";
    }
    echo "<br>";
}


//////////////////////////////////////////////////////// E
// Suskaičiuokite kiekvieno iš antro lygio masyvų elementų sumą atskirai ir sumas panaudokite kaip reikšmes sukuriant naują masyvą.
// T.y. pirma naujo masyvo reikšmė turi būti lygi mažesnio masyvo, turinčio indeksą 0 dideliame masyve, visų elementų sumai 

echo "<p>e)</p>";

echo "Kiekvieno antro lygio masyvų sumos (t.y. 0:0,  0:1,  0:2... / 1:0,  1:1,  1:2... /...): "."<br>";

// for ($i=0; $i < count(($arrMain)[$i]); $i++) { 
//     $ind2Sum=0;
//     for ($y=0; $y <count($arrMain) ; $y++) { 
//         $ind2Sum = $ind2Sum + $arrMain[$y][$i];
//     }
//     echo $ind2Sum . " ";
// }

for ($i=0; $i < count($arrMain) ; $i++) { 
    $ind2Sum=0;
    for ($y=0; $y <count(($arrMain)[$i]); $y++) {
        $ind2Sum = $ind2Sum + $arrMain[$i][$y];
    }
    echo $ind2Sum . " ";
    $arrNew[]=$ind2Sum;
}
echo "<br>";
echo "Duomenys is naujai sukurto masyvo: "."<br>";

for ($i=0; $i < count($arrNew); $i++) { 
    echo $arrNew[$i] ." ";
}

?>

<h4>3. Uzduotis</h4>
<!-- /////////////////////////////////////////////////// 3 /////////////////////////////////////////////////// -->
<?php
// Sukurkite masyvą iš 10 elementų. Kiekvienas masyvo elementas turi būti masyvas su atsitiktiniu kiekiu nuo 2 iki 20 elementų.
// Elementų reikšmės atsitiktinai parinktos raidės iš intervalo A-Z.
// Išrūšiuokite antro lygio masyvus pagal abėcėlę (t.y. tuos kur su raidėm).

for ($i=0; $i < 10 ; $i++) { 
    for ($y=0; $y < rand(2, 20); $y++) { 
        $arrRand[$i][$y] = chr(rand(65, 90));
    }
}

// SPAUSDINAM DVIMATI MASYVA
echo "Sukurtas masyvas:" ."<br>";
foreach ($arrRand as $keyMain => $valMain) {
    foreach ( $valMain as $key => $value) {
        echo "[".$keyMain ."][" .$key ."]=" .$value .",  ";
    }
    echo "<br>";
}
echo "<br>";

// ISRIKIUOJAM PAGAL ABECELE IR SPAUSDINAM DVIMATI MASYVA
echo "Isrikiuotas pagal abecele masyvas:" ."<br>";
for ($i=0; $i < count($arrRand) ; $i++) { 
    sort($arrRand[$i]);
    for ($y=0; $y < count($arrRand[$i]) ; $y++) { 
      echo "[" .$i ."][" .$y ."]=" .$arrRand[$i][$y] .", ";
   }
   echo "<br> ";
}

?>


<h4>4. Uzduotis</h4>
<!-- /////////////////////////////////////////////////// 4 /////////////////////////////////////////////////// -->
<?php
// Išrūšiuokite trečio uždavinio pirmo lygio masyvą taip, kad elementai kurių masyvai trumpiausi eitų pradžioje.
// Masyvai kurie turi bent vieną “K” raidę, visada būtų didžiojo masyvo visai pradžioje.

// ISRIKIUOJAM ISORINI MASYVA PAGAL VIDINIU MASYVU ILGIUS IR SPAUSDINAM
echo "Isrikiuotas 3 uzduoties masyvas pagal vidiniu masyvu ilgius:" ."<br>";

sort($arrRand);
for ($i=0; $i < count($arrRand) ; $i++) { 
    for ($y=0; $y < count($arrRand[$i]) ; $y++) { 
      echo "[" .$i ."][" .$y ."]=" .$arrRand[$i][$y] .", ";
   }
   echo "<br> ";
}

//RIKIUOJAM VIDINIU MASYVYS SU RAIDE K I PRADZIA ISORINIO MASYVO

for ($w=0; $w <count($arrRand) ; $w++) { 
    for ($i=0; $i < count($arrRand) ; $i++) { 
        if (  in_array("K", $arrRand[$i])  ) {
            // $arrRand[$i][]=0;
            if ($i>0) {
                $tempArr=$arrRand[$i-1];
                $arrRand[$i-1]=$arrRand[$i];
                $arrRand[$i]=$tempArr;
            }
        }
    }
}
unset($tempAr);
echo "<br> ";

//SPAUSDINAM
echo "Visi vidiniai masyvai, turintys K raide perkelti i isorinio masyvo virsu (pradzia): ". "<br>";
for ($i=0; $i < count($arrRand) ; $i++) { 
    for ($y=0; $y < count($arrRand[$i]) ; $y++) { 
      echo "[" .$i ."][" .$y ."]=" .$arrRand[$i][$y] .", ";
   }
   echo "<br> ";
}

?>


<h4>5. Uzduotis</h4>
<!-- /////////////////////////////////////////////////// 5 /////////////////////////////////////////////////// -->
<?php
// Sukurkite masyvą iš 30 elementų.
// Kiekvienas masyvo elementas yra masyvas [user_id => xxx, place_in_row => xxx]
// user_id atsitiktinis unikalus skaičius nuo 1 iki 1 000 000,
// place_in_row atsitiktinis skaičius nuo 0 iki 100. 

// $arrUsers=[];
// $arrData=[];

// $arrData["user_id"]=rand(1, 35);
// $arrData["place_in_row"]=rand(1, 35);
// $arrUsers[]=$arrData;

$arrData=["user_id"=>rand(1, 1000000),"place_in_row"=>rand(1, 100)];
// $arrData["place_in_row"]=rand(1, 35);
$arrUsers[]=$arrData;

// var_dump($arrData);
$u=0;
$chkNr=0;


for ($i=0; $i < 29 ; $i++) { 
    $kartojasi=true;

    while($kartojasi==true) {
        $idRnd=rand(1, 1000000);
        $kartojasi=false;
        for ($y=0; $y < count($arrUsers) ; $y++) { 
            if( $idRnd == $arrUsers[$y]["user_id"] ){
                // echo "Kartojasi " .$arrUsers[$y]["user_id"] .", ";
                $kartojasi=true;
            }
        }
    }


    $arrData["user_id"] = $idRnd;

    $colRnd=rand(0, 100);
    $arrData["place_in_row"]=$colRnd;
        
    $arrUsers[]=$arrData;

    // echo ($arrUsers[$i]["user_id"] ." ");
    // $arrTemp[]=$arrUsers[$i]["user_id"];
    // echo ($arrUsers[$i]["user_id"]);
}

var_dump($arrUsers);

// sort($arrTemp);
// var_dump($arrTemp);

?>

<h4>6. Uzduotis</h4>
<!-- /////////////////////////////////////////////////// 6 /////////////////////////////////////////////////// -->


<?php

//KAZKAS NESUVEIKE, BET EINU DARYTI SEKANCIU UZDUOCIU ...


for ($k=0; $k <count($arrUsers) ; $k++) { 

    for ($i=0; $i < count($arrUsers); $i++) { 
        for ($y=0; $y < count($arrUsers[$i]); $y++) { 
            if (   $arrUsers[$i]["user_id"]>$arrUsers[$y]["user_id"]  ) {
                    $arrTmp=$arrUsers[$i];
                    $arrUsers[$i]=$arrUsers[$y];
                    $arrUsers[$y]=$arrTmp;
            }
        }
    }

}

var_dump($arrUsers);
?>
</body>
</html>