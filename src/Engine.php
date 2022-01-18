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
        $userAnswer = strtolower(prompt('Your answer'));

        if ($task['answer'] === $userAnswer) {
            line("Correct!");
            $scores++;
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $task['answer']);
            line("Let's try again, %s!", $name);
            return;
        }

        // if (checkAnswer($name, $task['answer'], $userAnswer)) {
        //     $scores++;
        // } else {
        //     return;
        // }
    }

    line("Congratulations, %s!", $name);
}

// function checkAnswer(string $name, string $correctAnswer, string $userAnswer): bool
// {
//     if ($correctAnswer === $userAnswer) {
//         line("Correct!");
//         return true;
//     } else {
//         line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
//         line("Let's try again, %s!", $name);
//         return false;
//     }
// }
