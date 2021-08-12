<?php
    $c = ($_GET["color"] ?? false) ? "red": "black";

    //($_GET["color"] ?? false
    // jei kintamasis color yra tai grazinam 1 
    // kuris vista true
    // tenaris grazina $c = 'red'
    // jei kintamojo color nera tai  ?? suntakse grazina false tenoro salygai
    // tenaris grazina $c = 'black'

    // "<?php echo $c"  = "<?= echo $c". Tai vaikia tik 1 eilutei. Gale ; nereikia deti.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destytojo Nd7-1</title>

    <style>

        body {
            background-color: <?php echo $c ?>;
        }

        a {
            color: pink;
        }

    </style>


</head>
<body>

<!-- Destytojo -->

<a href="http://localhost/php/web1/1d.php">Be</a>
<a href="http://localhost/php/web1/1d.php?color=1">Su</a>
    


</body>
</html>