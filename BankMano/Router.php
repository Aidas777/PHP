<?php

// class Router {

//     public function routing()
//     {
//         RusiuokByPavarde();

//         $route = $_GET['route'] ?? '';
//         if ('GET' == $_SERVER['REQUEST_METHOD'] && '' == $route) {
//             pirmasPuslapis();
//         } elseif ('GET' == $_SERVER['REQUEST_METHOD'] && 'nauja' == $route) {
//             rodytiNaujaPuslapi();
//         } elseif ('POST' == $_SERVER['REQUEST_METHOD'] && 'nauja' == $route) {
//             sukurtiNaujaSaskaita();
//         } elseif ('POST' == $_SERVER['REQUEST_METHOD'] && 'naikinti' == $route && isset($_GET["id"])) {
//             NaikintiSask($_GET['id']);
//             // MANO LITANIJA
//         } elseif ("POST" == $_SERVER["REQUEST_METHOD"] and "prideti" == $route and isset($_GET["id"]) and isset($_POST["plus"])) {
//             EurPlus($_GET["id"]);
//         } elseif ("POST" == $_SERVER["REQUEST_METHOD"] and "prideti" == $route and isset($_GET["id"])) {
//             PuslPlus($_GET["id"]);
//         } elseif ("GET" == $_SERVER["REQUEST_METHOD"] and "prideti" == $route and isset($_GET["id"])) {
//             PuslPlus($_GET["id"]);
//         } elseif ("POST" == $_SERVER["REQUEST_METHOD"] and "atimti" == $route and isset($_GET["id"]) and isset($_POST["minus"])) {
//             EurMinus($_GET["id"]);
//         } elseif ("POST" == $_SERVER["REQUEST_METHOD"] and "atimti" == $route and isset($_GET["id"])) {
//             PuslMinus($_GET["id"]);
//         } elseif ("GET" == $_SERVER["REQUEST_METHOD"] and "atimti" == $route and isset($_GET["id"])) {
//             PuslMinus($_GET["id"]);

//             //
//         } else {
//             echo 'Bliaxa muxa Page not found 404';
//             die;
//         }
//     }
// }