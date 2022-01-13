<?php

namespace Brain\Games\Types\Gcd;

use Brain\Games\Engine;

use function cli\line;
use function Engine\{getName, askQuestion, getAnswer, checkAnswer, printCongrats, getDivisors};

function generateTask(): array
{
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

    $scores = 0;

    while ($scores < Engine\MAX_WINS) {
        $task = generateTask();
        askQuestion($task['question']);
        $userAnswer = getAnswer();
        checkAnswer($name, $task['answer'], $userAnswer) ? $scores++ : $scores = 0;
    }

    printCongrats($name);

    return true;
}
