<?php

class MarsoPalydovas
{
    private $title;
    private static $palydovai=[];

    // public static function getPalydov()
    // {
    //     // return self::$title ?? self::$title = new self;
    //     return MarsoPalydovas::$title ?? MarsoPalydovas::$title = new MarsoPalydovas;
    // }

    // public static function getPalyd()
    // {
    //     return self::$title;
    // }



    public static function makePalyd()
    {
        if ( ! isset(self::$palydovai[0]) ) {
            self::$palydovai[0] = new self;  // KAIP CIA TIEISIAI PRISKIRT ? Tipo taip:  self::$title = new self::$title("kazkas")
            self::$palydovai[0] -> title = "Deimas";
            return self::$palydovai[0];
        } elseif (! isset(self::$palydovai[1]) ) {
            self::$palydovai[1] = new self; 
            self::$palydovai[1] -> title = "Fobas";
            return self::$palydovai[1];
        } else {
            // self::$title = new self;
            return self::$palydovai[rand(0, 1)] ;
        }



        // if ( empty(MarsoPalydovas::$title) ) {
        //     MarsoPalydovas::$title = "Deimas";
        // }elseif (MarsoPalydovas::$title == "Deimas"){
        //     MarsoPalydovas::$title = "Fobas";
        // } elseif (MarsoPalydovas::$title == "Deimas") {
        //     MarsoPalydovas::$title = "kazkas";

        // rand(0,1)==1 ? MarsoPalydovas::$title = "Fobas" : MarsoPalydovas::$title == "Deimas";
        // if (rand(0,1)==1) {
        //     self::$title = "Deimas";
        // } else {
        //     self::$title = "Fobas";
        // }

        // }
    }

    private function __construct()
    {
    }
}
