<?php
$reservoirsCount = 30;
$reservoirsMass = ['Dange'=> 2, 'Nemunas'=> 6,
            'Šušvė'=> 8];

        // foreach(range(1, $reservoirsCount) as $i) {
            // var_dump($n);
            // $reserv = array_keys($reservoirsMass);
            // var_dump($reserv);
            // echo $index .'(' .$val .'), ';

            // $reserv = $reservoirsMass[rand(0, count($reservoirsMass)-1)];
            // var_dump([$reserv]);

            $kejai = array_keys($reservoirsMass);
            // print_r($kejus);

            foreach(range(1, $reservoirsCount) as $i) {
                $kejus = $kejai[rand(0, count($reservoirsMass)-1)];
                $valas = $reservoirsMass[$kejus];
                echo $kejus;
                echo $valas .' ';
            }


        // }