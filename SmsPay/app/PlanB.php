<?php
namespace AidasM\App;

use AidasM\App\PlanController;
use AidasM\App\InFile;

class PlanB extends PlanController
{

    private static $outputPlanForClient = [];
    private static $outputPlanByIncome = [];
        
    // MASSEGES QTY CALCULATION STEP BY STEP AND RE-ALLOCATING (FROM MAX INCOME) 
    protected static function calculatePlanB()
    {
        // COLLECTING NEEDED VALUES
        $required_eur = InFile::getReqEur();
        $max_msg = InFile::getMaxMsg();
        $smsListArrSize=count(PlanController::$sortedSmsListArr);

        // ALL PAYMENT CALCULATION WITHOUT LAST PAYMENT
        for ($i = 0; $i < $smsListArrSize; $i++)
        { 
            if ($required_eur >= PlanController::$sortedSmsListArr[$i]['income']) 
            {
                $required_eur -= PlanController::$sortedSmsListArr[$i]['income'];
                self::$outputPlanForClient[] = PlanController::$sortedSmsListArr[$i]['price']; // price
                self::$outputPlanByIncome[] = PlanController::$sortedSmsListArr[$i]['income'];
                $i--;
            }
        }
        // LAST PAYMENT CALCULATION 
        if ($required_eur > 0
        and $required_eur <= min(array_column(PlanController::$sortedSmsListArr,'income')))
        {
            self::$outputPlanForClient[] = min(array_column(PlanController::$sortedSmsListArr,'price')); // price
            self::$outputPlanByIncome[] = min(array_column(PlanController::$sortedSmsListArr,'income'));
            $required_eur -= min(array_column(PlanController::$sortedSmsListArr,'income'));
        }

        // RE-ALLOCATING LAST PAYMENTS
        $smsCounter = count(self::$outputPlanForClient);
        while (self::$outputPlanForClient[$smsCounter-1] == self::$outputPlanForClient[$smsCounter-2])
        {
            if (self::$outputPlanForClient[$smsCounter-1] == self::$outputPlanForClient[$smsCounter-2]) 
            {
                self::$outputPlanForClient[$smsCounter-2] = self::$outputPlanForClient[$smsCounter-2] * 2;
                array_pop(self::$outputPlanForClient);
                $smsCounter--;
            }
        }

        // if ($required_eur == self::$sortedSmsListArr[0]['income'])
        // {
        //     PlanController::$outputPlanForClient[] = self::$sortedSmsListArr[0]['price'];
        // }
        
        // RETURNING PLAN B TO PlanController
        PlanController::$outputPlanForClientB = self::$outputPlanForClient;
        PlanController::$outputPlanByIncomeB = self::$outputPlanByIncome;
    }
}