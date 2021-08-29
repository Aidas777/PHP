<?php
    // require_once dirname(__DIR__ ,1) ."/indexx.php ";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banko saskaitos Pagal Destytoja</title>

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->

    <style>
        html {
            font-family: Calibri;
        }

        body {
            background-color: #cccc;
            width: 60%;
            margin: 0 auto;
        }

        div,
        h2 {
            margin: 5px;
            padding: 7px;
            border: 1px solid rgb(92, 92, 92);
            font-size: 18px;
        }

        .divNBig {
            width: 70%;
            margin-left: auto;
            margin-right: auto;
            background-color: rgb(220, 216, 238);
        }

        .divBigPlus {
            width: 70%;
            margin-left: auto;
            margin-right: auto;
            /* background-color: rgb(159, 233, 130); */
            background-color: rgb(223, 247, 199);
        }

        .divBigPlus h1, .divBigMinus h1 {
            font-size: 22px;
            text-align: center;
        }

        .divBigMinus {
            width: 70%;
            margin-left: auto;
            margin-right: auto;
            background-color: rgb(247, 209, 203);
        }

        .divN {
            width: 95%;
            margin-left: auto;
            margin-right: auto;
        }

        .divSmallPlus {
            display: flex;
            justify-content: space-around;
        }

        label {
            display: inline-block;
            width: 140px;
            font-size: 20px;
            font-weight: 700;
            text-align: center;
        }

        .nav-fixed {
            margin: 0;
            padding: 0;
            border: none;
            position: fixed;
        }

        nav {
            /* position: fixed; */
            /* width: 60%; */
            /* background: gray; */
            /* background: lightslategray; */
            background-color: rgb(137, 165, 192);
            margin: 10px 5px;
            /* margin-top: 0; */

            /* margin-top: 10px; */
            padding: 5px;
            box-shadow: 5px 5px 5px rgb(64, 76, 90);
            /* position: fixed; */
        }

        nav a {
            display: inline-block;
            margin: 4px;
            font-size: 26px;
            text-decoration: none;
            color: black;
        }

        .secNav {
            display: flex;
            margin-top: 0;
            margin-bottom: 0;
            padding-top: 2px;
            padding-bottom: 10px;
            /* border-radius: 15px; */
            /* border-color: sienna; */
            border: none;
            justify-content: space-between;
        }

        /* .nav-area {
            position: fixed;
        } */

        .btnNav {
            /* display: inline-block; */
            margin: 4px;
            padding-top: 5px;
            padding-bottom: 5px;
            padding-left: 10px;
            padding-right: 10px;
            font-size: 18px;
            text-decoration: none;
            color: white;
            font-weight: 400;
            /* background-color: lightblue; */
            border-radius: 6px;
            border: none;
            /* background-color: rgb(83, 95, 107); */
            /* background-color: rgb(78, 93, 110); */
            background-color: rgb(105, 127, 148);
            box-shadow: 5px 5px 5px rgb(64, 76, 90);
        }

        .btnNavPlus {
            margin: 5px;
            margin-left: 7px;

            padding-top: 0;
            padding-bottom: 0;
            padding-left: 10px;
            padding-right: 10px;
            font-size: 18px;
            text-decoration: none;
            color: white;
            font-weight: 400;
            /* background-color: lightblue; */
            border-radius: 6px;
            border: none;
            /* background-color: rgb(83, 95, 107); */
            /* background-color: rgb(78, 93, 110); */
            background-color: rgb(105, 127, 148);
            box-shadow: 5px 5px 5px rgb(64, 76, 90);
        }

        /* form {
            width: 90%;
            margin-left: auto;
            margin-right: auto;
        } */

        .klientas {
            width: 80%;
            margin-top: 5px;
            padding: 7px;
            border: 2px solid black;
            box-shadow: 10px 10px 10px rgb(64, 76, 90);
            margin-left: auto;
            margin-right: auto;
            /* background-color: rgb(205, 228, 255); */
            background-color: rgb(223, 235, 250);
        }

        .klientas h1 {
            margin-top: 5px;
            margin-right: 5px;
            margin-left: 5px;
            margin-bottom: 0;
            padding: 7px;
            font-size: 22px;
        }

        .btnCreate {
            font-size: 20px;
            padding: 5px;
            margin-left: 50%;
            transform: translateX(-50%);
        }

        button.btnNav:hover {
            cursor: pointer;
            background-color: rgb(78, 93, 110);
        }

        .secBtn {
            margin-left: 5px;
            /* background-color: rgb(184, 121, 110); */
            background-color: rgb(255, 169, 154);
            padding: 5px;
            border-radius: 5px;
            border: none;
            margin-top: 3px;
            margin-bottom: 3px;
            box-shadow: 5px 5px 5px rgb(64, 76, 90);
            font-size: 14px;
            color: rgb(59, 16, 3);
            font-weight: 600;
        }

        .btnLL {
            background-color: rgb(215, 248, 165);
            color: darkolivegreen;
        }

        .btnLR {
            background-color: rgb(148, 175, 231);
            color: midnightblue;
            margin-left: 10px;
        }

        .secNavLeftBtns {
            width: 60%;
            display: flex;
            margin: 0;
            padding: 0;
            border: none;
        }

        .neimas {
            display: inline-flex;
            width: 40%;
            justify-content: center;
        }

        .neimas-eur {
            display: inline-flex;
            width: 30%;
            justify-content: center;
        }

        .neimas-eur-plus {
            display: inline-flex;
            width: 25%;
            font-size: 18px;
            justify-content: center;
        }

        .NoMargin {
            margin: 0;
            padding: 0;
            border: transparent;
            display: flex;
        }

        .dataFLD-inact {
            width: 70%;
        }

        .dataFLD-inact-eur {
            width: 30%;
            text-align: center;
            background-color: rgb(237, 255, 195);
        }

        .dataFLD-inact-eur-plus {
            width: 15%;
            text-align: center;
            /* color: rgb(89, 161, 6); */
            color: grey;
            background-color: rgb(236, 255, 218);
            border: none;
            font-size: 20px;
            font-weight: 400;
        }

        .dataFLD-inact-eur-minus {
            width: 15%;
            text-align: center;
            /* color: rgb(89, 161, 6); */
            color: grey;
            background-color: rgb(250, 236, 234);
            border: none;
            font-size: 20px;
            font-weight: 400;
        }

        .centr {
            display: flex;
            justify-content: center;

        }

        .sNrBig {
            margin-bottom: 0;
        }

        .noBorder {
            border: none;
            margin-top: 20px;
        }

        .inLbl {
            margin-top: auto;
            margin-bottom: auto;
        }

        .inLblPlus {
            width: 40%;
        }

        .inBox {
            width: 40%;
            font-size: 16px;
        }

        .inBoxPlus {
            width: 20%;
            font-size: 20px;
            /* font-weight: 600; */
            text-align: center;
            margin-top: 5px;
            margin-bottom: 5px;
            color: rgb(74, 52, 173);
        }

        .sNrShow {
            font-size: 22px !important;
            margin-top: auto;
            margin-bottom: auto;
        }

        .namePlus {
            width: 40%;
            text-align: center;
            margin-top: 0;
            margin-bottom: 0;
        }

        .msg {
            font-size: 22px;
            margin-left: 5px;
            margin-right: 5px;
            margin-top: 15px;
            margin-bottom: 15px;
            padding: 3px;
            color: <?= $_SESSION["msg"]["msgTyp"] ?? "black" ?>;
            background-color: <?= MsgBackC(); ?>;
            border-radius: 7px;
        }

        .saskSk {
            display: inline-flex;
            float: right;
            margin-right: 5px;
            padding-bottom: 5px;
            /* margin-bottom: 4px; */
            margin-top: 10px;
        }

        .container {
            width: 80%;
            background-color: lime;
        }
    </style>
</head>

<body>

    <!-- <div class="nav-fixed"> -->
        <nav>
            <!-- <a href="<?= URL ?>">Sąrašas</a> -->
            <button onclick="location.href= '<?= URL ?>'" class="btnNav">Sąrašas</button>
            <!-- <button onclick="location.href= '<?= URL ?>'" class="btn btn-primary">Sąrašas</button> -->

            <?php if ("nauja" != ($_GET["route"] ?? "") ) : ?>
            <!-- <a href="<?= URL ?>?route=nauja">Nauja sąskaita</a> -->
            <button onclick="location.href= '<?= URL ?>?route=nauja'" class="btnNav">Nauja sąskaita</button>

            <!-- <button onclick="location.href= '<?= URL ?>'" class="btnNav">Gryzti i sarasa</button> -->
            <?php echo "<p class='saskSk'>Šiuo metu sąskaitų yra: " .count($saskaitos) ."</p>" ?>
            <?php endif; ?>

            <a href="<?= URL ?>?route=Users">useriai</a>
            
        </nav>

        <?php
        RodykMsg();
        // require_once __DIR__ ."/msg.php";
        ?>
    <!-- </div> -->