<?php
namespace AidasM\App;

class InFile {
    protected static $inArrAll;

    public function __construct(array $inFile)
    {
        $argumentsQty=count($inFile);

        if ($argumentsQty !=2)
        {
            $argumentsQty--;
            die("\nArgumentų skaičius turi būti 1, o pateikta: $argumentsQty !!!
            \rPakartokite ...\n\n");
        } 
        elseif (!file_exists($inFile[1]))
        {
            die("\nTokio failo ($inFile[1]), pateikto kaip argumentas nėra !!!
            \rPasitikrinkite kokį failą pateikiate kaip argumentą ...\n\n");
        } 

        self::$inArrAll = json_decode(file_get_contents($inFile[1]),1);
        if ( ! is_array(self::$inArrAll) )
        {
            die("\nPateiktame kaip argumentas faile nėra tinkamų duomenų !!!
            \rPasitikrinkite ...\n\n");
        }
        elseif (!is_numeric(self::getReqEur()) or self::getReqEur() == 0)
        {
            die("\nNenurodyta suma, kurią reikia apmokėti !!!
            \rNurodykite 'required_income' sumą ...\n\n");
        }
    }


    // public static function getInArrAll()
    // {
    //     return self::$inArrAll;
    // }

    public static function getSmsList() :array
    {
        return self::$inArrAll['sms_list'];
    }

    public static function getMaxMsg()
    {
        return self::$inArrAll['max_messages'];
    }

    public static function getReqEur()
    {
        return self::$inArrAll['required_income'];
    }
}