<?php

namespace BrainGames\Games\Gcd;

use BrainGames\Engine;

use function cli\line;
use function BrainGames\Engine\{getName, askQuestion, getAnswer, checkAnswer, printCongrats};
use function BrainGames\Misc\getDivisors;

use const BrainGames\Engine\MAX_WINS;

function generateTask(): array
{
    $task = array();

    $number1 = random_int(1, 99);
    $number2 = random_int(1, 99);
    $divisors = array_intersect(getDivisors($number1), getDivisors($number2));

    $task['question'] = "{$number1} {$number2}";
    $task['answer'] = end($divisors);

    return $task;
}

function playGcd(): bool
{
    $name = getName();
    line('Find the greatest common divisor of given numbers.');

    for ($scores = 0; $scores < MAX_WINS;) {
        $task = generateTask();
        askQuestion($task['question']);
        $userAnswer = getAnswer();
        if (checkAnswer($name, $task['answer'], $userAnswer)) {
            $scores++;
        } else {
            return false;
        }
    }

    printCongrats($name);

    return true;
}
