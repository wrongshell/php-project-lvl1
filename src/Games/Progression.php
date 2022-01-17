<?php

namespace BrainGames\Games\Progression;

use BrainGames\Engine;

use function cli\line;
use function BrainGames\Engine\{getName, askQuestion, getAnswer, checkAnswer, printCongrats};

function generateTask(): array
{
    $task = array();
    $progression = array();

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
    $name = getName();
    line('Find the greatest common divisor of given numbers.');

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
