<?php
namespace AidasM\App;

use AidasM\App\PlanController;
use AidasM\App\InFile;

class PlanA extends PlanController
{
    // MIN MASSEGES QTY CALCULATION (ON MAX INCOME) 
    protected static function calculatePlanA()
    {
        // COLLECTING NEEDED VALUES
        $required_eur = InFile::getReqEur();
        $max_msg = InFile::getMaxMsg();
        $sortedSmsListArr = PlanController::$sortedSmsListArr;
        $smsListArrSize=count($sortedSmsListArr);
    
        $maxPayDivOnInc = PlanController::$maxPayDivOnInc;
        $maxPayDivReminder= $maxPayDivOnInc - (int) $maxPayDivOnInc;

        // CALCULATING INITIAL PLAN ARRAY
        $minSmsQtyOnMaxIncome = (int) $maxPayDivOnInc;
        for ($i=0; $i < $minSmsQtyOnMaxIncome; $i++) { 
            PlanController::$outputPlanByIncomeA[] = max(array_column($sortedSmsListArr,'income'));
            PlanController::$outputPlanForClientA[] = max(array_column($sortedSmsListArr,'price'));
        }

        // CALCULATING REST OF PLAN ARRAY (FROM CHEAPEST TO MOST EXPENSIVE)
        $NotPayedReminder = $required_eur - ($minSmsQtyOnMaxIncome * max(array_column($sortedSmsListArr,'income')));
        // echo  $NotPayedReminder;
        if ($maxPayDivReminder != 0)
        {
            for ($i = ($smsListArrSize - 1); $i >= 0; $i--) { 
                if ($NotPayedReminder <= $sortedSmsListArr[$i]['income'])
                {
                    PlanController::$outputPlanByIncomeA[] = $sortedSmsListArr[$i]['income'];
                    PlanController::$outputPlanForClientA[] = $sortedSmsListArr[$i]['price'];
                    break;
                }
            }
        }
    }
}