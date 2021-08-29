<?php

namespace Pinigu\Bankas\Controllers;

use Pinigu\Bankas\App;
use Pinigu\Bankas\Json;


class HomeController {
    public function home()
    {
        return App::view('home');
    }
}