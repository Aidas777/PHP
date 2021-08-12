<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Namu darbai 2 (papildomi)</title>

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

    .zvaig {
        width: 100%;
        word-wrap: break-word;

    }

    svg {
        /* position: absolute; */
        position: relative;
        top: -278px;
        height: 268px;
        width: 268px;
        margin-left: 50%;
        transform: translateX(-50%);
    }
    .LinSvg {
        /* position: relative; */
        margin-top: 0px;

    }

    .text1 {
        color: red;
    }

</style>


</head>
<body>


<h4>1. Uzduotis</h4>
<!-- ------------------------------------ 1 -------------------------------- -->

<?php

$z="*";
$zv=null;

for ($i=0;$i<400;$i++) {

    $zv=$zv . $z;

}


// echo $zv. "<br>";
echo "a)" . "<br>";
echo "Inside php";
echo "<div class='zvaig'>" .
    "<p style='width: 100%'>" .$zv ."</p>" .
    "</div>"

?>

<div class='zvaig'>
    <p>Inside Html</p>
    <p> <?=$zv?></p>
</div>

<?php
echo "b)" . "<br>";

$zvOut=null;
$cauntas=null;
for ($i=0; $i<strlen($zv); $i++) {
    $cauntas++;
    $zvOut=$zvOut .substr($zv,$i,1);
    if ($cauntas==50) {
        $zvOut=$zvOut. "<br>";
        $cauntas=0;
    }
}

echo $zvOut ."<br>";

?>

<h4>2. Uzduotis</h4>
<!-- ------------------------------------ 2 -------------------------------- -->

<?php

$above=null;
$spal="black";
for ($i=0; $i<300; $i++) {
    $rnd=rand(0, 300);
    if($rnd>150) {
        $above++;
    }
    if ($rnd>275) {
        // $spal="red";
        echo "<span class='text1'>". $rnd ."</span>"." ";
    } else {
        $spal="black";
        echo "<span style='color:" . $spal . "'>". $rnd ."</span>"." ";
    }

   
}
echo "<br>";
echo "Didesniu uz 150 yra: ".$above . " skaitmenys(-u).";

?>

<h4>3. Uzduotis</h4>
<!-- ------------------------------------ 3 -------------------------------- -->

<?php

$skSk=null;

// $rnd=rand(3000, 4000);
// $rnd=rand(1, $rndp);

for ($i=77; $i<rand(3000, 4000);$i+=77) {
    // if($i % 77 ==0) {
        $skSk=$skSk. $i .", ";
    // }

}

// $skSk= substr($skSk,0, strlen($skSk)-2);
$skSk= substr($skSk,0, -2);

// echo "<p style='word-wrap: break-word;'>" .$skSk. "</p>" ."<br>";
echo $skSk ."<br>";

?>


<h4>4 - 5. Uzduotys</h4>
<!-- ------------------------------------ 4 - 5 ----------------------------- -->

<?php



$z="*";
$zv=null;

for ($i=0;$i<25;$i++) {

    $zv=$zv . $z;

}

for ($i=0;$i<25;$i++) {

echo "<p style='text-align: center; letter-spacing: 3px; height: 0; margin: 11px; line-height: 0;'>" .$zv. "</p>";
// echo "<p style='text-align: center; word-wrap: break-word;'>" .$zv. "</p>" ."<br>";
// echo $zv ."<br>";
}

?>
<!-- 
<h4>5. Uzduotis</h4> -->
<!-- ------------------------------------ 5 -------------------------------- -->

<!-- <?php

// $img=imagecreatetruecolor(50,50, "blue");
// imageline($img,10,10,100,100);

?> -->
<svg class="LinSvg">
    <line x1="0" y1="0" x2="266" y2="266" style="stroke:rgb(255,0,0);stroke-width:2" />
    <line x1="0" y1="265" x2="265" y2="0" style="stroke:rgb(255,0,0);stroke-width:2" />
</svg>


<h4>6. Uzduotys</h4>
<!-- ------------------------------------ 6 ------------------------------- -->

<?php
$sh=null;
$msh=null;
$countas=0;
$yra=false;


// do {
//     $countas++;
//     $rnd=rand(0, 1);

//     if($rnd==0) {
//         $sh="H";
//     } else {
//         $sh="S";
//     }

//     $msh=$msh .$sh;

//     echo strpos($msh,"H") ."<br>";

//     // if ($countas >=20) break;
//     if (strpos($msh, "H") >=0) {
//         $yra=true;
//         // break;
//     } 
    
   
// } while (   ($countas <=20) and $yra=false   );
 
// echo "Herbas iskrito metant " . $countas . " karta. " .$msh . " ".$yra;

$a=null;
while (!$yra) {
    $countas++;

    $rnd=rand(0, 1);

    if($rnd==0) {
        $sh="H";
    } else {
        $sh="S";
    }

    $msh=$msh .$sh;

    for ($i=0;$i<strlen($msh);$i++) {
        $a=substr($msh,$i,1);
        if ($a=="H") {
            $yra=true;
        }
    }

}
// echo "====";
// while(true){
//     $sh = rand(0,1);
//     if($sh == 1){
//         echo "H";
//         break;
//     }
//     echo "S";
// }

// echo "====";

echo $msh ."<br>";
echo "Pirmas Herbas iskrito metant " . $countas . " karta."."<br>";

//--------------
$sh=null;
$msh=null;
$countas=0;
$hSk=null;

while ($hSk<3) {
    $countas++;
    $rnd=rand(0, 1);
    if($rnd==0) {
        $msh.="H";
        $hSk++;
    } else {
        $msh.="S";
    }
}
echo $msh ."<br>";
echo "3 kartus (isviso) Herbas iskrito po ". $countas . " kartu."."<br>";

//--------------
$sh=null;
$msh=null;
$countas=0;
$hSk=null;
$yra=false;
$count = 0;
while ($yra==false) {
    $countas++;

    $rnd=rand(0, 1);

    if($rnd==0) {
        $sh="H";
        $count++;
    } else {
        $sh="S";
        $count = 0;
    }
    $msh=$msh .$sh;
    
    if($count > 2){
        break;
    }
    // if (strlen($msh)>=3) {
    //     for ($i=0;$i<strlen($msh);$i++) {
    //         $a=substr($msh,$i,3);
    //         if ($a =="HHH") {
    //             $yra=true;
    //         }
    //     }
    // }

}
echo $msh ."<br>";
echo "3 kartus is eiles Herbas iskrito po ". $countas . " kartu."."<br>";
?>

<h4>7. Uzduotys</h4>
<!-- ------------------------------------ 7 ------------------------------- -->

<?php

$petro=null;
$kazio=null;
$winer=null;

while ($petro<222 and $kazio<222) {
    $p=rand(10,20);
    $k=rand(5,25);

    $petro=($petro + $p);
   
    $kazio=($kazio + $k);

    if ($petro >=222) {
        $winer="Petras";
    }

    if ($kazio >=222) {
        $winer="Kazys";
    }

}

echo "Petro taskai: " .$petro."<br>";
echo "Kazio taskai: " .$kazio."<br>";
echo "Laimetojas (virsijes 222 taskus): " .$winer ."<br>";


?>

<h4>8 - 9. Uzduotys</h4>
<!-- ------------------------------------ 8 -9 ------------------------------- -->
<!-- ROMBAS -->
<?php

$s="* ";
$kd=0;
$mid=11;
$L=0;
$R=0;

for ($i=1;$i<11;$i++) {

    $L=$mid-$kd;
    $R=$mid+$kd;
    
    $kd++;

    for ($e=1;$e<=21;$e++) {
        if (($e==$L or $e==$R) or ($e>$L and $e<$R)) {

            $c1=rand(0,255);
            $c2=rand(50,200);
            $c3=rand(0,155);
            $spalv="rgb(".$c1.",".$c2.",".$c3.")";

            echo "<span style='color:" .$spalv . ";'>".$s."</span>";
            // echo "<span>".$s."</span>";
        } else {
            echo "<span style='color:" ."transparent" . ";'>".$s."</span>";
        }
        // echo "<br>";
        //&nbsp
    }

    echo "<br>";
}

$mid=11;
$kd=11;
$L=0;
$R=0;

for ($i=0;$i<11;$i++) {
    $kd--;
    $L=$mid-$kd;
    $R=$mid+$kd;



    for ($b=21;$b>=1;$b--) {
        if (($b==$L or $b==$R) or ($b>$L and $b<$R)) {

            $c1=rand(0,255);
            $c2=rand(50,200);
            $c3=rand(0,155);
            $spalv="rgb(".$c1.",".$c2.",".$c3.")";

            echo "<span style='color:" .$spalv . ";'>".$s."</span>";
        } else {
            echo "<span style='color:" ."transparent" . ";'>".$s."</span>";
        }
    }

    echo "<br>";
}

?>

<h4>10. Uzduotys</h4>
<!-- ------------------------------------ 10 ------------------------------- -->

<?php

$vL=85;
$k=0;
$vL=$vL*5;

while ($vL>=0) {
    $smug=rand(5,20);
    $vL=$vL-$smug;
    $k++;
}

echo "5 vinys bus ikalti (silpnais smugiais) po " . $k ." smugiu."."<br>";

$vL=85;
$k=0;
$vL=$vL*5;
$miss=0;

while ($vL>=0) {
    $miss=rand(0,1);
    if ($miss==1) {
        $smug=rand(20,30);
        $vL=$vL-$smug;
    }
    $k++;
}

echo "5 vinys bus ikalti (stipriais smugiais, su 50% nepataikymo tikimybe) po " . $k ." smugiu."."<br>";

?>

<h4>11. Uzduotys</h4>
<!-- ------------------------------------ 11 ------------------------------- -->

<?php

$numStr=null;
$rnd=null;
// $arr=range(0, 49);
$kartojas=false;
$index=null;


$arr=[rand(1,200)];

for ($i=1;$i<50;$i++) {
    $rnd=rand(1,200);
    if (! in_array($rnd, $arr)) {
        $arr[]=$rnd;
    } else {
        $i--;
    }
}
rsort($arr);

for ($i=0;$i<50;$i++) {
    $numStr.=$arr[$i] ." ";
}
echo "<br>";
echo $numStr ."<br>";

$numStr=null;
for ($i=0; $i<count($arr); $i++) {
    $pirminis=true;
    for($y=2; $y<$arr[$i]; $y++) {
        if (   ($arr[$i] % $y) ==0   ) {
            $pirminis=false;
            break;
        }
    }
    if ($pirminis) {
        $numStr=$numStr .$arr[$i] ." ";
    }
}

echo "Tik pirminiai: " .$numStr ."<br>";
?>

</body>
</html>