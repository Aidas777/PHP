<?php

namespace AidasM\tests;

use AidasM\App\Handling;
use AidasM\App\OutFile;
use AidasM\App\InFile;
use AidasM\App\PlanController;
use AidasM\tests\DataGetTest;
use PHPUnit\Framework\TestCase;
use SebastianBergmann\Environment\Console;

require __DIR__ .'/../app/OutFile.php';
// require __DIR__ .'/DataGetTest.php';

class OutputTest extends TestCase
{
    public function phantomStart(): void
    {
        $argv0 = __DIR__ .'/../public/script.php';
        $argv1 = __DIR__ .'/../public/input.json';
        $args = [$argv0, $argv1];

        PlanController::start($args);
    }

    public function test_output_arrays_are_ready()
    {
        $this->phantomStart();
        Handling::$isItTest = 'true';
        
        $this->assertIsArray(OutFile::$outputPlanForClient);
        $this->assertIsArray(OutFile::$outputPlanByIncome);
    }

    public function test_output_arrays_lenghts_are_more_than_0()
    {
        $this->assertGreaterThan(0, count(OutFile::$outputPlanForClient));
        $this->assertGreaterThan(0, count(OutFile::$outputPlanByIncome));
    }

    public function test_output_arrays_values_are_numbers()
    {
        for ($i=0; $i < count(OutFile::$outputPlanForClient); $i++ )
        { 
            $this->assertIsNumeric(OutFile::$outputPlanForClient[$i]);
            $this->assertIsNumeric(OutFile::$outputPlanByIncome[$i]);
        }

    }


    public function test_output_json_file_exists()
    {
        $this->assertFileExists(__DIR__ .'/../public/output.json');
    }
}