<!DOCTYPE html>

<?php if(1 == ($_GET["color"] ?? "")): ?>
    <!-- <?php echo "<html style='background-color:red'>"; ?> -->
    <?php $c="red"; ?>
<?php else: ?>
    <!-- <?php echo "<html style='background-color:black'>"; ?> -->
    <?php $c="black" ?>
<?php endif ?>

<!-- <html lang="en"> -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nd web mechanika 1</title>

        <style>

        html {
            /* background-color: rgb(232, 232, 232); */
            background-color: <?= $c ?>;
            /* background-color: black; */
            margin: 0 auto;
        }

        h4 {
            width: 100%;
            text-align: center;
            font-style: italic;
            background-color: lightgrey;

        }

        a {
            /* color: white; */
            display: inline-block;
        }

    </style>

</head>
<body>

<h4>1. Uzduotis</h4>
<!-- /////////////////////////////////////////////////// 1 /////////////////////////////////////////////////// -->

<?php
// Sukurti puslapį su juodu fonu ir su dviem linkais (nuorodom) į save.
// Viena nuoroda su failo vardu, o kita nuoroda su failo vardu ir GET duomenų  perdavimo metodu perduodamu kintamuoju color=1.
// Padaryti taip, kad paspaudus ant nuorodos su perduodamu kintamuoju fonas nusidažytų raudonai, o 
// paspaudus ant nuorodos be perduodamo kintamojo, vėl pasidarytų juodas.
    


?>


<a href="1.php";>Index.php</a>
<br>
<a href="1.php?color=1";>index.php?color=1</a>


</body>
</html>