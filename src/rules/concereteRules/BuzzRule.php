<?php

namespace App\rules\concreteRules;

use App\Rules\RuleInterface\RuleInterface;

class BuzzRule implements RuleInterface
{
    public function apply(int $number): ?string
    {
        return ($number % 5 === 0) ? 'Buzz' : null;
    }
}