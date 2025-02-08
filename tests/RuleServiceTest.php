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
        $this->assertEquals($expectedOutput, $result);
    }
    
    public function testFizzBuzzEdgeCase()
    {
        // Create the rules (Fizz, Buzz and FizzBuzz)
        $rules = [new FizzRule(), new BuzzRule(), new FizzBuzzRule()];
        $fizzBuzzGenerator = new RuleService($rules);

        // Test when the range has only one number, e.g., 3
        $expectedOutput = ['Fizz'];
        $result = $fizzBuzzGenerator->generate(3, 3);
        $this->assertEquals($expectedOutput, $result);

        // Test when the range has only one number, e.g., 5
        $expectedOutput = ['Buzz'];
        $result = $fizzBuzzGenerator->generate(5, 5);
        $this->assertEquals($expectedOutput, $result);

        $expectedOutput = ['FizzBuzz'];
        $result = $fizzBuzzGenerator->generate(start: 90, end: 90);
        $this->assertEquals($expectedOutput, $result);
    }
}