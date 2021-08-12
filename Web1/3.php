<!DOCTYPE html>
<?php
$c = ($_GET["color"] ?? "");
if ( substr($c,0,1) != "#" ) {
    $c="#" .$c;
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nd web mechanika 3</title>

        <style>

        html {
            /* background-color: rgb(232, 232, 232); */
            background-color: <?= $c ?>;
            /* background-color: grey; */
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
        #btn {
            background-color: lightblue;
            border-radius: 5px;
        }

    </style>

</head>
<body>

<h4>3. Uzduotis</h4>
<!-- /////////////////////////////////////////////////// 3 /////////////////////////////////////////////////// -->

<?php
// Perdarykite 2 uždavinį taip, kad spalvą būtų galimą įrašyti į laukelį ir ją išsiųsti mygtuku GET metodu formoje.


?>


<?php
// $c = ($_GET["color"] ?? "");
// echo "<html style='background-color: #" .$c ."'>";
// echo "#" .$c ."<br><br>";
// echo "<html style='background-color:red'>";

?>
<!-- <input id="TxTin" name="TxTin"></input> -->
<!-- <br><br> -->
    <!-- <button id="btn">Keisti spalva</button> -->
<!-- <a href="2.php">Index.php</a> -->

<?php
// echo ($_GET["TxTin"] ?? "Nieko neprieme");
?>




<!-- <form action="welcome_get.php" method="get"> -->
<form method="get">
<h3>Iveskite HEX spalvos koda</h3>
<!-- Kodas: <input type="text" name="name"><br> -->
<input type="text" name="color"><br>

<a href = "3.php?color=" <?php echo ($_GET["color"] ?? "") ; ?> >
    <button id="btn" type="submit">Keisti spalva</button>
</a>

</form>

</body>
</html>