<?php
if (isset($_POST["btn"]) != "toRose") {
    header("Location: pink.php");
    die;
}

echo ($_SERVER["REQUEST_METHOD"]);

// header("Location: pink.php");
// die;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>8 Uzduotis Rose</title>

    <style>

        body {
            /* background-color: <?= $coloras ?>; */
            background-color: rgb(199, 60, 60);
        }

        .cetr {
            justify-content: center;
            display: flex;
        }


    </style>

</head>
<body>


<?php
// Sukurkite du puslapius pink.php ir rose.php.
// Nuspalvinkite juos atitinkamo spalvom.
// Į pink.php puslapį įdėkite formą su POST metodu ir mygtuku “GO TO ROSE”.
// Formą nukreipkite, kad ji atsidarinėtų rose.php puslapyje.
// Padarykite taip, kad surinkus naršyklėje tiesiogiai adresą į rose.php puslapį, naršyklė būtų 
// peradresuojama į pink.php puslapį. 

?>

<a href="pink.php" class="cetr">Nuoroda i Pink puslapi</a>
    
</body>
</html>