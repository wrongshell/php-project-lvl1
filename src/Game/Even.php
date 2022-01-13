<?php

namespace Brain\Games\Game\Even;

use Brain\Games\Engine;

use function cli\line;
use function Brain\Games\Engine\{getName, askQuestion, getAnswer, checkAnswer, printCongrats};

function generateTask(): array
{
    $task['question'] = random_int(1, 99);
    $task['answer'] = $task['question'] % 2 === 0 ? 'yes' : 'no';

    return $task;
}

function playEven(): bool
{
    $name = getName();
    line('Answer "yes" if the number is even, otherwise answer "no".');

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
