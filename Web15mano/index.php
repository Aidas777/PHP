<?php
//Petro failas

require __DIR__ ."/Bebras.php";


$bebras1=new Bebras("P");
$bebras2=new Bebras();

$bebras3=$bebras1;
echo "<pre>";
var_dump($bebras1);
var_dump($bebras2);
var_dump($bebras3);

// _d('labas');

echo "<script>console.log(" .var_dump($bebras1).";)</script>";
$a = "LABAS A";

// consoleLog("Blia");



echo "<script>console.log(".var_dump(json_encode($bebras1)).")</script>";

// console_log($bebras1);
// function console_log($output) {
//     $js_code = 'console.log(' . json_encode($output) .');';
//     // if ($with_script_tags) {
//         $js_code = '<script>' . $js_code . '</script>';
//     // }
//     echo $js_code;
// }

echo("<script>console.log('PHP: " . json_encode($bebras1) ."Vo blia"  . "');</script>");
?>