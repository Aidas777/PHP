<?php
$metod = ($_SERVER["REQUEST_METHOD"]);
echo $metod;

if ($metod=="GET") {
    $coloras="green";
}

if ($metod=="POST") {
    header("Location: 7.php?color=ye");
    die;
}

if (isset($_GET["color"]) == "ye") {
    $coloras="yellow";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>7 Uzduotis</title>

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
// Pakartokite 6 uždavinį.
// Papildykite jį kodu, kuris naršyklę po POST metodo peradresuotų tuo pačiu adresu (t.y. į
// patį save) jau GET metodu.

?>
<!-- GET -->
<div class="ties">
    <form id="ge" action="" method="get" name="getas">
        <button type="submit">Get metodas</button>
    </form>


    <!-- POST -->
    <form id="po" action="" method="post" name="postas">
        <button>
            Post metodas
        </button>
    </form>
</div>

    
</body>
</html>