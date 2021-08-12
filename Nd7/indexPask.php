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
// $rndStr = md5(time());
$hash = md5(time());

echo '<pre>';


// function h1(string|array $data) : void //v.8
function h1($data) : string
{
    print_r($data);
    if (is_array($data)) {
        $data = $data[0];
    }
    return '<h1 style="display: inline-block;">'. $data.'</h1>';
}

$hash=preg_replace_callback('/\d+/','h1',$hash);
echo $hash;

?>
    
</body>
</html>