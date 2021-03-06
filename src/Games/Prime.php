<?php

use function cli\line;
use function cli\prompt;

const RULES_PRIME = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function playPrime(): void
{
    $questions = array();
    $answers = array();

    for ($i = 0; $i < ROUND_COUNT; $i++) {
        $number = rand(0, 100);
        array_push($questions, $number);
        array_push($answers, isPrime($number) ? "yes" : "no");
    }

    startEngine(RULES_PRIME, $questions, $answers);
}

function isPrime(int $number): bool
{
    if ($number < 2) {
        return false;
    }

    for ($i = 2; $i < $number / 2; $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }
    return true;
}
