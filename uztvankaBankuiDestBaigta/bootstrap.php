<?php
session_start();
// define('INSTALL', '/Lape/uztvanka/public/');
define('INSTALL', '/php/uztvankaBankuiDestBaigta/public/');
define('DIR', __DIR__. '/');
define('URL', 'http://localhost/php/uztvankaBankuiDestBaigta/public/');

require DIR.'vendor/autoload.php';


function showMessages()
{
    return Bebru\Uztvanka\App::showMessages();
}

function isLogged() 
{
    return Bebru\Uztvanka\App::isLogged();
}



