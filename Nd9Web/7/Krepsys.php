<?php

class Krepsys {
    const DYDIS = 500;
    public $prikrauta;

    public function setKg($kg) {
        $this->prikrauta += $kg;
    }

    public function getKg() {
        return $this->prikrauta;
    }



    // public function getDYDIS() {
    //     return $this->DYDIS;
    // }
}

