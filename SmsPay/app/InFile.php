<?php
namespace AidasM\App;

class InFile {
    public static $inArrAll;

    public function __construct(array $inFile)
    {
        // INITIAL INPUT DATA CHECK //
        
        // CHECK COMMAND LINE ARGUMENTS
        self::argumentFileCheck($inFile);

        // GETTING ALL ARRAY FROM FILE
        self::$inArrAll = json_decode(file_get_contents($inFile[1]),1);
        
        // CHECK INPUT FILE ARRAY CORRECTNESS
        self::argumentFileArrayCheck();
    }


    private static function argumentFileCheck($inFile)
    {
        $argumentsQty=count($inFile);

        // CHECK IF ARGUMENTS ! = 2 (INDEED ! = 1)
        if ($argumentsQty !=2)
        {
            $argumentsQty--;
            die("\nArgumentų skaičius turi būti 1, o pateikta: $argumentsQty !!!
            \rPakartokite ...\n\n");
        } 
        // CHECK IF ARGUMENT DOES NOT EXISTS
        elseif (!file_exists($inFile[1]))
        {
            die("\nTokio failo ($inFile[1]), pateikto kaip argumentas nėra !!!
            \rPasitikrinkite kokį failą pateikiate kaip argumentą ...\n\n");
        } 
    }


    private static function argumentFileArrayCheck()
    {
        // CHECK IF ARGUMENT FILE DOES NOT HAVE ARRAY
        if ( ! is_array(self::$inArrAll) )
        {
            die("\nPateiktame kaip argumentas faile nėra tinkamų duomenų !!!
            \rPasitikrinkite ...\n\n");
        }

        // CHECK IF ARRAY HAS sms_list KEY
        elseif(! array_key_exists('sms_list', self::$inArrAll))
        {
            die("\nPateiktame kaip argumentas faile nėra tinkamų (sms_list) duomenų !!!
            \rPasitikrinkite ...\n\n");
        }
        

        // CHECK IF required_income IS NOT NUMERIC OR == 0
        elseif (!is_numeric(self::getReqEur()) or self::getReqEur() == 0)
        {
            die("\nNenurodyta suma, kurią reikia apmokėti !!!
            \rNurodykite 'required_income' sumą ...\n\n");
        }

        // CHECK IF required_income < 0
        elseif (self::getReqEur() < 0)
        {
            die("\nNurodoma suma, kurią reikia apmokėti privalo būti teigiamas skaičius !!!
            \rNurodykite 'required_income' sumą ...\n\n");
        }

        // CHECK IF max_messages NUMBER < 0
        elseif ( self::getMaxMsg() and self::getMaxMsg() < 0 )
        {
            die("\nNurodomas pageidaujamas žinučių skaičius privalo būti teigiamas skaičius !!!
            \rNurodykite 'max_messages' skaičių ...\n\n");
        }
    }
    

    //GETTERS//
    // FOR GETTING sms_list
    protected static function getSmsList() :array
    {
        return self::$inArrAll['sms_list'] ?? 0;
    }

    // FOR GETTING max_messages
    protected static function getMaxMsg()
    {
        return self::$inArrAll['max_messages'] ?? 0;
    }

    // FOR GETTING required_income
    protected static function getReqEur()
    {
        return self::$inArrAll['required_income'] ?? 0;
    }
}