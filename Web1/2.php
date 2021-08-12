<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nd web mechanika 2</title>

        <style>

        html {
            /* background-color: rgb(232, 232, 232); */
            /* background-color: <?php $c ?>; */
            background-color: black;
            margin: 0 auto;
        }

        h4 {
            width: 100%;
            text-align: center;
            font-style: italic;
            background-color: lightgrey;

        }

        a {
            color: white;
            display: inline-block;
        }

    </style>

</head>
<body>

<h4>2. Uzduotis</h4>
<!-- /////////////////////////////////////////////////// 2 /////////////////////////////////////////////////// -->

<?php
// Sukurti puslapį panašų į 1 uždavinį, tiktai antro linko su perduodamu kintamuoju nedarykite, o vietoj to padarykite,
// URL eilutėje ranka įvedus GET kintamąjį color su RGB spalvos kodu (pvz color=ff1234) puslapio fono spalva pasidarytų tokios spalvos.

?>


<?php
$c = ($_GET["color"] ?? "");
echo "<html style='background-color: #" .$c ."'>";
echo "#" .$c ."<br><br>";
// echo "<html style='background-color:red'>";

?>

<a href="2.php">Index.php</a>

</body>
</html>