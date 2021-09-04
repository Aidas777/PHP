<?php

$failas = 'words.txt';
if (file_exists($failas) ) {
    $txt = file_get_contents($failas);
    // for ($i=0; $i < strlen($txt) ; $i++) { 
    //     $rWord = $txt[$i];
    //     echo $rWord;
    //     // echo $rWord .'<br>';
    // }

    $wordsMass = explode(' ', $txt );
    // var_dump($wordsMass);

    
} else {
    echo 'Failo ' .$failas .' NERA !';
    $txt = null;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <?
        // $txt 
        ?> 
    </div>
    
</body>
</html>