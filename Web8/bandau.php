<?php

$mas= ["123456SNR" => (["Opa"=> 1, "Meduoliai"=> 3])];
$mas ["a56SNR"] = ["Opa"=> 9, "Pa"=> 153];
$mas ["Pizdabolsina"] = ["Opa"=> 2, "Xaxa"=> 77];

var_dump($mas);

// for ($i=0; $i < count($mas) ; $i++) { 
//     print_r($mas[$i]);
// }

foreach ($mas as $index => $littleMas) {
    echo $index ."<br>";
    foreach ($littleMas as $key => $value) {
        echo $key ." = " .$value ."<br>";
    }
    echo "<br>";
}

usort($mas, "sortas");

function sortas($a, $b) {
    if ($a["Opa"]==$b["Opa"]) return 0;
    return ( $a["Opa"]< $b["Opa"] )?-1:1;
}

echo "<hr>";

foreach ($mas as $index => $littleMas) {
    echo $index ."<br>";
    foreach ($littleMas as $key => $value) {
        echo $key ." = " .$value ."<br>";
    }
    echo "<br>";
}

var_dump($mas);
echo "<hr>";
echo "<hr>";

$str = "Manobataibuvo2";
echo $str ."<br>";
echo substr($str,0,4) ." " .substr($str,4,8)."<br>";
echo chunk_split($str,4);



?>