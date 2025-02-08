<?php

use App\Rules\ConcreteRules\BuzzRule;
use App\rules\concreteRules\FizzBuzzRule;
use App\Rules\ConcreteRules\FizzRule;
use App\Rules\RuleService\RuleService;
use PHPUnit\Framework\TestCase;

class RuleServiceTest extends TestCase
{
    public function testFizzBuzzGeneration()
    {
        // Create the rules (Fizz, Buzz and FizzBuzz)
        $rules = [new FizzRule(), new BuzzRule(), new FizzBuzzRule()];
        $fizzBuzzGenerator = new RuleService($rules);

        // Test the FizzBuzz sequence from 1 to 15
        $expectedOutput = [
            '1', '2', 'Fizz', '4', 'Buzz', 'Fizz', '7', '8', 'Fizz', 'Buzz', 
            '11', 'Fizz', '13', '14', 'FizzBuzz', '16'
        ];
        
        $result = $fizzBuzzGenerator->generate(1, 16);
        //die($result);
        $this->assertEquals($expectedOutput, $result);
    }
}