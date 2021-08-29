<?php

class Stikline {
    private $turis;
    private $kiekis;

    public function __construct($turis=null, $kiekis=null)
    {
        $this->turis = $turis;
        $this->kiekis = $kiekis;
        // parent::__construct($turis) {
        //     $this->turis = $turis;
        // }
    }

    // public function __construct($turis)
    // {
    //     $this->turis = $turis;
    // }

    public function ipilti($kiekis) {
        if ( ($this->turis) < $kiekis ) {
            $this->kiekis = $this->turis;
            // $this->ispilti();
        } else {
            $this->kiekis = $kiekis;
        }
    }

    public function ispilti() {
        $nulink = ($this->kiekis);
        $this->kiekis = 0;
        // echo "?:" . $nulink ."<br>";
        return $nulink;
        
    }

    public function rodykT() {
        return ($this->turis);
    }

    public function rodykK() {
        return ($this->kiekis);
    }
}