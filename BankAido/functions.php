<?php
// function getSask(): array
// {
//     if (!file_exists(__DIR__ . '/saskaitos.json')) {
//         $saskaitos = [];
//         $saskaitos = json_encode($saskaitos);
//         file_put_contents(__DIR__ . '/saskaitos.json', $saskaitos);
//     }
//     return json_decode(file_get_contents(__DIR__ . '/saskaitos.json'), 1);
// }

// function setSask(array $saskaitos): void
// {
//     $saskaitos = json_encode($saskaitos);
//     file_put_contents(__DIR__ . '/saskaitos.json', $saskaitos);
// }

// function setNauja()
// {
//     $saskaitos = json_decode(file_get_contents(__DIR__ . '/saskaitos.json'), 1);
//     // $sNr = "LT127044000" .date("ymd") .(date("H")+3) .date("i");

//     $sNr = $_POST["sNr"];
//     $ak = AkPatikra($_POST["ak"]);
//     $vard = varduPatikra($_POST["vardas"]);
//     $pavard = varduPatikra($_POST["pavarde"]);

//     // $nr = rand(1000000000, 9999999999); // netikras unikalus skaicius
//     // $nauja = ["juodieji" => 0, "rudieji" => 0, "SaskNr" => $sNr];
//     if ($sNr and $ak and $vard and $pavard) {
//         $nauja = [
//             "vardas" => $vard, "pavarde" => $pavard,
//             "ak" => $ak, "SaskNr" => $sNr, "Likutis" => 0
//         ];

//         $saskaitos[] = $nauja;
//         $saskaitos = json_encode($saskaitos);
//         file_put_contents(__DIR__ . '/saskaitos.json', $saskaitos);
//         $msg = "Saskaita SEKMINGAI sukurta !";
//         addMsg($msg, GREENF);

//         return true;
//     } else {
//         // $msg="Kazkas negerai su duomenimis ! Patikrinkite." .json_encode($sNr) 
//         // ." // ak: " .json_encode($ak) ." // vard: " .json_encode($vard) ." // pavard: " .json_encode($pavard);

//         // Rodyk($msg);
//         // addMsg($msg, REDF);
//         return false;
//     }
// }



function PuslPlus($sNr)
{
    $saskaitos = getSask();

    foreach ($saskaitos as $index => $saskaita) {
        if ($saskaita["SaskNr"] == $sNr) {
            $saskPerson = $saskaita;
            // var_dump($saskPerson);
            // die;
            break;
        }
    }

    require __DIR__ . "/view/pridetEur.php";
}

function EurPlus($sNr)
{
    $saskaitos = getSask();

    foreach ($saskaitos as $index => &$saskaita) {
        if ($saskaita["SaskNr"] == $sNr) {
            $saskaita["Likutis"] = $saskaita["Likutis"] + (int)$_POST["plus"];
            $msg = "Lėšos SEKMINGAI papildytos !";
            addMsg($msg, GREENF);
            break;
        }
    }
    setSask($saskaitos);
    header("Location: #");
    die;
}
///
function EurMinus($sNr)
{
    if (empty($_POST["minus"])) {
        $msg = "Nurodykite suma !";
        addMsg($msg, REDF);
        header("Location: #");
        die;
    }
    $saskaitos = getSask();

    foreach ($saskaitos as $index => &$saskaita) {
        if ($saskaita["SaskNr"] == $sNr) {
            if ($saskaita["Likutis"] >= (int)$_POST["minus"]) {
                $saskaita["Likutis"] = $saskaita["Likutis"] - (int)$_POST["minus"];
                $msg = "Lėšos SEKMINGAI nuskaičiuotos !";
                addMsg($msg, GREENF);
                setSask($saskaitos);
                // break;
            } else {
                $msg = "Tiek lėšų NĖRA ! Nurodykite mažesnę sumą.";
                addMsg($msg, REDF);
                // break;
            }
            break;
        }
    }
    header("Location: #");
    die;
}
///
function PuslMinus($sNr)
{
    $saskaitos = getSask();

    foreach ($saskaitos as $index => $saskaita) {
        if ($saskaita["SaskNr"] == $sNr) {
            $saskPerson = $saskaita;
            // var_dump($saskPerson);
            // die;
            break;
        }
    }

    require __DIR__ . "/view/atimtiEur.php";
}


// function pirmasPuslapis()
// function showAll()
// {
//     $saskaitos = getSask();
//     require __DIR__ . '/view/pirmas.php';
// }

// function rodytiNaujaPuslapi()
// {
//     $sNr = SukurtiSnr();
//     require __DIR__ . '/view/naujaSask.php';
// }

//ASM KODO, VARDU PATIKRA IR SASK.NR SUDARYMAS

// function varduPatikra($names)
// {
//     if (strlen($names) <=3 ) {
//         $msg = "Vardas ir Pavarde turi buti ilgesni nei 3 simboliai ! Pakoreguokite.";
//         addMsg($msg, REDF);
//         return false;
//     }
//     return $names;
// }

// function SukurtiSnr()
// {
//     $saskaitos = getSask();
//     $kartojas = true;
//     while ($kartojas == true) {

//         $sGalas = rand(10000000, 99999999);
//         $snr = "LT1270440000" . $sGalas;

//         $kartojas = false;
//         $count = 0;
//         foreach ($saskaitos as $index => $saskaita) {
//             $count++;
//             if ($saskaita["SaskNr"] ==  $snr) {
//                 $kartojas = true;
//                 break;
//             }
//             if ($count > $sGalas) {
//                 $msg = "SASKAITU NUMEIRIAI BAIGESI !!! REIKIA DIDESNIO SKAITMENU FORMATO.";
//                 addMsg($msg, REDF);
//                 return false;
//             }
//         }
//     }
//     return $snr;

//     //     exit;
//     //     // $sGalas=rand(0, 99999999);
//     //     // $sGalas=rand(0, 10);
//     //     // $snr = "LT1270440000" .$sGalas;
//     //    do {
//     //         // $sGalas=rand(0, 99999999);
//     //         $sGalas=rand(0, 10);
//     //         $snr = "LT1270440000" .$sGalas;
//     //     } while ($saskaitos["SaskNr"] == $snr );
//     //     return $snr;

// }

// function AkPatikra($ak)
// {

//     if (empty($ak) or $ak == "" or is_null($ak)) {
//         addMsg("Nurodykite asmens koda !", REDF);
//         return false;
//     }


//     if ((strval($ak))[0] != 3 and (strval($ak))[0] != "4") {
//         $msg = "Asmens kodo pradzia neteisinga ! Pakreguokite.";
//         Rodyk($msg);
//         addMsg($msg, REDF);
//         return false;
//     }

//     if (strlen($ak) != 11) {
//         $msg = "Asmens kodas turi sudaryti 11 skaitmenu ! Pakreguokite.";
//         Rodyk($msg);
//         addMsg($msg, REDF);
//         return false;
//     }

//     if (!is_numeric($ak)) {
//         addMsg("Asmens kodas turi buti tik is skaiciu ! Pakreguokite.", REDF);
//         return false;
//     }

//     $saskaitos = getSask();

//     foreach ($saskaitos as $index => $saskaita) {
//         // addMsg($ak, "blia");
//         // if (isset($saskaita["ak"])) {
//         //     Rodyk("ak is Saskaitu: " .$saskaita["ak"] ." /// ak ivestas dabar: " .$ak);
//         // }

//         if ($ak == $saskaita["ak"]) {
//             $msg = "Toks asm.kodas " . $ak . " jau yra !";
//             addMsg($msg, REDF);
//             return false;
//         }
//     }
//     return $ak;
// }

// function sukurtiNaujaSaskaita()
// {
//     // Rodyk( json_encode(setNauja()) );
//     // exit;
//     if (setNauja() == true) {
//         header('Location: ' . URL);
//         die;
//     } else {
//         $ReSNr = "0001";
//         $ReAk = $_POST["ak"];
//         $ReVard = $_POST["vardas"];
//         $RePavard = $_POST["pavarde"];
//         $_SESSION["ReData"] = ["ReSNr" => $ReSNr, "ReAk" => $ReAk, "ReVard" => $ReVard, "RePavard" => $RePavard];

//         header("Location: http://localhost/PHP/BankByDest/Bankas.php?route=nauja");
//         die;
//     }
// }

function NaikintiSask(String $id)
{
    $saskaitos = getSask();
    foreach ($saskaitos as $index => $saskaita) {
        if ($id == $saskaita["SaskNr"]) {
            if ((int)$saskaita["Likutis"] > 0) {
                $msg = "Sąskaitoje yra likę lėšų ! Naikinti NEGALIMA.";
                addMsg($msg, REDF);
            } else {
                unset($saskaitos[$index]);
                setSask($saskaitos);
            }
            break;
        }
    }

    header('Location: ' . URL);
    die;
}

function addMsg(string $msgTxt, string $msgTyp)
{
    $_SESSION["msg"] = ["msg" => $msgTxt, "msgTyp" => $msgTyp];
}

function Rodyk(string $pranes)
{
    echo "<script>alert(' $pranes ')</script>";
    //  echo '<script>alert("SASKAITU NUMEIRIAI BAIGESI !!! REIKIA DIDESNIO SKAITMENU FORMATO.")</script>';
}

// function getVardas() {
//     // return isset($_POST["vardas"]) ? $_POST["vardas"] : "nieko nesetinta";
//     return isset($_POST["vardas"]) ? $_POST["vardas"] : "nieko nesetinta";
//     // exit;
// }

function ReData($tip)
{
    if (!empty($_SESSION["ReData"])) {
        $ReDATA = $_SESSION["ReData"];
        if ($tip == "vard") {
            // $ReDuom= $ReDATA["ReVard"];
            $_SESSION["ReData"]["ReVard"] = null;
        } elseif ($tip == "pavard") {
            // $ReDuom= $ReDATA["RePavard"];
            $_SESSION["ReData"]["RePavard"] = null;
        } elseif ($tip == "ak") {
            // $ReDuom= $ReDATA["ReAk"];
            $_SESSION["ReData"]["ReAk"] = null;
        }

        if (
            $_SESSION["ReData"]["ReVard"] == null and  $_SESSION["ReData"]["RePavard"] == null and
            $_SESSION["ReData"]["ReAk"] == null
        ) {
            $_SESSION["ReData"] = [];
        }
        return $ReDATA;
    }
    return null;
    // $_SESSION["ReData"] = ["ReSNr" => $ReSNr, "ReAk"=>$ReAk, "ReVard"=> $ReVard, "RePavard"=>$RePavard];
}

function RodykMsg()
{
    $message = $_SESSION["msg"] ?? "";

    $_SESSION["msg"] = [];
    require __DIR__ . "/view/msg.php";
}

function MsgBackC()
{

    if (REDF == $_SESSION["msg"]["msgTyp"] ?? "") {
        // BACK FONAS RAUDONAS
        $backC = REDB;
    } else {
        // BACK FONAS ZALIAS
        $backC = GREENB;
    }
    return $backC;
}

function RusiuokByPavarde($saskaitosObj): void
{
    // $saskaitos = getSask();
    $saskaitos =  $saskaitosObj->getSaskaitos();
    usort($saskaitos, "PalyginkPavardes");
    setSask($saskaitos);
}

function PalyginkPavardes($a, $b)
{
    if (strtoupper($a["pavarde"]) == strtoupper($b["pavarde"])) return 0;
    return (strtoupper($a["pavarde"]) < strtoupper($b["pavarde"])) ? -1 : 1;
}


function Cons($kintamasis) {
    echo("<script>console.log('PHP: " . json_encode($kintamasis) ."');</script>");
}




// function my_sort($a, $b) {
//     if ($a == $b) return 0;
//     return ($a < $b) ? -1 : 1;
// }

// $a = array(4, 2, 8, 6);
// usort($a, "my_sort");
