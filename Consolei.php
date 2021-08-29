<?php

$kintamasis=["sudas"=>1, "kiu"=>"Agurkas"];

function Cons($kintamasis) {
    echo("<script>console.log('PHP: " . json_encode($kintamasis) ."Vo blia"  . "');</script>");
}

$variable = "Variablas";
echo "<script>console.log('$variable');</script>";
?>