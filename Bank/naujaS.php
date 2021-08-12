<?php
require __DIR__ ."/functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nauja Sąskaita</title>

    <style>

        html {
            font-family: Calibri;
        }

        body {
            margin: 0 auto;
            background-color: #cccc;
            width: 95%;
        }

        div {
            margin-left: 0;
            margin-right: 0;
            display: flex;
            flex-wrap: wrap;
        }

        form {
            display: flex;
            margin-top: 5%;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            justify-content: center;
        }
        .inBox {
            /* min-width: 30%; */
            width: 100%;
            display: block;
        }
        input {
            font-size: 16px
        }
        label {
            text-align: center;
            font-size: 20px;
        }
        .nextIn {
            margin-left: 1%;
        }
        .wide {
            width: 100%;
        }
        .btn {
            height: 24px;
            font-size: 16px;
            vertical-align: middle;
            margin-top: auto;
            margin-bottom: 0;


        }


    </style>

</head>
<body>

<!-- <form action="http://localhost/php/bank/index.php" method="post"> -->
<form action="" method="post">
    <div>
        <label class="inBox">Vardas</label>
        <input class="inBox" type="text" name="vardas">
    </div>

    <div class="nextIn">
        <label class="inBox">Pavarde</label>
        <input class="inBox" type="text" name="pavarde">
    </div>

    <div class="nextIn">
        <label class="inBox">Sąskaitos Nr.</label>
        <input class="inBox" type="text" name="sNr">
    </div>

    <div class="nextIn">
        <label class="inBox">Asmens kodas</label>
        <input class="inBox" type="text" name="ak">
    </div>

    <button class="nextIn btn" type="submit" name="Sukurti">Sukurti</button>
    

</form>
<br>

<div>
    <h4 class="msg"></h4>
</div>

<button class="nextIn" type="submit">Gryzti</button>

</body>
</html>