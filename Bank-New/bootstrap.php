<?php
session_start();
define("INSTALL_DIR", "/php/Bank-New/public/");
define("DIR", __DIR__ ."/");
define('URL', 'http://localhost/php/Bank-New/public/' );

//////////////////////////////////
// RAUDONA TXT
define("REDF", "rgb(102, 27, 4)");
// RAUDONA FONO
define("REDB", "rgb(235, 188, 179)");

//-------------------------------
// ZALIA TXT
define("GREENF","rgb(89, 161, 6)");
// ZALIA FONO
define("GREENB","rgb(215, 248, 165)");
//////////////////////////////////

require DIR .'/vendor/autoload.php';

function RodykMsg() {
    return Pinigu\Bankas\App::RodykMsg();
}

function MsgBackC() {
    return Pinigu\Bankas\App::MsgBackC();
}

function isLogged() {
    return Pinigu\Bankas\App::isLogged();
}

// var_dump($url );