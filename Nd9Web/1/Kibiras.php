<?php

class Kibiras {

    // protected $akmenuKiekis = 0;
    protected $akmenuKiekis;

    // public function __construct($akmenuKiekis)
    // {
    //     $this->akmenuKiekis=$akmenuKiekis;
    //     // echo $this->akmenuKiekis;
    // }

    public function prideti1Akmeni() {
        $this->akmenuKiekis++;
    }

    public function pridetiDaugAkmenu($kiekis) {
        $this->akmenuKiekis = $this->akmenuKiekis + $kiekis;
    }

    public function kiekPririnktaAkmenu() {
        return $this->akmenuKiekis;

    }
}

