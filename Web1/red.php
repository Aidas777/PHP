<!DOCTYPE html>

<?php

if ("red" == isset($_GET["c"])) {
    header("Location: blue.php");
    die;
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Red</title>

    <style>
        body {
            background-color: red;
        }

        a {
            color: #ffff;
        }


    </style>


</head>
<body>

    <a href = "red.php?c=red">Linkas i save (i Red, bet pereis i Blue)</a>
    
</body>
</html>