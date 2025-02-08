<?php

namespace App\Rules\concreteRules;

use App\Rules\RuleInterface\RuleInterface;

class FizzBuzzRule implements RuleInterface
{
    public function apply(int $number): ?string
    {
        return ($number % 3 === 0 && $number % 5 === 0) ? 'FizzBuzz' : null;
    }
}