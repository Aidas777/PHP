<?php

make("Cola", "Big");

function make($product, $size) {
    ChkAvailibility($product);
    CupSize($size);
    FillCup($product, $size);
    GiveCup();
}

function ChkAvailibility($product) {
    
    if ($product >20) {

    }
}



?>