<?php
session_start();

require __DIR__.'/functions.php';
// include_once __DIR__.'/functions.php';

define("URL", "http://localhost/PHP/BankByDest/Bankas.php");
define("REDC", "rgb(59, 16, 3)");
define("GREENC","greenyellow");

router();