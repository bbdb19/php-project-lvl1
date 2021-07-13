<?php

use function cli\line;
use function cli\prompt;

const RULES_GCD = 'Find the greatest common divisor of given numbers.';

function playGcd(): void
{
    $questions = array();
    $answers = array();

    for ($i = 0; $i < ROUND_COUNT; $i++) {
        $a = rand(0, 100);
        $b = rand(0, 100);
        array_push($questions, $a . ' ' . $b);
        array_push($answers, strval(getGcd($a, $b)));
    }

    startEngine(RULES_GCD, $questions, $answers);
}

function getGcd(int $a, int $b): int
{
    $min = min($a, $b);
    $max = max($a, $b);

    $gcd = 1;
    for ($i = $min; $i >= 1; $i--) {
        if ($min % $i == 0 && $max % $i == 0) {
            return $i;
        }
    }

    return $max;
}
