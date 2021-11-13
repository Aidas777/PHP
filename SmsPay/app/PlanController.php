<?php

namespace AidasM\App;

use AidasM\App\InFile;
use AidasM\App\OutFile;
use AidasM\App\PlanB;

class PlanController extends InFile
{
    protected static $sortedSmsListArr;
    protected static $maxPayDivOnInc; // = required_income divided by max sms income (from sms_list)

    protected static $outputPlanForClientA = [];
    protected static $outputPlanByIncomeA = [];

    protected static $outputPlanForClientB = [];
    protected static $outputPlanByIncomeB = [];

    protected static $chosenPlan ='';

        // START (CONTROLLER)
        public static function Start($argv)
        {
            self::countController($argv);
        }

        // PLAN COUNTING CONTRLOLLER
        public static function countController($argv)
        {
        // CREATING NEW OBJECT (IF NOT EXISTS) AND CHECKING ARGUMENTS IN InFile CLASS
        self::$sortedSmsListArr ?? $newPlan = new self($argv);

        // SENDING FOR SORTING sms_list ARRAY IN DESC ORDER (BY INCOME)
        Handling::sortArrDescByIncome(InFile::getSmsList());

        // CHECKING max_messages LIMIT
        Handling::MaxMsgLimitCheck();

        // COUNTING PLAN A
        PlanA::calculatePlanA();

        // COUNTING PLAN B
        PlanB::calculatePlanB();

        // DECISION TO CHOOSE PLAN A OR B
        Handling::choosingPlan();
        }


        // AUTO-SAVING DATA ON OBJECT EXISTANCE END
        public function __destruct()
        {
            if (count(self::$outputPlanForClientA) == 0) die;
            OutFile::doOutput();
        }
}