<?php

class Grybas {
    private $valgomas;
    private $sukirmijes;
    private $svoris;

    public function __construct()
    {
        $this->valgomas = (rand(0, 1) == 1) ? true : false;
        $this->sukirmijes = (rand(0, 1) == 1) ? true : false;
        $this->svoris = rand(5,45);

        if (($this->valgomas) and ! ($this->sukirmijes)) {
            echo "Pakliuvo valgomas ". $this->svoris ." kg."."<br>";
        } else {
            echo "Pakliuvo sukirmijes arba nevalgomas". "<br>";
        }
    }

    public function getGryboKg() {
        if ( ($this->valgomas) and ! ($this->sukirmijes) ) {
            // echo "Pakliuvo valgomas ". $this->svoris ." kg."."<br>";
            return $this->svoris;
        } else {
            // echo "Pakliuvo sukirmijes arba nevalgomas". "<br>";
            return false;
        }
    }

}