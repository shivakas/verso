<?php

use App\Rules\ConcreteRules\BuzzRule;
use App\rules\concreteRules\FizzBuzzRule;
use App\Rules\ConcreteRules\FizzRule;
use App\Rules\RuleService\RuleService;

require 'vendor/autoload.php';

// Initialize Rules
$rules = [new FizzRule(), new BuzzRule(), new FizzBuzzRule()];

$fizzBuzz = new RuleService($rules);
$result = $fizzBuzz->generate(1, 100);
echo implode("\n", $result);


