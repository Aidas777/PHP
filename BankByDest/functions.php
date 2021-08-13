<?php
function getSask(): array
{
    if (!file_exists(__DIR__ . '/saskaitos.json')) {
        $saskaitos = [];
        $saskaitos = json_encode($saskaitos);
        file_put_contents(__DIR__ . '/saskaitos.json', $saskaitos);
    }
    return json_decode(file_get_contents(__DIR__ . '/saskaitos.json'), 1);
}

function setSask(array $saskaitos): void
{
    $saskaitos = json_encode($saskaitos);
    file_put_contents(__DIR__ . '/saskaitos.json', $saskaitos);
}

function setNauja()
{
    $saskaitos = json_decode(file_get_contents(__DIR__ . '/saskaitos.json'), 1);
    // $sNr = "LT127044000" .date("ymd") .(date("H")+3) .date("i");
    
    $sNr = $_POST["sNr"];
    $ak = AkPatikra( (int)$_POST["ak"] );
    $vard= varduPatikra($_POST["vardas"]);
    $pavard=varduPatikra($_POST["pavarde"]);

    // $nr = rand(1000000000, 9999999999); // netikras unikalus skaicius
    // $nauja = ["juodieji" => 0, "rudieji" => 0, "SaskNr" => $sNr];
    if ($sNr and $ak and $vard and $pavard) {
        $nauja = [
            "vardas" => $vard, "pavarde" => $pavard,
            "ak" => $ak, "SaskNr" => $sNr, "Likutis" => 0];
            
        $saskaitos[] = $nauja;
        $saskaitos = json_encode($saskaitos);
        file_put_contents(__DIR__ . '/saskaitos.json', $saskaitos);
        return true;

    } else {
        $msg="Kazkas negerai su duomenimis ! Patikrinkite." .json_encode($sNr) 
        ." // ak: " .json_encode($ak) ." // vard: " .json_encode($vard) ." // pavard: " .json_encode($pavard);

        Rodyk($msg);
        addMsg($msg, "danger");
        return false;
    }
}

function router()
{
    $route = $_GET['route'] ?? '';
    if ('GET' == $_SERVER['REQUEST_METHOD'] && '' == $route) {
        pirmasPuslapis();
    } elseif ('GET' == $_SERVER['REQUEST_METHOD'] && 'nauja' == $route) {
        rodytiNaujaPuslapi();
    } elseif ('POST' == $_SERVER['REQUEST_METHOD'] && 'nauja' == $route) {
        sukurtiNaujaSaskaita();
    } elseif ('POST' == $_SERVER['REQUEST_METHOD'] && 'naikinti' == $route && isset($_GET["id"])) {
        NaikintiSask($_GET['id']);
    } elseif ('POST' == $_SERVER['REQUEST_METHOD'] && 'prideti-juodus' == $route && isset($_GET["id"])) {
        pridetiJuodus($_GET["id"]);
    } elseif ('POST' == $_SERVER['REQUEST_METHOD'] && 'atimti-juodus' == $route && isset($_GET["id"])) {
        atimtiJuodus($_GET["id"]);
    } elseif ('POST' == $_SERVER['REQUEST_METHOD'] && 'prideti-rudus' == $route && isset($_GET["id"])) {
        pridetiRudus($_GET["id"]);
    } elseif ('POST' == $_SERVER['REQUEST_METHOD'] && 'atimti-rudus' == $route && isset($_GET["id"])) {
        atimtiRudus($_GET["id"]);
    } else {
        echo 'Bliaxa muxa Page not found 404';
        die;
    }
}


function pridetiJuodus(String $id)
{
    $saskaitos = getSask();
    foreach ($saskaitos as &$saskaita) {
        if ($id == $saskaita["SaskNr"]) {
            $saskaita['juodieji'] += (int)$_POST['j_plus'];
            break;
        }
    }
    setSask($saskaitos);
    header('Location: ' . URL);
}
function atimtiJuodus(String $id)
{
    $saskaitos = getSask();
    foreach ($saskaitos as &$saskaita) {
        if ($id == $saskaita["SaskNr"]) {
            $saskaita['juodieji'] -= (int)$_POST['j_minus'];
            break;
        }
    }
    setSask($saskaitos);
    header('Location: ' . URL);
}
function pridetiRudus(String $id)
{
    $saskaitos = getSask();
    foreach ($saskaitos as &$saskaita) {
        if ($id == $saskaita["SaskNr"]) {
            $saskaita['rudieji'] += (int)$_POST['r_plus'];
            break;
        }
    }
    setSask($saskaitos);
    header('Location: ' . URL);
}
function atimtiRudus(String $id)
{
    $saskaitos = getSask();
    foreach ($saskaitos as &$saskaita) {
        if ($id == $saskaita["SaskNr"]) {
            $saskaita['rudieji'] -= (int)$_POST['r_minus'];
            break;
        }
    }
    setSask($saskaitos);
    header('Location: ' . URL);
}

function pirmasPuslapis()
{
    $saskaitos = getSask();
    require __DIR__ . '/view/pirmas.php';
}

function rodytiNaujaPuslapi()
{
    $sNr = SukurtiSnr();
    require __DIR__ . '/view/naujaSask.php';
}

//ASM KODO, VARDU PATIKRA IR SASK.NR SUDARYMAS

function varduPatikra($names) {
    return $names;
}

function SukurtiSnr()
{
    $saskaitos = getSask();
    $kartojas = true;
    while ($kartojas == true) {

        $sGalas = rand(10000000, 99999999);
        $snr = "LT1270440000" . $sGalas;

        $kartojas = false;
        $count = 0;
        foreach ($saskaitos as $index => $saskaita) {
            $count++;
            if ($saskaita["SaskNr"] ==  $snr) {
                $kartojas = true;
                break;
            }
            if ($count > $sGalas) {
                $msg="SASKAITU NUMEIRIAI BAIGESI !!! REIKIA DIDESNIO SKAITMENU FORMATO.";
                Rodyk($msg);
                addMsg($msg, "danger");
                return false;
            }
        }
    }
    return $snr;

    //     exit;
    //     // $sGalas=rand(0, 99999999);
    //     // $sGalas=rand(0, 10);
    //     // $snr = "LT1270440000" .$sGalas;
    //    do {
    //         // $sGalas=rand(0, 99999999);
    //         $sGalas=rand(0, 10);
    //         $snr = "LT1270440000" .$sGalas;
    //     } while ($saskaitos["SaskNr"] == $snr );
    //     return $snr;

}

function AkPatikra($ak) {

    if (  empty($ak) or $ak=="" or is_null($ak)  ) {
        addMsg("Nurodykite asmens koda !", "danger");
        return false;
    }


    if (   (strval($ak))[0] != 3 and (strval($ak))[0] != "4"  ) {
        $msg="Asmens kodo pradzia neteisinga ! Pakreguokite.";
        Rodyk($msg);
        addMsg($msg, "danger");
        return false;
    } 
 
    // if (strlen($ak) != 11) {
    //     $msg="Asmens kodas pertrumpas ar perilgas ! Pakreguokite.";
    //     Rodyk($msg);
    //     addMsg($msg, "danger");
    //     return false;
    // }

    if ( ! is_numeric($ak) ) {
        addMsg("Asmens kodas turi buti tik is skaiciu ! Pakreguokite.", "danger");
        return false;
    }

    $saskaitos = getSask();

    foreach ($saskaitos as $index => $saskaita) {
        // addMsg($ak, "blia");
        // if (isset($saskaita["ak"])) {
        //     Rodyk("ak is Saskaitu: " .$saskaita["ak"] ." /// ak ivestas dabar: " .$ak);
        // }

        if ($ak == $saskaita["ak"]) {
            $msg="Toks asm.kodas ".$ak ." jau yra !";
            Rodyk($msg);
            addMsg($msg, "danger");
            return false;
        }
    }
    return $ak;
}

function sukurtiNaujaSaskaita()
{
    // Rodyk( json_encode(setNauja()) );
    // exit;
    if (setNauja() == true) {
        header('Location: ' .URL);
        die;
    } else {
        // $ReSNr = "0001";
        // $ReAk = $_POST["ak"];
        // $ReVard= $_POST["vardas"];
        // $RePavard=$_POST["pavarde"];

        header("Location: http://localhost/PHP/BankByDest/Bankas.php?route=nauja");
        die;
    }
}

function NaikintiSask(String $id)
{
    $saskaitos = getSask();
    foreach ($saskaitos as $index => $saskaita) {
        if ($id == $saskaita["SaskNr"]) {
            unset($saskaitos[$index]);
            break;
        }
    }
    setSask($saskaitos);
    header('Location: ' . URL);
}

function addMsg(string $msgTxt, string $msgTyp)
{
    $_SESSION["msg"][] = ["msg" => $msgTxt, "msgTyp" => $msgTyp];
}

function Rodyk(string $pranes) {
 echo "<script>alert(' $pranes ')</script>";
//  echo '<script>alert("SASKAITU NUMEIRIAI BAIGESI !!! REIKIA DIDESNIO SKAITMENU FORMATO.")</script>';
}

function getVardas() {
    // return isset($_POST["vardas"]) ? $_POST["vardas"] : "nieko nesetinta";
    echo isset($_POST["vardas"]) ? $_POST["vardas"] : "nieko nesetinta";
    // exit;
}
