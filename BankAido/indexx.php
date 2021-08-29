<?php
session_start();

// require __DIR__.'/router.php';
require __DIR__.'/functions.php';
require __DIR__.'/app/Bankas.php';
require __DIR__. "/app/NaujasSnr.php";
require __DIR__. "/public/user.php";
// include __DIR__.'/view/virsus.php';
// require __DIR__.'/app/DataBase.php';
// require __DIR__.'/view/Login.php';
// require __DIR__.'/view/DataBase.php';
// echo __DIR__ ."<br>";
// echo dirname(__DIR__, 1) ."<br>";
// require __DIR__.'/Router.php';

// include_once __DIR__.'/functions.php';

define("URL", "http://localhost/php/BankAido/indexx.php");

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

$bankas = new Bankas;
$saskaitos= $bankas->showAll();

// RusiuokByPavarde($saskaitosObj);

// $routeris = new router;
// $routeris->routing();

$route = $_GET['route'] ?? '';

if ('GET' == $_SERVER['REQUEST_METHOD'] && '' == $route) {
    require __DIR__ . '/view/pirmas.php';
    // pirmasPuslapis();
} elseif ('GET' == $_SERVER['REQUEST_METHOD'] && 'nauja' == $route) {
    $newAccNr = new NaujasSnr($saskaitos);
    require __DIR__ . '/view/naujaSask.php';
    // rodytiNaujaPuslapi();

} elseif ('POST' == $_SERVER['REQUEST_METHOD'] && 'nauja' == $route) {
    $useris = new user($saskaitos);
    // var_dump($useris->getUdata());
    // die;
    $bankas->create( $useris->getUdata() );
    // header("Location: http://localhost/PHP/BankAido/indexx.php?route=nauja");
    // require __DIR__ . '/view/naujaSask.php';
    // sukurtiNaujaSaskaita();
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

