<?php

use function cli\line;
use function cli\prompt;

const RULES_CALC = 'What is the result of the expression?';

function playCalc(): void
{
    $operators = ['+', '-', '*'];
    $questions = array();
    $answers = array();

    for ($i = 0; $i < ROUND_COUNT; $i++) {
        $a = rand(0, 100);
        $b = rand(0, 100);
        $operator = $operators[rand(0, 100) % count($operators)];
        array_push($questions, $a . ' ' . $operator . ' ' . $b);
        array_push($answers, strval(calculate($a, $b, $operator)));
    }

    startEngine(RULES_CALC, $questions, $answers);
}

function calculate(int $a, int $b, string $operator): ?int
{
    switch ($operator) {
        case '+':
            return $a + $b;
        case '-':
            return $a - $b;
        case '*':
            return $a * $b;
    }

    return null;
}
