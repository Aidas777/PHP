<?php
namespace AidasM\tests;

use AidasM\App\InFile;
use AidasM\App\PlanController;
use AidasM\App\Handling;
use PHPUnit\Framework\TestCase;

define('DIR', __DIR__ .'/');

class DataGetTest extends TestCase
{
    public function phantomStart(): void
    {
        $argv0 = __DIR__ .'/../public/script.php';
        $argv1 = __DIR__ .'/../public/input.json';
        $args = [$argv0, $argv1];

        $paymentTest = new InFile($args);
        Handling::$isItTest = 'true';
        // PlanController::start($args);
    }
    
    public function test_input_files_exist()
    {
        $this->assertFileExists( __DIR__ .'/../public/script.php');
        $this->assertFileExists( __DIR__ .'/../public/input.json');

    }
    public function test_getting_data_to_app()
    {
        $this->phantomStart();
        // // $argv1 = json_decode(file_get_contents(__DIR__ .'/../public/input.json'),1);

        $this->assertIsArray(InFile::$inArrAll);
        $this->assertIsArray(InFile::$inArrAll['sms_list']);
        $this->assertIsNumeric(InFile::$inArrAll['required_income']);
        $this->assertIsNumeric(InFile::$inArrAll['max_messages']);
        
        // $payment = new InFile($argv);
    }

    public function test_sms_list_price_correctness()
    {
        for ($i=0; $i < count(InFile::$inArrAll['sms_list']); $i++) { 
            $this->assertIsNumeric(InFile::$inArrAll['sms_list'][$i]['price']);
        }
    }

    public function test_sms_list_income_correctness()
    {
        for ($i=0; $i < count(InFile::$inArrAll['sms_list']); $i++) { 
            $this->assertIsNumeric(InFile::$inArrAll['sms_list'][$i]['income']);
        }
    }

    public function test_max_messages_are_set()
    {
        $this->assertArrayHasKey('max_messages',InFile::$inArrAll);
    }

    public function test_required_income_is_set()
    {
        $this->assertArrayHasKey('required_income',InFile::$inArrAll);
    }

    // public function testInputFileMaxMessagesNumber()
    // {
    //     $this->assertIsNumeric(json_decode(file_get_contents($argv1),1)['max_messages']);
    // }
}