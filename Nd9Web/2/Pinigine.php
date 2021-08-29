<?php

class Pinigine {
    private $popieriniaiPinigai;
    private $metaliniaiPinigai;

    public function ideti($kiekis) {
        if ($kiekis > 2) {
            $this->metaliniaiPinigai += $kiekis;
        } else {
            $this->popieriniaiPinigai+= $kiekis;
        }
    }

    public function skaiciuoti() {
        echo "Viso pinigu yra: " .($this->metaliniaiPinigai + $this->popieriniaiPinigai);
    }

    public function skaiciuokMet() {
        echo "Metaliniu: " .$this->metaliniaiPinigai ."<br>";
    }

    public function skaiciuokPop() {
        echo "Popieriniu: " .$this->popieriniaiPinigai ."<br>";
    }
}