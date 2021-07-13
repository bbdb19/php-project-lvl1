<?php

use function cli\line;
use function cli\prompt;

const ROUND_COUNT = 3;

function startEngine(string $rules, array $questions, array $answers): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    $answer = '';
    $counter = 0;

    line($rules);
    while (true) {
        line('Question: ' . $questions[$counter]);
        $answer = prompt('Your answer: ');
        if ($answers[$counter] !== $answer) {
            line($answer . ' is wrong answer ;(. Correct answer was ' . $answers[$counter]);
            line('Let\'s try again, ' . $name . '!');
            return;
        } else {
            line('Correct!');
            $counter++;
        }
        if ($counter === ROUND_COUNT) {
            line('Congratulations, ' . $name . '!');
            return;
        }
    }
}
