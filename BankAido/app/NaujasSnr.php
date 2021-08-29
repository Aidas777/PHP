<?php

class NaujasSnr
{
    public $naujSnr;
    private $saskaitos;

    // function rodytiNaujaPuslapi($saskaitos)
    function __construct($saskaitos)
    {
        $this->saskaitos = $saskaitos;
        $sNr = $this->SukurtiSnr();
        // require __DIR__ . '/view/naujaSask.php';
        $this->naujSnr = $sNr;

    }

    function SukurtiSnr()
    {
        // $saskaitos = getSask();
        $kartojas = true;
        while ($kartojas == true) {

            $sGalas = rand(10000000, 99999999);
            $snr = "LT1270440000" . $sGalas;

            $kartojas = false;
            $count = 0;
            foreach ($this->saskaitos as $index => $saskaita) {
                $count++;
                if ($saskaita["SaskNr"] ==  $snr) {
                    $kartojas = true;
                    break;
                }
                if ($count > $sGalas) {
                    $msg = "SASKAITU NUMEIRIAI BAIGESI !!! REIKIA DIDESNIO SKAITMENU FORMATO.";
                    addMsg($msg, REDF);
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
}
