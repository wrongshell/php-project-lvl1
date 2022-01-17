<?php

namespace BrainGames\Games\Calc;

use BrainGames\Engine;

use function cli\line;
use function BrainGames\Engine\{getName, askQuestion, getAnswer, checkAnswer, printCongrats};

function generateTask(): array
{
    $task = array();

    $operations = ['+','-','*'];
    $operation = $operations[random_int(0, 2)];
    $number1 = random_int(1, 99);
    $number2 = random_int(1, 99);

    $task['question'] = "{$number1} {$operation} {$number2}";
    $task['answer'] = eval('return ' . $task['question'] . ';');

    return $task;
}

function playCalc(): bool
{
    $name = getName();
    line('What is the result of the expression?');

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
