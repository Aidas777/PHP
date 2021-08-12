
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<?php

$cars = array("Volvo", "BMW", "Toyota");
$carsEasy=["Volvo", "BMW", "Toyota"];
$carsEmpty=[];

array_push($cars,"blue","yellow");
print_r($cars);
echo "<hr>";

$carsEasy[]="CAT";
print_r($carsEasy) ."<br>";
echo $carsEasy[1];
echo "<hr>";

$asArr=["car"=>"Volvo", "pet"=> "cat", 'food'=>"chokolate", 1 =>7];
print_r($asArr);

echo $asArr['food'] ."<br>";
echo "<br>";
echo $asArr[1] ."<br>";
// var_dump($cars);

$student=["name"=>"Jonas", "surn"=>"Antanaitis", "age" => 17];
// array_push($student,"Jonas2","Bentanaitis", 25);
// print_r($student)."<br>";
echo "<br>";
echo "<br>";
// echo $student["name"];

for ($i=0; $i < count($cars); $i++) { 
   echo $cars[$i] .", ";
}
echo "<br>";

foreach ($cars as $masina) {
    echo  $masina .", ";
}
echo "<br>";

foreach ($asArr as $key => $item) {
    // echo $item .", ";
    echo $key .", ";
}

?>

    
</body>
</html>

