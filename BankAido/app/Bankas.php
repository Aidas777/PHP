<?php

// use App\DB\DataBase;
require __DIR__.'/DataBase.php';
// echo  __DIR__;


// class Saskaitos implements DataBase {
class Bankas implements DataBase {

    public $userData;
    public $saskaitosObj;
    // private $vardas, $pavarde, $email, $pass;

    public function create(array $userData) : void {  ///// I N T E R F E I S O
        $this->saskaitosObj[] = $userData;

        // var_dump($this->saskaitosObj);
        // die;

        $saskaitos = json_encode($this->saskaitosObj);
        file_put_contents(__DIR__ . '/saskaitos.json', $saskaitos);

        $msg = "Saskaita SEKMINGAI sukurta !";
        addMsg($msg, GREENF);

        header("Location: http://localhost/PHP/BankAido/indexx.php?route=nauja");
        die;
        

    }

    // function update(int $userId, array $userData): void {

    // }

    // function delete(int $userId): void {

    // }

    // function show(int $userId): array {

    // }

    // public function getSask()
    // {
    //     return $this->saskaitosObj;
    // }

    public function __construct() 
    {
        if (! file_exists(__DIR__ . '/saskaitos.json')) {
            $saskaitos = [];
            $saskaitos = json_encode($saskaitos);
            file_put_contents(__DIR__ . '/saskaitos.json', $saskaitos);
        }
        (object) $this->saskaitosObj = json_decode(file_get_contents(__DIR__ . '/saskaitos.json'),1);
        // var_dump($this->saskaitosObj);
        // echo "<hr>";
        // print_r($this->saskaitosObj);
        // die;
    }


    function showAll(): array ///// I N T E R F E I S O
    {
        // $this->saskaitosObj =  $this->getSaskaitos();
        // Cons($this->saskaitosObj);
        // var_dump($this->saskaitosObj);
        // die;

        // $saskaitos=$this->saskaitosObj;
        // require dirname(__DIR__ ,1). '/view/pirmas.php';

        return $this->saskaitosObj;;
    }

    // public function getSaskaitos() {
    //     return $this->saskaitosObj;
    // }

    // public function getSaskaitos() {
    //     // return ["L"=>2];
    //     if ( ! file_exists(__DIR__.'/saskaitos.json') ) {
    //         $saskaitos = [];
    //         $saskaitos = json_encode($saskaitos);
    //         file_put_contents(__DIR__ . '/saskaitos.json', $saskaitos);
    //     }
    //     // return json_decode(file_get_contents(__DIR__ . '/saskaitos.json'), 1);
    //     return json_decode(file_get_contents(__DIR__ . '/saskaitos.json'));

    // }
    
//     function putToFile(): void
// {
//     $saskaitos = json_encode($this->saskaitosObj);
//     file_put_contents(__DIR__ . '/saskaitos.json', $saskaitos);
// }

}



    //////////////////////////////////////////
//     public function rod () {
//         print_r(($this->saskVisos));
//     }

   
//     private function setNauja()
//     {
//         $saskaitos = json_decode(file_get_contents( dirname(__DIR__, 1) . '/saskaitos.json'), 1);
//         // $sNr = "LT127044000" .date("ymd") .(date("H")+3) .date("i");

//         $sNr = $_POST["sNr"];
//         $ak = AkPatikra($_POST["ak"]);
//         $vard = varduPatikra($_POST["vardas"]);
//         $pavard = varduPatikra($_POST["pavarde"]);

//         // $nr = rand(1000000000, 9999999999); // netikras unikalus skaicius
//         // $nauja = ["juodieji" => 0, "rudieji" => 0, "SaskNr" => $sNr];
//         if ($sNr and $ak and $vard and $pavard) {
//             $nauja = [
//                 "vardas" => $vard, "pavarde" => $pavard,
//                 "ak" => $ak, "SaskNr" => $sNr, "Likutis" => 0
//             ];

//             $saskaitos[] = $nauja;
//             $saskaitos = json_encode($saskaitos);
//             file_put_contents(__DIR__ . '/saskaitos.json', $saskaitos);
//             $msg = "Saskaita SEKMINGAI sukurta !";
//             addMsg($msg, GREENF);

//             return true;
//         } else {
//             // $msg="Kazkas negerai su duomenimis ! Patikrinkite." .json_encode($sNr) 
//             // ." // ak: " .json_encode($ak) ." // vard: " .json_encode($vard) ." // pavard: " .json_encode($pavard);

//             // Rodyk($msg);
//             // addMsg($msg, REDF);
//             return false;
//         }
//     }
//     function rodyk() {
//         return $this->userData;
//     }
// }

// $user = new Users;
// Users->create();
// var_dump($user->rodyk());
