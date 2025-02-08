<?php

namespace App\Rules\ruleService;

class RuleService
{
    private array $rules;

    public function __construct(array $rules)
    {
        $this->rules = $rules;
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
            foreach ($this->rules as $rule) {
                $output = $rule->apply($i);
            }
            $result[] = $output;
        }

        return $result;
    }

}
