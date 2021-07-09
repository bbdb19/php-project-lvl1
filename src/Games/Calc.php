<?php

use function cli\line;
use function cli\prompt;

function playCalc(): void
{
    $rules = 'What is the result of the expression?';
    $operators = ['+', '-', '*'];
    $questions = array();
    $answers = array();

    for ($i = 0; $i < 3; $i++) {
        $a = rand(0, 100);
        $b = rand(0, 100);
        $operator = $operators[rand(0, 100) % 3];
        array_push($questions, $a . ' ' . $operator . ' ' . $b);
        array_push($answers, calculate($a, $b, $operator));
    }

    startEngine($rules, $questions, $answers);
}

function calculate(int $a, int $b, string $operator): int
{
    switch ($operator) {
        case '+':
            $result = $a + $b;
            break;
        case '-':
            $result = $a - $b;
            break;
        case '*':
            $result = $a * $b;
            break;
    }
    return $result;
}
