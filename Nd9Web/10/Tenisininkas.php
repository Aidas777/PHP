<?php

class Tenisininkas {
    private $vardas;
    private bool $kamuoliukas;

    private static object $zaidejas1;
    private static object $zaidejas2;

    Public function arTuriKamuoliuka() {
        return $this->kamuoliukas;
    }

    Public function perduotiKamuoliuka() {

    }

    Public static function zaidimoPradzia() {
        // self::$zaidejas1 = new self;
        // self::$zaidejas2 = new self;

        self::$vardas="1";
        self::$vardas="2";
    }

    public function getVardas() {
        return self::$vardas;
    }
}
