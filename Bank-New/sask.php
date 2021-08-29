<?php
// session_start();
// var_dump($_SESSION);

$saskaitos = json_decode(file_get_contents(__DIR__ ."/data/saskaitos.json"), 1);

// print_r($saskaitos);
var_dump($saskaitos);

?>