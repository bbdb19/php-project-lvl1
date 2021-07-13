<?php

use function cli\line;
use function cli\prompt;

function playProgression(): void
{
    $rules = 'What number is missing in the progression?';
    $questions = array();
    $answers = array();

    for ($i = 0; $i < ROUND_COUNT; $i++) {
        $size = rand(5, 10);
        $firstNumber = rand(0, 50);
        $increment = rand(1, 10);
        $progression = getProgression($firstNumber, $increment, $size);
        $missingIndex = rand(0, count($progression) - 1);
        array_push($questions, progressionToQuestion($progression, $missingIndex));
        array_push($answers, strval($progression[$missingIndex]));
    }

    startEngine($rules, $questions, $answers);
}

function getProgression(int $firstNumber, int $increment, int $size): array
{
    $arr = [];
    for ($i = 0; $i < $size; $i++) {
        $arr[$i] = $firstNumber + $i * $increment;
    }
    return $arr;
}

function progressionToQuestion(array $progression, int $index): string
{
    $progression[$index] = '..';
    return implode(' ', $progression);
}
