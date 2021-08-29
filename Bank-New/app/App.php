<?php

namespace Pinigu\Bankas;

use Pinigu\Bankas\Controllers\BankasController;
use Pinigu\Bankas\Controllers\LoginController;
use Pinigu\Bankas\Controllers\HomeController;
// use Bebru\Uztvanka\Controllers\UztvankaController;

class App
{


    public static function start()
    {
        // echo "Valio kurmiai" ."<br>";
        self::router();



        // var_dump($url);
    }

    public static function router()
    {

        $url = str_replace(INSTALL_DIR, "", $_SERVER["REQUEST_URI"]);
        $url = explode("/", $url);

        if ('GET' == $_SERVER['REQUEST_METHOD'] && 1 == count($url) && '' === $url[0]) {
            return (new HomeController)->home();
        }

        if ('GET' == $_SERVER['REQUEST_METHOD'] && 1 == count($url) && 'createNew' === $url[0]) {
            return (new BankasController)->createView();
        }

        if ('POST' == $_SERVER['REQUEST_METHOD'] && 1 == count($url) && 'list' === $url[0]) {
            return (new BankasController)->save();
        }

        if ('GET' == $_SERVER['REQUEST_METHOD'] && 1 == count($url) && 'list' === $url[0]) {
            return (new BankasController)->index();
        }
        // echo array_keys($_POST)[0];die;

            $actionUrl = ['plusEur', 'minusEur'];
            // var_dump(($_POST));
            $action = array_keys($_POST)[0] ?? '';
            $actionAcc = $_POST['SaskNr'] ?? '';
            $actionValue = (int) ($_POST[$action] ?? '');

        // echo $actionValue; die;
        if (
            'POST' == $_SERVER['REQUEST_METHOD'] && 1 == count($url) && in_array($url[0], $actionUrl)
            && (isset($_POST['minus']) || isset($_POST['plus']))
        ) {
            return (new BankasController)->update($actionAcc, $action, $actionValue);
        }

        if ('POST' == $_SERVER['REQUEST_METHOD'] && 1 == count($url) && in_array($url[0], $actionUrl)) {
            // echo "suveike postas";
            return (new BankasController)->openActionPage($url[0], substr($_POST['SaskNr'], 2));
        }
        // if ('GET' == $_SERVER['REQUEST_METHOD'] && 1==count($url) && in_array($url[0], $actionUrl) ) {
        //     // echo "suveike getas";
        //     return (new BankasController)->openActionPage($url[0], substr($actionAcc,2));
        // }

        if ('POST' == $_SERVER['REQUEST_METHOD'] && 2 == count($url) && 'delete' == $url[0]) {
            // var_dump($url[1]);die;
            return (new BankasController)->delete(substr($url[1], 2));
        }

        if ('GET' == $_SERVER['REQUEST_METHOD'] && 1 == count($url) && 'login' == $url[0]) {
            return (new LoginController)->showLogin();
        }
        if ('POST' == $_SERVER['REQUEST_METHOD'] && 1 == count($url) && 'login' == $url[0]) {
            return (new LoginController)->Login();
        }
        if ('POST' == $_SERVER['REQUEST_METHOD'] && 1 == count($url) && 'logout' == $url[0]) {
            return (new LoginController)->Logout();
        }
    }

    public static function view($name, $sNr = null, $data = [])
    {
        // var_dump($_SERVER);
        // die;
        $saskPerson = $saskaitos = $reData = $data;
        require DIR . "view/$name.php";
    }

    public static function redirect($url)
    {
        // require DIR . "view/$url.php";
        header('Location: ' . URL . $url);
        die;
    }

    public static function addMsg(string $msgTxt, string $msgTyp)
{
    $_SESSION["msg"] = ["msg" => $msgTxt, "msgTyp" => $msgTyp];
}

    public static function RodykMsg()
    {
        $message = $_SESSION["msg"] ?? "";

        $_SESSION["msg"] = [];
        // require __DIR__ . "/view/msg.php";
        self::view('msg', null, $message);
    }

    public static function MsgBackC()
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

    public static function isLogged() {
        return isset($_SESSION['login']) && $_SESSION['login'] == 1;
    }
}
