<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function ask(string $name): bool
{
    $number = random_int(1, 99);
    line("Question: %s", $number);
    $answer = strtolower(prompt('Your answer'));
    if ($answer !== 'yes' && $answer !== 'no') {
        line("'%s' is wrong answer ;(. Please, read the rules.", $answer);
        return false;
    } elseif ($answer === 'yes' && !isEven($number)) {
        line("'yes' is wrong answer ;(. Correct answer was 'no'.");
        line("Let's try again, %s!", $name);
        return false;
    } elseif ($answer === 'no' && isEven($number)) {
        line("'no' is wrong answer ;(. Correct answer was 'yes'.");
        line("Let's try again, %s!", $name);
        return false;
    } else {
        line("Correct!");
        return true;
    }
}

function play(): bool
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $scores = [];
    while (count($scores) < 3) {
        if (ask($name)) {
            array_push($scores, 'win');
        } else {
            array_pop($scores);
        }
    }
    line("Congratulations, %s!", $name);
    return true;
}
