<?php

namespace Brain\Games\Types\Progression;

use Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function generateTask(): array
{
    $progression[] = random_int(1, 10);
    $step = random_int(2, 5);
    $length = 10;
    for ($i = 1; $i <= $length - 1; $i++) {
        $progression[$i] = $progression[$i - 1] + $step;
    }

    $secret_key = random_int(0, $length - 1);
    $secret_value = $progression[$secret_key];
    $progression[$secret_key] = '..';

    $task['question'] = implode(' ', $progression);
    $task['answer'] = $secret_value;

    return $task;
}

function playProgression(): bool
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
