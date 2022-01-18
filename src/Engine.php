<?php

namespace BrainGames\Engine;

use BrainGames\Games\{Calc, Even, Gcd, Prime, Progression};

use function cli\line;
use function cli\prompt;

const MAX_WINS = 3;

function playGame(string $game, string $desc, callable $generateTask): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('%s', $desc);

    for ($scores = 0; $scores < MAX_WINS;) {
        $task = $generateTask();
        line("Question: %s", $task['question']);
        $userAnswer = prompt('Your answer');

        if (strtolower($task['answer']) === strtolower($userAnswer)) {
            line("Correct!");
            $scores++;
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $task['answer']);
            line("Let's try again, %s!", $name);
            return;
        }
    }

    line("Congratulations, %s!", $name);
}
