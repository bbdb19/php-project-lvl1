<?php

use function cli\line;
use function cli\prompt;

function playGcd(): void
{
    $rules = 'Find the greatest common divisor of given numbers.';
    $questions = array();
    $answers = array();

    for ($i = 0; $i < 3; $i++) {
        $a = rand(0, 100);
        $b = rand(0, 100);
        array_push($questions, $a . ' ' . $b);
        array_push($answers, getGcd($a, $b));
    }

    startEngine($rules, $questions, $answers);
}

function getGcd(int $a, int $b): int
{
    if ($a > $b) {
        $tmp = $a;
        $a = $b;
        $b = $tmp;
    }

    if ($a == 0) {
        return $b;
    }

    $gcd = 1;
    for ($i = 1; $i <= $a; $i++) {
        if ($a % $i == 0 && $b % $i == 0) {
            $gcd = $i;
        }
    }
    return $gcd;
}
