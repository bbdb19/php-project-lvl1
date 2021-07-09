<?php

use function cli\line;
use function cli\prompt;

function startEngine(string $rules, array $questions, array $answers): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    $on = true;
    $answer = '';
    $counter = 0;

    line($rules);
    while ($on) {
        line('Question: ' . $questions[$counter]);
        $answer = prompt('Your answer: ');
        if ($answers[$counter] != $answer) {
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
        line($answer . ' is wrong answer ;(. Correct answer was ' . $answers[$counter]);
        line('Let\'s try again, ' . $name . '!');
    }
}
