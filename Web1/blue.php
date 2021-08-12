<!DOCTYPE html>

<?php

// header("Location: red.php");
// $lnk = $_SERVER["HTTP_REFERER"];
// echo $lnk ."<br>";

if ("blue" == isset($_GET["c"])) {
    // echo "Eik i reda";
    header("Location: red.php");
    die;
// } else {
//     echo "sus kr";
}

// echo "<br>";

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue</title>

    <style>
        body {
            background-color: blue;
        }

        a {
            color: #ffff;
        }

    </style>

</head>
<body>

    <a href = "blue.php?c=blue">Linkas i save (i Blue, bet pereis i Red)</a>
    
</body>
</html>