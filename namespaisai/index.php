<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bandau neimspeisus</title>
</head>
<body>

<?php

echo __DIR__ .'<br>';
require __DIR__ ."/vendor/autoload.php";

use veiksmas\action;

$act = new veiksmas\action;
echo $act->duok('du runlus');

?>
    
</body>
</html>