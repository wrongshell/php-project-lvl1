<?php

namespace BrainGames\Games\Even;

use BrainGames\Engine;

use function cli\line;
use function BrainGames\Engine\{getName, askQuestion, getAnswer, checkAnswer, printCongrats};

function generateTask(): array
{
    $task = array();

    $task['question'] = random_int(1, 99);
    $task['answer'] = $task['question'] % 2 === 0 ? 'yes' : 'no';

    return $task;
}

function playEven(): bool
{
    $name = getName();
    line('Answer "yes" if the number is even, otherwise answer "no".');

    for ($scores = 0; $scores < Engine\MAX_WINS;) {
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