<?php

// use App\DB\DataBase;
// require __DIR__.'/DataBase.php';

class Users // implements DataBase
{
    private $userData;
    private $saskVisos;
    // private $vardas, $pavarde, $email, $pass;

    public function __construct() 
    {
        if (! file_exists( dirname(__DIR__, 1). '/saskaitos.json')) {
            $saskaitos = [];
            $saskaitos = json_encode($saskaitos);
            file_put_contents( dirname(__DIR__, 1) . '/saskaitos.json', $saskaitos);
        }
        $this->saskVisos = json_decode(file_get_contents( dirname(__DIR__, 1) . '/saskaitos.json'));
        // var_dump($this->saskVisos);
    }

    function create(array $userData): void
    {
        if ( ! isset($this->userData)  ) {
            $this->userData = new User;
        }
    }

    // function update(int $userId, array $userData): void {

    // }

    // function delete(int $userId): void {

    // }

    // function show(int $userId): array {

    // }

    // function showAll(): array {
        
    // }


    //////////////////////////////////////////
    public function rod () {
        print_r(($this->saskVisos));
    }

   
    private function setNauja()
    {
        $saskaitos = json_decode(file_get_contents( dirname(__DIR__, 1) . '/saskaitos.json'), 1);
        // $sNr = "LT127044000" .date("ymd") .(date("H")+3) .date("i");

        $sNr = $_POST["sNr"];
        $ak = AkPatikra($_POST["ak"]);
        $vard = varduPatikra($_POST["vardas"]);
        $pavard = varduPatikra($_POST["pavarde"]);

        // $nr = rand(1000000000, 9999999999); // netikras unikalus skaicius
        // $nauja = ["juodieji" => 0, "rudieji" => 0, "SaskNr" => $sNr];
        if ($sNr and $ak and $vard and $pavard) {
            $nauja = [
                "vardas" => $vard, "pavarde" => $pavard,
                "ak" => $ak, "SaskNr" => $sNr, "Likutis" => 0
            ];

            $saskaitos[] = $nauja;
            $saskaitos = json_encode($saskaitos);
            file_put_contents(__DIR__ . '/saskaitos.json', $saskaitos);
            $msg = "Saskaita SEKMINGAI sukurta !";
            addMsg($msg, GREENF);

            return true;
        } else {
            // $msg="Kazkas negerai su duomenimis ! Patikrinkite." .json_encode($sNr) 
            // ." // ak: " .json_encode($ak) ." // vard: " .json_encode($vard) ." // pavard: " .json_encode($pavard);

            // Rodyk($msg);
            // addMsg($msg, REDF);
            return false;
        }
    }
    function rodyk() {
        return $this->userData;
    }
}

// $user = new Users;
// // Users->create();
// var_dump($user->rodyk());
