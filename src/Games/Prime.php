<?php

namespace Brain\Games;

use Brain\Engine as Engine;

use function cli\line;
use function cli\prompt;

class Prime
{
    public function play()
    {
        $engine = new Engine();
        $name = $engine->start();

        $on = true;
        $answer = '';
        $correct_answer = '';
        $counter = 0;

        line('Answer "yes" if given number is prime. Otherwise answer "no".');
        while ($on) {
            $number = rand(0, 100);
            $correct_answer = $this->isPrime($number) ? "yes" : "no";
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

    private function isPrime($number)
    {
        for ($i = 2; $i < $number / 2; $i++) {
            if ($number % $i == 0) {
                return false;
            }
        }
        return true;
    }
}
