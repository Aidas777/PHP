<!DOCTYPE html>
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

    div, h2 {
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
        background: gray;
        margin: 30px 5px;
        padding: 5px;
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
    <a href="<?= URL ?>">Sąrašas</a>
    <a href="<?= URL ?>?route=nauja">Nauja sąskaita</a>
</nav>