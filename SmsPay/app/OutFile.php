<?php

namespace AidasM\App;
use AidasM\App\PlanController;

class OutFile extends PlanController
{
    public static $outputPlanForClient;
    public static $outputPlanByIncome;

    protected static function doOutput()
    {
        // SELECTING CHOSEN PLAN
        self::getChosenPlan();

        // SAVING CHOSEN PLAN TO public/output.json FILE
        self::putChosenPlanToFile();

        // PRINTING PLANS COMPARISON INFO
        self::printPlanCompInfo();

        // NOTIFYING CHOSEN PLAN LABEL AND DESCRIPTION
        self::printPlanLabel();

        // DISPLAYING CHOSEN PLAN ARRAY
        self::printChosenPlanArr();

        // print_r($outputPlanForClient);

        // DISPLAYING CHOSEN PLAN DETAILS
        self::printPlanDetails();
    }

    // SELECTING CHOSEN PLAN
    private static function getChosenPlan() {
        if (PlanController::$chosenPlan == 'A')
        {
            self::$outputPlanForClient = PlanController::$outputPlanForClientA;
            self::$outputPlanByIncome = PlanController::$outputPlanByIncomeA;
        }
        elseif (PlanController::$chosenPlan == 'B')
        {
            self::$outputPlanForClient = PlanController::$outputPlanForClientB;
            self::$outputPlanByIncome = PlanController::$outputPlanByIncomeB;
        }
        else 
        {
            die("\nIvyko klaida !!!\n\n");
        }
        
    }
    
    // SAVING CHOSEN PLAN TO public/output.json FILE
    private static function putChosenPlanToFile() {
        file_put_contents(DIR . '../public/output.json', json_encode(self::$outputPlanForClient));
    }

    // PRINTING PLANS COMPARISON INFO
    private static function printPlanCompInfo() 
    {
        echo "\nPagal planą A klientas moka: " .array_sum(PlanController::$outputPlanForClientA) 
        .' eur, siunčiant '.count(PlanController::$outputPlanForClientA) ." žinutes (-ę, -čių).\n";

        echo 'Pagal planą B klientas moka: ' .array_sum(PlanController::$outputPlanForClientB) 
        .' eur, siunčiant ' .count(PlanController::$outputPlanForClientB) ." žinutes (-ę, -čių).\n";
    }

    // DISPLAYING CHOSEN PLAN LABEL AND DESCRIPTION
    private static function printPlanLabel() 
    {
        echo "\n\e[03;32mPasirinktas planas ".PlanController::$chosenPlan .' '
        .PlanController::$planSelectionDescription ."\e[0m\n";
    }

    // DISPLAYING CHOSEN PLAN ARRAY
    private static function printChosenPlanArr()
    {
        echo "\nGalutinio plano (" .PlanController::$chosenPlan .") atvaizdavimas (išsaugota output.json faile): \n\n"
        .json_encode(self::$outputPlanForClient) ."\n\n";
    } 

    // DISPLAYING CHOSEN PLAN DETAILS
    private static function printPlanDetails()
    {
        echo "======= Apie galutinį planą: ======= \n";
        echo 'Reikės ' .count(self::$outputPlanForClient) .' žinučių, kad apmokėti ' .InFile::getReqEur() ." eur.\n";
        echo 'Suma moketojui: ' .array_sum(self::$outputPlanForClient) ." eur.\n";
        echo 'Įmonei bus pervesta: ' .array_sum(self::$outputPlanByIncome) ." eur.\n\n";
    } 
}