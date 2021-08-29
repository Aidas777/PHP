<?php

class router
{

    public function routing()
    {
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
            $bankas->create($useris->getUdata());
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
    }
}
