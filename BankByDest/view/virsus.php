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

        div, h2 {
            margin: 5px;
            padding: 7px;
            border: 1px solid rgb(92, 92, 92);
            font-size: 18px;
        }

        label {
            display: inline-block;
            width: 140px;
            font-size: 20px;
            font-weight: 700;
            text-align: center;
        }

        nav {
            /* background: gray; */
            /* background: lightslategray; */
            background-color: rgb(137, 165, 192);
            margin: 30px 5px;
            padding: 5px;
            box-shadow: 5px 5px 5px rgb(64, 76, 90);
        }

        nav a {
            display: inline-block;
            margin: 4px;
            font-size: 26px;
            text-decoration: none;
            color: black;
        }

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

        /* form {
            width: 80%;
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
        }

        .klientas h1 {
            margin: 5px;
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
            background-color:rgb(184, 121, 110);
            padding: 5px;
            border-radius: 5px;
            border: none;
            margin-bottom: 3px;
            box-shadow: 5px 5px 5px rgb(64, 76, 90);
            font-size: 14px;
            color: rgb(59, 16, 3);
            font-weight: 600;
        }

        .neimas {
            display: inline-flex;
            width: 40%;
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

    </style>
</head>

<body>
    <nav>
        <!-- <a href="<?= URL ?>">Sąrašas</a> -->
        <button onclick="location.href= '<?= URL ?>'" class="btnNav">Sąrašas</button>
        <!-- <button onclick="location.href= '<?= URL ?>'" class="btn btn-primary">Sąrašas</button> -->

        <!-- <a href="<?= URL ?>?route=nauja">Nauja sąskaita</a> -->
        <button onclick="location.href= '<?= URL ?>?route=nauja'" class="btnNav">Nauja sąskaita</button>

        <button onclick="location.href= '<?= URL ?>'" class="btnNav">Gryzti i sarasa</button>
    </nav>