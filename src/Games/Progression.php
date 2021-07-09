<?php

use function cli\line;
use function cli\prompt;

function playProgression(): void
{
    $rules = 'What number is missing in the progression?';
    $questions = array();
    $answers = array();

    for ($i = 0; $i < 3; $i++) {
        $size = rand(5, 10);
        $firstNumber = rand(0, 50);
        $increment = rand(1, 10);
        $array = getProgression($firstNumber, $increment, $size);
        $missingIndex = rand(0, count($array) - 1);
        array_push($answers, $array[$missingIndex]);
        array_push($questions, arrayToQuestion($array, $missingIndex));
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

function arrayToQuestion(array $arr, int $index): string
{
    $str = '';
    for ($i = 0; $i < count($arr); $i++) {
        if ($i === $index) {
            $str .= '.. ';
        } else {
            $str .= $arr[$i] . ' ';
        }
    }
    return $str;
}
