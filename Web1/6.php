<?php

$metod = ($_SERVER["REQUEST_METHOD"]);
echo $metod;
if ($metod=="GET") {
    $coloras="green";
}
if ($metod=="POST") {
    $coloras="yellow";
}

// header("Location: 6.php");
// die;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>6 uzduotis</title>

    <style>

        body {
            background-color: <?= $coloras ?>;
        }

        .ties {
            display: flex;
            justify-content: center;
        }

        #po {
            margin-left: 30px;
        }
    </style>

</head>
<body>

<?php
// Padarykite puslapį su dviem mygtukais. Mygtukus įdėkite į dvi skairtingas formas- vieną GET ir kitą POST.
// Nenaudodami jokių konkrečių $_GET ar $_POST reikšmių, nuspalvinkite foną žaliai, kai 
// paspaustas mygtukas iš GET formos ir geltonai- kai iš POST.

?>
<!-- GET -->
<div class="ties">
    <form id="ge" action="" method="get" name="getas">
        <input type="text" name="Geto neimas" id="Geto id">
        <button type="submit">Get metodas</button>
    </form>


    <!-- POST -->
    <form id="po" action="" method="post" name="postas">
        <input type="text" name="Posto neimas" id="Posto id">
        <button type="submit">Post metodas</button>
    </form>
</div>

</body>
</html>