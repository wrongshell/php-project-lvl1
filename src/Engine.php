<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

define('Brain\Games\Engine\MAX_WINS', 3);

function getDivisors(int $number): array
{
    for ($i = 1; $i <= $number; $i++) {
        if (is_int($number / $i)) {
            $divisors[] = $i;
        }
    }

    return $divisors;
}

function getName(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function askQuestion(string $question): bool
{
    line("Question: %s", $question);
    return true;
}

function getAnswer(): string
{
    $answer = strtolower(prompt('Your answer'));
    return $answer;
}

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

function printCongrats(string $name): bool
{
    line("Congratulations, %s!", $name);
    return true;
}
