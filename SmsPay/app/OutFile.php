<?php

namespace AidasM\App;
use AidasM\App\PlanController;

class OutFile extends PlanController
{
    public static function doOutput()
    {
        // SELECTING CHOSEN PLAN
        if (PlanController::$chosenPlan == 'A')
        {
            $outputPlanForClient = PlanController::$outputPlanForClientA;
            $outputPlanByIncome = PlanController::$outputPlanByIncomeA;
        }
        elseif (PlanController::$chosenPlan == 'B')
        {
            $outputPlanForClient = PlanController::$outputPlanForClientB;
            $outputPlanByIncome = PlanController::$outputPlanByIncomeB;
        }
        else 
        {
            die("\nIvyko klaida !!!\n\n");
        }

        // SAVING CHOSEN PLAN TO public/output.json FILE
        file_put_contents(DIR . '../public/output.json', json_encode($outputPlanForClient));

        // PRINTING PLANS COMPARISON INFO
        echo "\nPagal planą A klientas moka: " .array_sum(PlanController::$outputPlanForClientA) 
        .' eur, siunčiant '.count(PlanController::$outputPlanForClientA) ." žinutes (-ę, -čių).\n";

        echo 'Pagal planą B klientas moka: ' .array_sum(PlanB::$outputPlanForClientB) 
        .' eur, siunčiant ' .count(PlanController::$outputPlanForClientB) ." žinutes (-ę, -čių).\n";


        // NOTIFYING CHOSEN PLAN LABEL
        echo "\n\e[03;32mPasirinktas planas ".PlanController::$chosenPlan ."\e[0m\n";

        // print_r($outputPlanForClient);

        // DISPLAYING CHOSEN PLAN ARRAY
        echo "\nGalutinio plano (" .PlanController::$chosenPlan .") atvaizdavimas (išsaugota output.json faile): \n\n" .json_encode($outputPlanForClient) ."\n\n";

        // DISPLAYING CHOSEN PLAN DETAILS
        echo "======= Apie galutinį planą: ======= \n";
        echo 'Reikės ' .count($outputPlanForClient) .' žinučių, kad apmokėti ' .InFile::getReqEur() ." eur.\n";
        echo 'Suma moketojui: ' .array_sum($outputPlanForClient) ." eur.\n";
        echo 'Įmonei bus pervesta: ' .array_sum($outputPlanByIncome) ." eur.\n ";
    }
}