<?php
// session_start();
// var_dump($_SESSION);

$saskaitos = json_decode(file_get_contents("saskaitos.json"), true);

var_dump($saskaitos);

?>