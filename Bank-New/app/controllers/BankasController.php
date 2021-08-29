<?php

namespace Pinigu\Bankas\Controllers;

use Pinigu\Bankas\App;
use Pinigu\Bankas\Json;


class BankasController
{
    private static $naujasSnr;
    private $setting = 'Json';
    // private $setting = 'Maria';

    private function get() {

        $db='Pinigu\\Bankas\\' .$this->setting;
        return $db::get();
    }

    public function __construct()
    {
        if (! App::isLogged()) {
            App::redirect('login');
        }
    }

    public function openActionPage($action, $SaskNr) {
        // $action = ['plusEur', 'minusEur'];
        if ($action == 'plusEur') {
            $page = 'pridetEur';
        } elseif ($action == 'minusEur') {
            $page = 'atimtiEur';
        }

        // return App::view($page, null, $SaskNr);
        $saskPerson = $this->get()->show($SaskNr);
        return App::view($page, null, $saskPerson);

    }

    public function index()
    {
        $saskaitos=$this->get()->showAll();
        // var_dump($saskaitos);
        // die;
        return App::view('pirmas', null, $saskaitos);
    }

    public function createView()
    {
        if ( ! isset(self::$naujasSnr) ) {
            self::SukurtiSnr();
        } 
        // self::SukurtiSnr();
        // echo "blia suka ".$this->naujasSnr;
        // die;
        // if (isset($_SESSION["reData"])) {
        //     $reData=$_SESSION["reData"];
        //     unset($_SESSION["reData"]);
        // }else {
        //     $reData=[];
        // //    $reData = ["ReAk" => 'bl', "ReVard" => 'blv', "RePavard" => 'blp'];
        // }
        // var_dump($reData);
        // die;
        // return App::view('naujaSask', self::$naujasSnr, $reData);
        return App::view('naujaSask', self::$naujasSnr);
    }

    public function save()
    {
        // var_dump($_POST);
        // die("iki cia");
        // $sNr = $_POST["sNr"];
        if ( isset(self::$naujasSnr) ) {
            $sNr=self::$naujasSnr;
        }elseif ( isset($reData['ReSNr']) ) {
            $sNr=$reData['ReSNr'];
        } else {
            $sNr=$_POST['sNr'];
        }

        $ak = $this->AkPatikra($_POST["ak"]);
        $vard = self::varduPatikra($_POST["vardas"]);
        $pavard = self::varduPatikra($_POST["pavarde"]);
        // echo "sNr:". $sNr ."ak:".$ak .$vard .$pavard .'<br>'; 
        // echo "self::naujasSnr: " .self::$naujasSnr.'<br>'; 
        // echo "_POST['sNr']: " .$_POST['sNr'].'<br>'; 


        if ($sNr and $ak and $vard and $pavard) {
            $nauja = [
                "vardas" => $vard, "pavarde" => $pavard,
                "ak" => $ak, "SaskNr" => $sNr, "Likutis" => 0
            ];
            // unset($_SESSION["reData"]);

            // var_dump($nauja);

            $this->get()->create($nauja);

            $msg = "Sąskaita SEKMINGAI sukurta !";
            App::addMsg($msg, GREENF);

            $this->index();
            // return App::view('pirmas', null, $saskaitos);
            // return App::view('naujaSask',null , null);
            // App::redirect('view/naujaSask.php');

            return true;
        } else {
            $ReSNr = $_POST['sNr'];
            // self::$naujasSnr=null;
            $ReAk = $_POST["ak"];
            $ReVard = $_POST["vardas"];
            $RePavard = $_POST["pavarde"];
            // $_SESSION["reData"] = ["ReAk" => $ReAk, "ReVard" => $ReVard, "RePavard" => $RePavard];
            $reData = ["ReSNr" => "$ReSNr", "ReAk" => $ReAk, "ReVard" => $ReVard, "RePavard" => $RePavard];

            // var_dump($_SERVER); die;
            return App::view('naujaSask',null , $reData);
        }
    }
    private static function varduPatikra($names)
    {
        if (strlen($names) <= 3) {
            $msg = "Vardas ir Pavarde turi buti ilgesni nei 3 simboliai ! Pakoreguokite.";
            App::addMsg($msg, REDF);
            return false;
        }
        return $names;
    }

    private static function SukurtiSnr()
    {
        // $saskaitos = getSask();
        $saskaitos=Json::get();
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
                    $msg = "SASKAITU NUMEIRIAI BAIGESI !!! REIKIA DIDESNIO SKAITMENU FORMATO.";
                    App::addMsg($msg, REDF);
                    return false;
                }
            }
        }
        self::$naujasSnr = $snr;
        // return $snr;
    }

    private function AkPatikra($ak)
    {

        if (empty($ak) or $ak == "" or is_null($ak)) {
            App::addMsg("Nurodykite asmens koda !", REDF);
            return false;
        }


        if ((strval($ak))[0] != 3 and (strval($ak))[0] != "4") {
            $msg = "Asmens kodo pradzia neteisinga ! Pakreguokite.";
            App::addMsg($msg, REDF);
            return false;
        }

        if (strlen($ak) != 11) {
            $msg = "Asmens kodas turi sudaryti 11 skaitmenu ! Pakreguokite.";
            App::addMsg($msg, REDF);
            return false;
        }

        if (!is_numeric($ak)) {
            App::addMsg("Asmens kodas turi buti tik is skaiciu ! Pakreguokite.", REDF);
            return false;
        }

        // $saskaitos=Json::get();
        $saskaitos = $this->get()->showAll();

        foreach ($saskaitos as $index => $saskaita) {
            // App::addMsg($ak, "blia");
            // if (isset($saskaita["ak"])) {
            //     Rodyk("ak is Saskaitu: " .$saskaita["ak"] ." /// ak ivestas dabar: " .$ak);
            // }

            if ($ak == $saskaita["ak"]) {
                $msg = "Toks asm.kodas " . $ak . " jau yra !";
                App::addMsg($msg, REDF);
                return false;
            }
        }
        return $ak;
    }

    public function update($actionAcc, $action, $actionValue) {
        $actionAccData = $this->get()->show(substr($actionAcc,2));
        // var_dump($actionAccData); die;
        if ($action == 'plus') {
            $actionAccData['Likutis'] +=$actionValue;

            $msg = "Lėšos SEKMINGAI papildytos !";
            App::addMsg($msg, GREENF);
            
        } elseif ($action == 'minus') {
            $actionAccData['Likutis'] -=$actionValue;

            $msg = "Lėšos SEKMINGAI nuskaičiuotos !";
            App::addMsg($msg, GREENF);
        }

        $this->get()->update(substr($actionAcc,2), $actionAccData);
        if (isset($_POST['plus'])) {
            $page = 'plusEur';
        }elseif (isset($_POST['minus'])) {
            $page = 'minusEur';
        }
        // App::redirect('list');
        // header('Location: '); die;
        $this->openActionPage($page, substr($actionAcc,2));
   
        // return App::view('naujaSask',null , $reData);

        // function update(int $bankasId, array $bankasData)

    }

    public function delete($actionAcc) {
        $this->get()->delete($actionAcc);
        $msg = "Sąskaita SEKMINGAI panaikinta !";
        App::addMsg($msg, GREENF);
        App::redirect('list');
    }
}
