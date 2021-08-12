<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1> cia HTML 2</h1>
    <script>
        console.log("cia cj2");

    </script>

<?php

    $name="Ernestas";

    echo $name;

    // echo "<h1>Labas</h1>";
    echo "<br>";
    echo "Labas";


    $surname="Nauseda";
    echo $name ."<br>";

    echo "<h1>" .$name ." ".$surname."</h1><br>";

    $sk1=7;
    $sk2=12;

    echo $name . " " .($sk1 + $sk2). "<br>";

    $rnd=rand(1, 20);
    echo $rnd;

    // kakokFunkcija($arr,"Kestas");
    // kakokFunkcija("Kestas", $arr);

    $rand=rand(0,10);
        $color = "yellow";
    if($rand >5) {
        $color = "green";
    }
    if($rand <5) {
        $color="red";
    }
    echo "<h1 style=\"color:".$color."\">" . $rand .  "</h1>";
    echo '<h1 style="color:'.$color.'">' . $rand .  "</h1>";
    echo "<h1 style=\"color:{$color}\">" . $rand .  "</h1>";
    ?>

    <div class ="container">


    $rnd=rand(1, 10);
    <h1 style="color: <?=$color?> "><?=$rnd?></h1>
    ?>


    <?php
    $name2 = "Naglis m";
    $surn2 = "Mockevicius";
    $sk=5;

    echo $name2." ".$surn2." moku ".$sk." kalbas.";

    ?>



<h1> <?php echo $name ?></h1>
<h1> <?=$name?></h1>


</body>
</html>


<?php

echo "nera php pabaigos";