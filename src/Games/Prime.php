<?php

namespace BrainGames\Games\Prime;

use BrainGames\Engine;

use function cli\line;
use function BrainGames\Engine\getDivisors;
use function BrainGames\Engine\{getName, askQuestion, getAnswer, checkAnswer, printCongrats};

function generateTask(): array
{
    $task = array();

    $number = random_int(1, 99);
    $prime = count(getDivisors($number)) === 2 ? true : false;

    $task['question'] = $number;
    $task['answer'] = $prime ? 'yes' : 'no';

    return $task;
}

function playPrime(): bool
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