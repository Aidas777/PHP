<?php
session_start();

require __DIR__.'/functions.php';
// include_once __DIR__.'/functions.php';

define("URL", "http://localhost/PHP/BankByDest/Bankas.php");

//////////////////////////////////
// RAUDONA TXT
define("REDC", "rgb(102, 27, 4)");
// define("REDC", "red");

// RAUDONA FONO
define("REDB", "rgb(235, 188, 179)");

//-------------------------------

// ZALIA TXT
define("GREENC","rgb(89, 161, 6)");

// ZALIA FONO
define("GREENB","rgb(215, 248, 165)");

//////////////////////////////////
router();