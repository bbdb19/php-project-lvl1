<?php

use function cli\line;
use function cli\prompt;

const RULES_EVEN = 'Answer "yes" if the number is even, otherwise answer "no".';

function playEven(): void
{
    $questions = array();
    $answers = array();

    for ($i = 0; $i < ROUND_COUNT; $i++) {
        $question = rand(0, 100);
        array_push($questions, $question);
        array_push($answers, isEven($question) ? "yes" : "no");
    }

    startEngine(RULES_EVEN, $questions, $answers);
}

function isEven(int $number): bool
{
    return $number % 2 == 0;
}
