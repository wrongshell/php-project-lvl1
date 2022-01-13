<?php

namespace Brain\Games\Types\Prime;

use Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function generateTask(): array
{
    $number = random_int(1, 99);
    $prime = count(Engine\getDivisors($number)) === 2 ? true : false;

    $task['question'] = $number;
    $task['answer'] = $prime ? 'yes' : 'no';

    return $task;
}

function playPrime(): bool
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
