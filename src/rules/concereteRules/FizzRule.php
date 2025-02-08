<?php

namespace App\rules\concreteRules;

use App\Rules\RuleInterface\RuleInterface;

class FizzRule implements RuleInterface
{
    public function apply(int $number): ?string
    {
        return ($number % 3 === 0) ? 'Fizz' : null;
    }
}
