<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>9 Uzduotis (be Sesijos)</title>

    <?php

        echo "<style> #forma {display: block;} </style>";
        if (array_sum($_POST) > 0) {
            $backC = "white";
            $txtC= "black";
            echo "<style> #forma {display: none;}" ."body {background-color: white;}</style>";
            echo "<style> #rezult {display: block;}</style>";
        } else {
            $backC = "black";
            $txtC= "white";
            echo "<style> #rezult {display: none;}</style>";
        }
    ?>

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
// Padarykite juodą puslapį, kuriame būtų POST forma, mygtukas ir atsitiktinis kiekis (3-10) checkbox su 
// raidėm A,B,C… Padarykite taip, kad paspaudus mygtuką, fono spalva pasikeistų į baltą, forma išnyktų ir 
// atsirastų skaičius, rodantis kiek buvo pažymėta checkboksų (ne kurie, o kiek). 



?>
<body>
    
        <form action="" method="post" class="centr" id="forma">
            <!-- <input type="checkbox" name="A"><span class="txt"> &nbsp A</span></input> -->
            <?php
                $ChBoxQty=rand(3, 10);
                $lett=chr(65);
                for ($i=0; $i < $ChBoxQty; $i++) { 

                    echo "<input type='checkbox' name=" .$lett ." value=" .(1) ."><span class='txt'> &nbsp " 
                    .$lett ."</span></input>"."<br>";

                    $lett++;
                }
                $marked= array_sum($_POST);
                $kart=null;
            ?>
            <input type="hidden" name="k" value= <?= (int) $kart++ ?> ></input>
            <br><br>
            <button type="submit">Skaiciuoti varnas</button>
            <br><br>

        </form>

        <div class="centr txt" id="rezult">
            <?= "Buvo uzdetos " .$marked ." varneles."?>
            
        </div>

        <?php
                // for ($i=0; $i < count($_POST) ; $i++) { 
                //     $lett=chr(65);
                //     isset($_POST[$lett]) ? $_POST[$lett]=null : null;
                //     $lett++;
                //     unset($_REQUEST);
                //     // echo $_POST[$lett] .", ";
                // }
                // foreach ($_POST as $key => &$value) {
                //     $value=null;
                //     echo $value .", ";
                // }
                // unset($_POST);
                // if (! empty($_POST)) {
                //     unset($_POST);
                //     header("Location: bl.php");
                //     die;
                // }
                // print_r($_SERVER);
                if (isset($_POST["k"]) and $_POST["k"] > 1) {
                    header("Location: bl.php");
                    die;
                // } else {
                //     isset($_POST["k"]) ? $_POST["k"]++ : null;
                }
        ?>

</body>
</html>