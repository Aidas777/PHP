<!-- <!DOCTYPE html> -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paskaita</title>

    </head>

    <style>
        html {
            margin: 0 auto;
        }

        .sq {
            /* display: inline-block; */
            /* display: contents; */
            line-height: 50%;
            /* height: 10%; */
            /* font-size: 10px; */
            margin-top: -10px;
            /* margin-bottom: -10px; */
            padding-top: -5px;
            padding-bottom: 0;
            letter-spacing: 1px;
            
        } 

        .red {
            color: red;
            /* font-weight: 900; */
        }

        div {
            /* word-wrap: break-word; */
            overflow-wrap: break-word;
        }

    </style>


<body>

<?php

for ($i=0; $i<50; $i++) {
    for ($a=0; $a<50; $a++) {
        if($i==$a) {
            echo "<span class=\"sq red\">*</span>";
        } elseif(50 - $i - 1 ==$a) {
            echo "<span class=\"sq red\">*</span>";
        } else {
            echo "<span class=\"sq\">*</span>";
        }
    }
    echo "<br>";
}


// for ($i=0; $i < 50; $i++) { 
//     for ($a=0; $a < 50; $a++) { 
//         if($i == $a){
//             // echo "<div class=\"sq red\">*</div>";
//             echo "<div class=\"sq red\">*</div>";
//         }elseif (50  - $i - 1 == $a) {
//             echo "<div class=\"sq red\">*</div>";
//         }
//         else{
//             echo "<div class=\"sq\">*</div>";
//         }
//     }
//     echo "<br>";
// }



?>
    
</body>
</html>