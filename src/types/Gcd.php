<?php

namespace Brain\Games\Types\Gcd;

use Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function getDivisors(int $number): array
{
    for ($i = 1; $i <= $number; $i++) {
        if (is_int($number / $i)) {
            $divisors[] = $i;
        }
    }

    return $divisors;
}

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
    $name = Engine\getName();
    line('Find the greatest common divisor of given numbers.');

    $scores = 0;

    while ($scores < Engine\MAX_WINS) {
        $task = generateTask();
        Engine\askQuestion($task['question']);
        $userAnswer = Engine\getAnswer();
        Engine\checkAnswer($name, $task['answer'], $userAnswer) ? $scores++ : $scores = 0;
    }

    Engine\printCongrats($name);

    return true;
}
