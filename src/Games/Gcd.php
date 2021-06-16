<?php

use function cli\line;
use function cli\prompt;

function playGcd()
{
    $name = startEngine();

    $on = true;
    $answer = '';
    $correct_answer = '';
    $counter = 0;

    line('Find the greatest common divisor of given numbers.');
    while ($on) {
        $a = rand(0, 100);
        $b = rand(0, 100);
        $correct_answer = getGcd($a, $b);
        line('Question: ' . $a . ' ' . $b);
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

function getGcd(int $a, int $b): int
{
    if ($a > $b) {
        $tmp = $a;
        $a = $b;
        $b = $tmp;
    }
    $gcd = 1;
    for ($i = 1; $i <= $a; $i++) {
        if ($a % $i == 0 && $b % $i == 0) {
            $gcd = $i;
        }
    }
    return $gcd;
}
