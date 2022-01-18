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

    // $name = getName();
    line('%s', $desc);

    for ($scores = 0; $scores < MAX_WINS;) {
        $task = $generateTask();
        // askQuestion($task['question']);
        line("Question: %s", $task['question']);
        // $userAnswer = getAnswer();
        $userAnswer = strtolower(prompt('Your answer'));
        if (checkAnswer($name, $task['answer'], $userAnswer)) {
            $scores++;
        } else {
            return;
        }
    }

    // printCongrats($name);
    line("Congratulations, %s!", $name);
}

// function getName(): string
// {
//     line('Welcome to the Brain Games!');
//     $name = prompt('May I have your name?');
//     line("Hello, %s!", $name);
//     return $name;
// }

// function askQuestion(string $question): void
// {
//     line("Question: %s", $question);
// }

// function getAnswer(): string
// {
//     $answer = strtolower(prompt('Your answer'));
//     return $answer;
// }

function checkAnswer(string $name, string $correctAnswer, string $userAnswer): bool
{
    if ($correctAnswer === $userAnswer) {
        line("Correct!");
        return true;
    } else {
        line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
        line("Let's try again, %s!", $name);
        return false;
    }
}

// function printCongrats(string $name): void
// {
//     line("Congratulations, %s!", $name);
// }
