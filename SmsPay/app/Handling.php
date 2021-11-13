<?php
namespace AidasM\App;

use AidasM\App\PlanController;
use AidasM\App\InFile;

class Handling extends PlanController {

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
        $max_msg = InFile::getMaxMsg();
        $smsListArrSize=count(self::$sortedSmsListArr);
        PlanController::$maxPayDivOnInc = $maxPayDiv = $required_eur / max(array_column(self::$sortedSmsListArr,'income'));

        // CHECK DOES max_messages LIMIT FIT
        if ($max_msg * max(array_column(self::$sortedSmsListArr,'income')) < $required_eur)
        {
            echo "\n\e[01;31mApmokėti ". $required_eur .' eur siunčiant tik ' .$max_msg 
            . " žinutes nepavyks !!!\e[0m\n";

            // MIN MASSEGES QTY CALCULATION (ON MAX INCOME) 
            $maxPayDivReminder = $maxPayDiv - (int) $maxPayDiv;

            if ($maxPayDivReminder == 0)
            {
                $minSmsQtyOnMaxIncome = (int) $maxPayDiv;
            } else {
                $minSmsQtyOnMaxIncome = (int) $maxPayDiv + 1;
            }
            echo "\e[01;31mApmokėti šią sumą galima siunčiant mažiausiai " 
            .$minSmsQtyOnMaxIncome ." žinutes (-ę, -čių).\e[0m\n\n";


            // QUESTION TO CONTINUE CALCULATION OR NOT
            echo "Ar tęsti palankiausio plano skaičiavimą ? ( Y / N ): ";

            $terminalStreamIn = fopen("php://stdin","r");
            $streamGet = fgets($terminalStreamIn);
            if(strtoupper(trim($streamGet)) != "Y")
            {
                die("Skaičiavimas nutrauktas !");
            }
            fclose($terminalStreamIn);
        }
    }

    // DECISION TO CHOOSE PLANS A OR B AFTER CALCULATION COMPLETE
    protected static function choosingPlan()
    {
        // COLLECTING CALCULATED PLAN A AND B ($outputPlanForClient)
        $outputPlanForClientA = PlanController::$outputPlanForClientA;
        $outputPlanForClientB = PlanController::$outputPlanForClientB;

        // PLAN A AND B COMPARISON
        if ( array_sum($outputPlanForClientA) < array_sum($outputPlanForClientB) )
        {
            PlanController::$chosenPlan = 'A';
        } 
        elseif ( array_sum($outputPlanForClientA) > array_sum($outputPlanForClientB) ) 
        {
            PlanController::$chosenPlan = 'B';
        }
        else {
            PlanController::$chosenPlan = 'A';
        }
    }
}