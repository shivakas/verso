<?php

namespace App\Rules\ruleService;

use App\rules\ruleInterface\RuleInterface;

/**
 * This class implements strategy design pattern for different rules object creation
 * and thier behaviour dynamically 
 */
class RuleService
{
    /**
     * RuleInterface[]
     * Summary of rules
     * @var array
     */
    private array $rules;

    /**
    * NumberProcessor constructor.
    *
    * @param RuleInterface[] $rules Array of rules to apply
    * @throws \InvalidArgumentException if any rule does not implement RuleInterface
    */
    public function __construct(array $rules)
    {
         // Validate that every rule implements the RuleInterface
         $this->rules = $this->validateRules($rules);
    }

    /**
    * Summary of generate
    * @param int $start
    * @param int $end
    * @return string[]
    */
    public function generate(int $start, int $end): array
    {
        $result = [];

        for ($i = $start; $i <= $end; $i++) {
            $output = (string) $i;

            foreach ($this->rules as $rule) {
                $output = $rule->apply($i) ?? $output;
            }

            $result[] = $output;
        }

        return $result;
    }

    /**
    * Validates that each rule implements RuleInterface.
    *
    * @param RuleInterface[] $rules
    * @return RuleInterface[]
    * @throws \InvalidArgumentException
    */
    private function validateRules(array $rules): array
    {
        foreach ($rules as $rule) {
            if (!$rule instanceof RuleInterface) {
                throw new \InvalidArgumentException('Each rule must implement RuleInterface.');
            }
        }

        return $rules;
    }
}
