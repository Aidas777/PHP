<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saskaitu sarasas</title>

    <style>
        body {
            background-color: #cccc;
            font-family: Calibri;
            width: 90%;
            margin-left: auto;
            margin-right: auto;
        }

        .centr {
            display: flex;
            text-align: center;
            justify-content: center;
            width: 80%;
            margin-left:  auto;
            margin-right: auto;
        }

        label {
            font-size: 25px;
            font-weight: 700;
            width: 50%;
            margin-top: 5%;
        }

        input {
            font-size: 17px;
            width: 60%;
            padding: 2%;
        }

        .highBtn, a {
            width: 17%;
            font-size: 14px;
            margin-left: 1%;
            /* padding-left: 5px;
            padding-right: 5px; */
            /* padding-top: auto;
            padding-bottom: auto; */
            margin-top: auto;
            margin-bottom: auto;
            text-decoration: none;
            color: black;
            word-wrap: break-word;
            min-height: 42px;
            /* border: 1px solid #cccc; */
        }

        .grayBorder {
            border: 1px solid rgb(150, 150, 150);
            border-radius: 5px;
        }
        .rezult {
            /* display: inline-flex; */
            width: 60%;
            min-height: 42px;
            vertical-align: middle;
            /* padding-top: 2%;
            padding-bottom: 2%; */
            display: inline;
            margin-left: 1%;
            margin-top: auto;
            margin-bottom: auto;
            line-height: 40px;
            /* align-content: center; */
        }

    </style>

</head>
<body>

<label class="centr">Sąskaitos</label><br>
<form action="" method="post" class="centr">
<div class="centr">
    <!-- <input type="text" name="sNr"> -->
        <h4 class="grayBorder rezult">Vardenis Pavardenis</h4>
        <h3 class="grayBorder rezult"><?= getSaskNr()["SaskNr"] ?></h3>
        <h4 class="grayBorder highBtn">Likutis</h4>
        <button class="highBtn" name="addEur"><a href="webop.php">pridėti lėšų</a></button>
        <button class="highBtn" name="cutEur"><a href="webop.php">nuskaičiuoti lėšas</a></button>
        <button type="submit" class="highBtn" name="del" value="delSask">Istrinti Saskaita</button>
        
    <!-- </input> -->
</div>    

</form>
    
</body>
</html>