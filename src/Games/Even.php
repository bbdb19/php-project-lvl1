<?php

use function cli\line;
use function cli\prompt;

function playEven()
{
    $name = startEngine();

    $on = true;
    $answer = '';
    $correct_answer = '';
    $counter = 0;

    line('Answer "yes" if the number is even, otherwise answer "no".');
    while ($on) {
        $number = rand(0, 100);
        $correct_answer = $number % 2 == 0 ? "yes" : "no";
        line('Question: ' . $number);
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
