<?php
// require dirname(__DIR__,1).'/app/Bankas.php';
// require dirname(__DIR__,1) .'/indexx.php';
// echo __DIR__;
// die;
class user
{

    public $userData;
    private $saskaitos;

    // function setNauja()
    public function __construct($saskaitos)
    {
        // $saskaitos = json_decode(file_get_contents(__DIR__ . '/saskaitos.json'), 1);
        // $saskaitos = $bankas->showAll();
        // $sNr = "LT127044000" .date("ymd") .(date("H")+3) .date("i");

        $this->saskaitos=$saskaitos;

        $sNr = $_POST["sNr"];
        $ak = $this->AkPatikra($_POST["ak"]);
        $vard = $this->varduPatikra($_POST["vardas"]);
        $pavard = $this->varduPatikra($_POST["pavarde"]);

        // $nr = rand(1000000000, 9999999999); // netikras unikalus skaicius
        // $nauja = ["juodieji" => 0, "rudieji" => 0, "SaskNr" => $sNr];
        if ($sNr and $ak and $vard and $pavard) {
            $nauja = [
                "vardas" => $vard, "pavarde" => $pavard,
                "ak" => $ak, "SaskNr" => $sNr, "Likutis" => 0
            ];

            $this->userData = $nauja;
            // $bankas->create(array $nauja);

            // $saskaitos[] = $nauja;
            // $saskaitos = json_encode($saskaitos);
            // file_put_contents(__DIR__ . '/saskaitos.json', $saskaitos);

            // create(array $nauja); // KAIP SITA PALEISTI ???????????????????????????????????????????


            // return true;
        } else {
            // $msg="Kazkas negerai su duomenimis ! Patikrinkite." .json_encode($sNr) 
            // ." // ak: " .json_encode($ak) ." // vard: " .json_encode($vard) ." // pavard: " .json_encode($pavard);

            // Rodyk($msg);
            // addMsg($msg, REDF);
            // return false;
        }
    }

    public function sukurtiNaujaSaskaita()
    {
        // Rodyk( json_encode(setNauja()) );
        // exit;
        if (isset($this->userData) ) {
            header('Location: ' . URL);
            die;
        } else {
            $ReSNr = "0001";
            $ReAk = $_POST["ak"];
            $ReVard = $_POST["vardas"];
            $RePavard = $_POST["pavarde"];
            $_SESSION["ReData"] = ["ReSNr" => $ReSNr, "ReAk" => $ReAk, "ReVard" => $ReVard, "RePavard" => $RePavard];

            // header("Location: http://localhost/PHP/BankAido/indexx.php?route=nauja");
            // die;
        }
    }

    private function AkPatikra($ak)
    {

        if (empty($ak) or $ak == "" or is_null($ak)) {
            addMsg("Nurodykite asmens koda !", REDF);
            return false;
        }


        if ((strval($ak))[0] != 3 and (strval($ak))[0] != "4") {
            $msg = "Asmens kodo pradzia neteisinga ! Pakreguokite.";
            Rodyk($msg);
            addMsg($msg, REDF);
            return false;
        }

        if (strlen($ak) != 11) {
            $msg = "Asmens kodas turi sudaryti 11 skaitmenu ! Pakreguokite.";
            Rodyk($msg);
            addMsg($msg, REDF);
            return false;
        }

        if (!is_numeric($ak)) {
            addMsg("Asmens kodas turi buti tik is skaiciu ! Pakreguokite.", REDF);
            return false;
        }

        // $saskaitos = getSask();

        foreach ($this->saskaitos as $index => $saskaita) {
            // addMsg($ak, "blia");
            // if (isset($saskaita["ak"])) {
            //     Rodyk("ak is Saskaitu: " .$saskaita["ak"] ." /// ak ivestas dabar: " .$ak);
            // }

            if ($ak == $saskaita["ak"]) {
                $msg = "Toks asm.kodas " . $ak . " jau yra !";
                addMsg($msg, REDF);
                return false;
            }
        }
        return $ak;
    }

    private function varduPatikra($names)
    {
        if (strlen($names) <= 3) {
            $msg = "Vardas ir Pavarde turi buti ilgesni nei 3 simboliai ! Pakoreguokite.";
            addMsg($msg, REDF);
            return false;
        }
        return $names;
    }

    public function getUdata()
    {
        return $this->userData;
    }
}
