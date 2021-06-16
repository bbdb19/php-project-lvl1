<?php

use function cli\line;
use function cli\prompt;

function playProgression(): void
{
    $name = startEngine();

    $on = true;
    $answer = '';
    $correct_answer = '';
    $counter = 0;

    line('What number is missing in the progression?');
    while ($on) {
        $array = getProgressionArray();
        $missingIndex = rand(0, count($array) - 1);
        $correct_answer = $array[$missingIndex];
        line('Question: ' . arrayToQuestionString($array, $missingIndex));
        $answer = prompt('Your answer: ');
        if ($correct_answer != $answer) {
            $on = false;
            break;
        } else {
            line('Correct!');
            $counter++;
        }

        if ($counter === 3) {
            line('Congratulations, ' . $name . '!');
            break;
        }
    }

    if (!$on) {
        line($answer . ' is wrong answer ;(. Correct answer was ' . $correct_answer);
        line('Let\'s try again, ' . $name . '!');
    }
}

function getProgressionArray(): array
{
    $arr = [];
    $size = rand(5, 10);
    $firstNumber = rand(0, 50);
    $increment = rand(1, 10);
    for ($i = 0; $i < $size; $i++) {
        $arr[$i] = $firstNumber + $i * $increment;
    }
    return $arr;
}

function arrayToQuestionString(array $arr, int $index): string
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
