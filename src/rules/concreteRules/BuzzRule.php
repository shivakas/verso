<?php

namespace App\Rules\concreteRules;

use App\Rules\RuleInterface\RuleInterface;

class BuzzRule implements RuleInterface
{
    //Can be made public and include in RuleInterface to use for extention or midifcation purpose.
    private const RULE_NAME = "Buzz";

    public function apply(int $number): ?string
    {
        return ($number % 5 === 0) ? self::RULE_NAME : null;
    }
}