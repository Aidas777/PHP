<?php
require __DIR__ . "/virsus.php";
// include_once __DIR__.'/functions.php';
// include_once __DIR__.'/functions.php';
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banko saskaitos Pagal Destytoja</title>
    
    <style>

    html {
        font-family: Calibri;
    }

    body {
        background-color: #cccc;
        width: 60%;
        margin: 0 auto;
    }

    .div, h2 {
        margin: 5px;
        padding: 7px;
        border: 1px solid rgb(92, 92, 92);
        /* font-size: 14px; */
    }

    label {
        /* display: inline-block; */
        width: 140px;
        font-size: 20px;
        font-weight: 700;
        text-align: center;
        margin-right: 10%;
    }

    /* .inLbl {
        margin-right: 10%;
    } */
    nav {
        width: 84%;
        display: flex;
        background: gray;
        align-self: center;
        margin: 20px auto 10px auto;
        padding: 5px;
        justify-content: flex-end;
    }
    nav a {
        display: inline-block;
        margin: 4px;
        font-size: 26px;
        text-decoration: none;
        color: black;
    }
    .klientas {
        margin: 5px;
        padding: 7px;
        border: 2px solid black;
    }
    .btnCreate {
        font-size: 16px;
        padding: 5px;
        /* margin-left: 50%; */
        /* transform: translateX(-50%); */
        margin-right: 10%;
    }

    form {
        width: 80%;
        margin-left: auto;
        margin-right: auto;

    }

    .inBox {
        width: 40%;
        font-size: 16px;
    }

    .centr {
        display: flex;
        justify-content: center;
    }

    .noBorder {
        border: none;
    }

    </style>
</head> -->

<body>

    <!-- <nav>
    <a href="<?= URL ?>">Sąrašas</a>
    <a href="<?= URL ?>?route=nauja">Nauja sąskaita</a>
    <button onclick="location.href= '<?= URL ?>'" class="btnCreate">Gryzti i sarasa</button>
</nav> -->

    <div>

        <form action="<?= URL ?>?route=nauja" method="post">

            <div class="centr div">
                <label class="inLbl">Sąskaitos Nr.</label>
                <input class="inBoxSask" type="text" name="sNr" value="<?= $sNr ?>"><?= chunk_split($sNr, 4) ?></input>
            </div>

            <div class="centr div">
                <label class="inLbl">Vardas</label>
                <input class="inBox" type="text" name="vardas" value="<?= is_null(getVardas()) ? null : getVardas(); ?>">
            </div>

            <div class="centr div">
                <label class="inLbl ">Pavarde</label>
                <input class="inBox" type="text" name="pavarde">
            </div>

            <div class="centr div">
                <label class="inLbl">Asmens kodas</label>
                <input class="inBox" type="text" name="ak">
            </div>

            <div class="noBorder">
                <button type="submit" class="btnCreate btnNav">Sukurti naują sąskaitą</button>
            </div>

        </form>
    </div>

</body>

</html>