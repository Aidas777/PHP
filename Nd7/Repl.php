<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Call replace call backas kitaip</title>
</head>
<body>
<?php


$rndStr = md5(time());
echo $rndStr ."<br>";

$mdSk=null;

for ($i=0; $i < strlen($rndStr); $i++) { 
   if (   is_numeric($rndStr[$i])   ) {
        $mdSk=$mdSk ."<h1 style='display: inline-block;'>".$rndStr[$i] ."</h1>";
   } else {
        $mdSk=$mdSk .$rndStr[$i];
   }
}

echo $mdSk;

?>
</body>
</html>
