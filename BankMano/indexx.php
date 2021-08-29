<?php
session_start();

require __DIR__.'/functions.php';
require __DIR__.'/app/Users.php';
// require __DIR__.'/view/Login.php';
// require __DIR__.'/view/DataBase.php';
// echo __DIR__ ."<br>";
// echo dirname(__DIR__, 1) ."<br>";
// require __DIR__.'/Router.php';

// include_once __DIR__.'/functions.php';

define("URL", "http://localhost/php/BankMano/indexx.php");

//////////////////////////////////
// RAUDONA TXT
define("REDF", "rgb(102, 27, 4)");
// define("REDC", "red");

// RAUDONA FONO
define("REDB", "rgb(235, 188, 179)");

//-------------------------------

// ZALIA TXT
define("GREENF","rgb(89, 161, 6)");

// ZALIA FONO
define("GREENB","rgb(215, 248, 165)");

//////////////////////////////////

RusiuokByPavarde();

$route = $_GET['route'] ?? '';
if ('GET' == $_SERVER['REQUEST_METHOD'] && '' == $route) {
    pirmasPuslapis();
} elseif ('GET' == $_SERVER['REQUEST_METHOD'] && 'nauja' == $route) {
    rodytiNaujaPuslapi();
} elseif ('POST' == $_SERVER['REQUEST_METHOD'] && 'nauja' == $route) {
    sukurtiNaujaSaskaita();
} elseif ('POST' == $_SERVER['REQUEST_METHOD'] && 'naikinti' == $route && isset($_GET["id"])) {
    NaikintiSask($_GET['id']);
    // MANO LITANIJA
} elseif ("POST" == $_SERVER["REQUEST_METHOD"] and "prideti" == $route and isset($_GET["id"]) and isset($_POST["plus"])) {
    EurPlus($_GET["id"]);
} elseif ("POST" == $_SERVER["REQUEST_METHOD"] and "prideti" == $route and isset($_GET["id"])) {
    PuslPlus($_GET["id"]);
} elseif ("GET" == $_SERVER["REQUEST_METHOD"] and "prideti" == $route and isset($_GET["id"])) {
    PuslPlus($_GET["id"]);
} elseif ("POST" == $_SERVER["REQUEST_METHOD"] and "atimti" == $route and isset($_GET["id"]) and isset($_POST["minus"])) {
    EurMinus($_GET["id"]);
} elseif ("POST" == $_SERVER["REQUEST_METHOD"] and "atimti" == $route and isset($_GET["id"])) {
    PuslMinus($_GET["id"]);
} elseif ("GET" == $_SERVER["REQUEST_METHOD"] and "atimti" == $route and isset($_GET["id"])) {
    PuslMinus($_GET["id"]);

    //
} elseif ("GET" == $_SERVER["REQUEST_METHOD"] and "Users" == $route) {
    $useris = new Users;
    // header("Location: http://localhost/php/BankMano/app/Users.php");
    $useris->rod();
    // die;
} else {
    echo 'Bliaxa muxa Page not found 404';
    die;
}

// $router = new Router();
// $router->routing();

