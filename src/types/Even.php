<?php

namespace Brain\Games\Types\Even;

use Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function generateTask(): array
{
    $task['question'] = random_int(1, 99);
    $task['answer'] = $task['question'] % 2 === 0 ? 'yes' : 'no';

    return $task;
}

function playEven(): bool
{
    $name = Engine\getName();
    line('Answer "yes" if the number is even, otherwise answer "no".');

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
