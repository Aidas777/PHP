<?php

class Kibiras2
{

    // protected $akmenuKiekis = 0;
    protected $akmenuKiekis = 0;
    protected static $akmenuKiekisVisuoseKibiruose = 0;


    // public function __construct($akmenuKiekis)
    // {
    //     $this->akmenuKiekis=$akmenuKiekis;
    //     // echo $this->akmenuKiekis;
    // }

    public function prideti1Akmeni()
    {
        Kibiras2::$akmenuKiekisVisuoseKibiruose++;
        $this->akmenuKiekis++;
    }

    public function pridetiDaugAkmenu($kiekis)
    {
        Kibiras2::$akmenuKiekisVisuoseKibiruose+=$kiekis;
        $this->akmenuKiekis = $this->akmenuKiekis + $kiekis;
    }

    public function kiekPririnktaAkmenu()
    {
        return $this->akmenuKiekis;
    }

    public function kiekPririnktaAkmenuVisuose()
    {
        return self::$akmenuKiekisVisuoseKibiruose;
    }
}
