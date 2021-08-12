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
            font-size: 12px;
        }

        label {
            display: inline-block;
            width: 140px;
            font-size: 16px;
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
            background-color: lightblue;
            border-radius: 6px;
            border: none;
            /* background-color: rgb(83, 95, 107); */
            /* background-color: rgb(78, 93, 110); */
            background-color: rgb(105, 127, 148);
            box-shadow: 5px 5px 5px rgb(64, 76, 90);
        }

        .klientas {
            margin: 5px;
            padding: 7px;
            border: 2px solid black;
        }

        .klientas h1 {
            margin: 5px;
            padding: 7px;
            font-size: 22px;
        }

        .btnCreate {
            font-size: 16px;
            padding: 5px;
            margin-left: 50%;
            transform: translateX(-50%);
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
    </nav>