<?php
session_start();

// Duomenu surinkimo scenarijus
if ( $_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST)) {
    foreach ($_POST as $key => $value) {
        $_SESSION[$key] = $value;
    }
    header("Location: 10.php");
    die;
}
// Jei nera duomenu
// echo count($_SESSION);
if (count($_SESSION) == 0) {

    $backC = "black";
    $txtC= "white";
    echo "<style> #rezult {display: none;}</style>";
    echo "<style> #forma {display: block;} </style>";
}

// Duomenu atvaizdavimo scenarijus

if ( count($_SESSION) > 0 ) {
    $ltrs=null;
    $qty= count($_SESSION);
    // echo "Kiekis: " .$qty;
    foreach ($_SESSION as $key => $value) {
        $ltrs=$ltrs .$key .", ";
        $generatedQty=$value;
        // echo "Gen: " .$generatedQty ." ";
    }

    $backC = "white";
    $txtC= "black";
    // $txtC= "white";
    echo "<style> #forma {display: none;}" ."body {background-color: white;}</style>";
    echo "<style> #rezult {display: block;}</style>";

    // echo "Raides: " .$ltrs;
    // print_r($_SESSION);
    $_SESSION=[];
    // session_destroy();
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>10 Uzduotis (su Sesija)</title>

    <style>
        body {
            width: 80%;
            background-color: <?= $backC ?> ;
            margin-left: auto;
            margin-right: auto;
            /* background-color: rgb(126, 184, 250); */
            /* background-color: black; */
        }

        .centr {
            display: block;
            margin-left: 50%;
            transform: translateX(-50%);
        }

        .txt {
            color: <?= $txtC ?> ;
            justify-content: center;
            width: 20%;
            margin-top: 50px;
        }

        #forma {
            margin-top: 50px;
            width: 15%;
            margin-right: auto;
            margin-left: 55%;
            justify-content: center;

            /* border: 1px solid black;
            width: 7%; */
        }

    </style>

</head>

<?php
// Pakartokite 9 uždavinį.
// Padarykite taip, kad atsirastų du skaičiai.
// Vienas rodytų kiek buvo pažymėta, o kitas kiek iš vis buvo jų sugeneruota.

?>
<body>
    
        <form action="" method="post" class="centr" id="forma">
            <!-- <input type="checkbox" name="A"><span class="txt"> &nbsp A</span></input> -->
            <?php
                $ChBoxQty=rand(3, 10);
                $lett=chr(65);
                for ($i=0; $i < $ChBoxQty; $i++) { 

                    echo "<input type='checkbox' name=" .$lett ." value=" .($ChBoxQty) ."><span class='txt'> &nbsp " 
                    .$lett ."</span></input>"."<br>";

                    $lett++;
                }
            ?>
            <br><br>
            <button type="submit">Skaiciuoti varnas</button>
            <br><br>

        </form>

        <div class="centr txt" id="rezult">
            Viso buvo sugeneruoti <?= isset($generatedQty) ? $generatedQty: null ?> check-boxai.
            <br><br>
            Buvo uzdetos <?= isset($qty) ? $qty : 0 ?> varneles.
            <br><br>
            Pazymeti Check-boxai: <br> <?= $ltrs ?>
        </div>

</body>
</html>