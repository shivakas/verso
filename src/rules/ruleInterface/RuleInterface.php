<?php

namespace App\rules\ruleInterface;

interface RuleInterface
{
    public function apply(int $number): ?string;
}