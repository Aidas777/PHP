<?php

if ( "POST" == $_SERVER["REQUEST_METHOD"] and isset($_POST["Sukurti"]) ) {
    setNaujaS();
}

function getSaskNr() {
    if ( ! file_exists(__DIR__ ."/saskaitos.json") ) {
        $sNr=[[]];
        // $sNr=["SaskNr" => "LT0123" .date("Ymd") .(date("H")+3) .date("is"), "Likutis" =>0];
        $sNr=json_encode($sNr);
        file_put_contents(__DIR__ ."/saskaitos.json", $sNr);
    }
    return json_decode(file_get_contents(__DIR__ ."/saskaitos.json"), 1);
}

function setSaskNr() {
    if ("POST" == $_SERVER["REQUEST_METHOD"]) {
        $sNr=json_encode($sNr);
        file_put_contents(__DIR__ ."/saskaitos.json", $sNr);
    }
}

function setNaujaS() : void
{
    if (   dataChck($_POST["vardas"]) and dataChck($_POST["pavarde"])
    and strlen($_POST["sNr"]) >=20 and strlen($_POST["ak"])>=11   ) {
        $sNr=getSaskNr();
        echo "var ir pav yra" ."<br>";
    } else {
        echo "Nurodykite visus duomenis ! Patikrinkite ar Sąsk.Nr. sudaro 20, o a.k. sudaro 11 simbolių."."<br>";
    }
}

function dataChck($d)
{
    if (  is_null($d) or ! isset($d) or $d=="" or empty($d) ) {
        return false;
    }
return true;
}

print_r(getSaskNr());
// echo date("Ymd") .(date("H")+3) .date("is");
// echo "Sask.Nr.simboliu sk.: " .strlen(getSaskNr()["SaskNr"]);

?>