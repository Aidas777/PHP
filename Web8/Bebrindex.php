<?php

// @include_once __DIR__."/functions.php"; nemeta klaidos jei yra @
// include_once __DIR__."/functions.php";
require __DIR__."/functions.php";
// require_once __DIR__."/functions.php";


// echo __DIR__ ;

setBebrai(["juodieji" => 30, "rudieji" => 120]);
// getBebrai();

// include_once __DIR__."/functions.php";


// $bebrai = getBebrai();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bebru uztvanka</title>
</head>
<body>
    <h2>Juodieji: <?= getBebrai()["juodieji"] ?> </h2>
    <h2>Rudieji: <?= getBebrai()["rudieji"] ?> </h2>
    <form action="http://localhost/php/web8/Bebrindex.php" method="post">
        <div>
            <label>Prideti juodus: </label><input type="text" name="j_plus">
            <button type="submit" name="ka_daryt" value="prideti_juodus">+</button>
        </div>

        <div>
            <label>Prideti juodus: </label><input type="text" name="j_plus">
            <button type="submit" name="ka_daryt" value="prideti_juodus">+</button>
        </div>

        <div>
            <label>Prideti juodus: </label><input type="text" name="j_plus">
            <button type="submit" name="ka_daryt" value="prideti_juodus">+</button>
        </div>

        <div>
            <label>Prideti juodus: </label><input type="text" name="j_plus">
            <button type="submit" name="ka_daryt" value="prideti_juodus">+</button>
        </div>

    </form>
    
</body>
</html>

