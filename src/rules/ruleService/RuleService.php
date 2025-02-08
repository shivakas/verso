<?php

namespace App\Rules\ruleService;

use App\rules\ruleInterface\RuleInterface;

class RuleService
{
    private array $rules;

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
