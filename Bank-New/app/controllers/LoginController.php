<?php

namespace Pinigu\Bankas\Controllers;

use Pinigu\Bankas\App;
use Pinigu\Bankas\Login\Json;


class LoginController {
    // private static $naujasSnr;
    private $setting = 'Json';
    // private $setting = 'Maria';

    private function get() {

        $db='Pinigu\\Bankas\\Login\\' .$this->setting;
        return $db::get();
    }

    public function showLogin() {
        return App::view('login', null, null);
    }
    
    public function Login() {

        $email = $_POST['email'] ?? ''; //tipo t.b. emailas
        $pass= $_POST['pass'];

        $user = $this->get()->show($email);
        if (empty($user)) {
            $msg = "Kazkas negerai ! Pakoreguokite.";
            App::addMsg($msg, REDF);
            App::redirect('login');
        }

        if ($user['pass'] == md5($pass)) {
            $_SESSION['login'] = 1;
            $_SESSION['name'] = $user['name'];

            $msg = "Prisijungta SEKMINGAI !";
            App::addMsg($msg, GREENF);
            App::redirect('list');
            // return;
        }
        $msg = "Kazkas negerai ! Pakoreguokite.";
        App::addMsg($msg, REDF);
        App::redirect('login');
    }

    public function Logout() {
        unset($_SESSION['login'], $_SESSION['name']);
        $msg = "Atsijungta SEKMINGAI !";
        App::addMsg($msg, GREENF);
        App::redirect('login');
    }
}