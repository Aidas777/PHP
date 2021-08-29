<?php

class Pinigine {
    private $popieriniaiPinigai;
    private $metaliniaiPinigai;

    private $popKiekis;
    private $metKiekis;

    public function ideti($kiekis) {
        if ($kiekis > 2) {
            $this->metaliniaiPinigai += $kiekis;
            $this->metKiekis++;
        } else {
            $this->popieriniaiPinigai+= $kiekis;
            $this->popKiekis++;
        }
    }

    public function skaiciuoti() {
        echo "Visa pinigu suma yra Eur: " .($this->metaliniaiPinigai + $this->popieriniaiPinigai);
    }

    public function vnt() {
        echo "Bendras monetu ir banknotus skaicius yra: " 
        .($this->metKiekis + $this->popKiekis);
    }

    public function skaiciuokMet() {
        echo "Monetu suma Eur: " .$this->metaliniaiPinigai ."<br>";
        echo "Monetu vienetu skaicius: " .$this->metKiekis ."<br>";
    }

    public function skaiciuokPop() {
        echo "Popieriniu pinigu suma Eur: " .$this->popieriniaiPinigai ."<br>";
        echo "Popieriniu banknotu vienetu suma: " .$this->popKiekis ."<br>";
    }
}