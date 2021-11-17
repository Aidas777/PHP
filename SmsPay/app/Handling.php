<?php
namespace AidasM\App;

use AidasM\App\PlanController;
use AidasM\App\InFile;

class Handling extends PlanController {

    public static $isItTest = 'false';
    private static $minSmsQtyOnMaxIncome; // MIN SMS QTY ON MAX INCOME

    // SORTING sms_list ARRAY IN DESC ORDER (BY INCOME)
    protected static function sortArrDescByIncome($arr)
    {
        // METHOD USING USORT
        usort($arr, function($a, $b) {
            return $b['income'] <=> $a['income'];
        });
        PlanController::$sortedSmsListArr = $arr;

        // METHOD BUBBLE (WORKING)

        // for ($i=0; $i < count($arr); $i++)
        // {
        //     for ($k=0; $k < count($arr); $k++)
        //     { 
        //         if ( $arr[$i]['income'] > $arr[$k]['income'])
        //         {
        //             $tempArr = $arr[$i];
        //             $arr[$i] = $arr[$k];
        //             $arr[$k]= $tempArr;
        //         }
        //     }
        // }
        // PlanController::$sortedSmsListArr = $arr;
    }


    // max_messages LIMIT CHECK
    protected static function MaxMsgLimitCheck()
    {
        $required_eur = InFile::getReqEur();
        $smsListArrSize=count(self::$sortedSmsListArr);
        PlanController::$maxPayDivOnInc = $maxPayDiv = $required_eur / max(array_column(self::$sortedSmsListArr,'income'));
        
        // MIN MASSEGES QTY CALCULATION (ON MAX INCOME) 
        $maxPayDivReminder = $maxPayDiv - (int) $maxPayDiv;

        if ($maxPayDivReminder == 0)
        {
            self::$minSmsQtyOnMaxIncome = (int) $maxPayDiv;
        } else {
            self::$minSmsQtyOnMaxIncome = (int) $maxPayDiv + 1;
        }
        

        // MESSAGE IF TEST IS RUNNING
        if (self::$isItTest == 'true')
        {
            PlanController::$planSelectionDescription = "\n\n\r\e[01;31mATLIEKMAS TESTAS !!! TESTO METU VISAS TIKRASIS
            \rFUNKCIONALUMAS GALI NEVEIKTI !!! KAD JIS VEIKTŲ PALEISKITE PROGRAMĄ TIESIOGIAI.\e[0m";
        }


        // CHECK DOES max_messages FIT LIMIT (IF max_messages ! = 0)
        if (InFile::getMaxMsg() * max(array_column(self::$sortedSmsListArr,'income')) < $required_eur
        and InFile::getMaxMsg() != 0)
        {
            echo "\n\e[01;31mApmokėti ". $required_eur .' eur siunčiant tik ' .InFile::getMaxMsg() 
            . " žinutes (-ę, -čių) nepavyks !!!\e[0m\n";

            echo "\e[01;31mApmokėti šią sumą galima siunčiant mažiausiai " 
            .self::$minSmsQtyOnMaxIncome ." žinutes (-ę, -čių).\e[0m\n";

            echo "\e[01;31mJei pageidaujate, kad programa paskaičiuotų pagal " 
            .self::$minSmsQtyOnMaxIncome ." žinutes (-ę, -čių), nurodykite šį skaičių 'max_messages' laukelyje.\e[0m\n\n";
        

            // QUESTION TO CONTINUE CALCULATION OR NOT IF LIMIT EXEEDED
            if (self::$isItTest == 'false')
            {
                echo "\e[33mAr tęsti bendrąjį palankiausio plano skaičiavimą ? ( Y / N ): \e[0m";

                $terminalStreamIn = fopen("php://stdin","r");
                $streamGet = fgets($terminalStreamIn);
                if(strtoupper(trim($streamGet)) != "Y")
                {
                    die("Skaičiavimas nutrauktas !");
                }
                fclose($terminalStreamIn);
            }
        }
    }

    // DECISION TO CHOOSE PLANS A OR B AFTER CALCULATION COMPLETE
    protected static function choosingPlan()
    {
        // COLLECTING CALCULATED PLAN A AND B ($outputPlanForClient)
        $outputPlanForClientA = PlanController::$outputPlanForClientA;
        $outputPlanForClientB = PlanController::$outputPlanForClientB;

        // COMPARISON PLAN A AND B IF CLIENT max_messages DOES FIT LIMIT
        if (self::$minSmsQtyOnMaxIncome == InFile::getMaxMsg())
        {
            if (count($outputPlanForClientA) < count($outputPlanForClientB) )
            {
                PlanController::$chosenPlan = 'A';
            } else {
                PlanController::$chosenPlan = 'B';
            }

            PlanController::$planSelectionDescription = '(remiantis ribojamu sms skaičiumi)';
            return;
        }


        // COMPARISON BY CLIENT price SUM
        if ( array_sum($outputPlanForClientA) < array_sum($outputPlanForClientB) )
        {
            PlanController::$chosenPlan = 'A';
        } 
        elseif ( array_sum($outputPlanForClientA) > array_sum($outputPlanForClientB) ) 
        {
            PlanController::$chosenPlan = 'B';
        } 
        //COMPARISON IF CLIENT price SUM PLAN A = CLIENT price SUM PLAN B
        elseif ( array_sum($outputPlanForClientA) == array_sum($outputPlanForClientB) )
        {
            //COMPARISON BY SMS QTY
            if ( count($outputPlanForClientA) < count($outputPlanForClientB) )
            {
                PlanController::$chosenPlan = 'A';
            }
            elseif ( count($outputPlanForClientA) > count($outputPlanForClientB) ) 
            {
                PlanController::$chosenPlan = 'B';
            }
            else {
                PlanController::$chosenPlan = 'A';
            }
        }
        else {
            PlanController::$chosenPlan = 'A';
        }
    }
}