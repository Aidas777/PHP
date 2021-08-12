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

function setNauja(): void
{
    $saskaitos = json_decode(file_get_contents(__DIR__ . '/saskaitos.json'), 1);
    // $sNr = "LT127044000" .date("ymd") .(date("H")+3) .date("i");
    $sNr = SukurtiSnr();
    echo $sNr . " - Sask.Nr.simboliu sk.: " . strlen($sNr);
    // $nr = rand(1000000000, 9999999999); // netikras unikalus skaicius
    // $nauja = ["juodieji" => 0, "rudieji" => 0, "SaskNr" => $sNr];
    $nauja = ["juodieji" => 0, "rudieji" => 0, "SaskNr" => $sNr];
    $saskaitos[] = $nauja;
    $saskaitos = json_encode($saskaitos);
    file_put_contents(__DIR__ . '/saskaitos.json', $saskaitos);
}

function router()
{
    $route = $_GET['route'] ?? '';
    if ('GET' == $_SERVER['REQUEST_METHOD'] && '' == $route) {
        pirmasPuslapis();
    } elseif ('GET' == $_SERVER['REQUEST_METHOD'] && 'nauja' == $route) {
        rodytiNaujaPuslapi();
    } elseif ('POST' == $_SERVER['REQUEST_METHOD'] && 'nauja' == $route) {
        sukurtiNaujaUžtvanka();
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
    require __DIR__ . '/view/naujaSask.php';
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
                echo '<script>alert("SASKAITU NUMEIRIAI BAIGESI !!! REIKIA DIDESNIO SKAITMENU FORMATO.")</script>';
                exit;
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

function sukurtiNaujaUžtvanka()
{
    setNauja();
    header('Location: ' . URL);
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
