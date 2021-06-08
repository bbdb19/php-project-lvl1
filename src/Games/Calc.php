<?php

namespace Brain\Games;

use Brain\Engine as Engine;

use function cli\line;
use function cli\prompt;

class Calc
{
    public function play()
    {
        $engine = new Engine();
        $name = $engine->start();

        $on = true;
        $answer = '';
        $correct_answer = '';
        $counter = 0;
        $operators = ['+', '-', '*'];

        line('What is the result of the expression?');
        while ($on) {
            $a = rand(0, 100);
            $b = rand(0, 100);
            $o = $operators[rand(0, 100) % 3];
            switch ($o) {
                case '+':
                    $correct_answer = $a + $b;
                    break;
                case '-':
                    $correct_answer = $a - $b;
                    break;
                case '*':
                    $correct_answer = $a * $b;
                    break;
            }
            line('Question: ' . $a . ' ' . $o . ' ' . $b);
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
}
