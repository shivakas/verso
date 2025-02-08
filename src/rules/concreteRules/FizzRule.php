<?php

namespace App\Rules\concreteRules;

use App\Rules\RuleInterface\RuleInterface;

class FizzRule implements RuleInterface
{
    //Can be made public and include in RuleInterface to use for extention or midifcation purpose
    private const RULE_NAME = "Fizz";

    public function apply(int $number): ?string
    {
        return ($number % 3 === 0) ? self::RULE_NAME : null;
    }
}
