<?php

namespace Brain\Games\Types\Calc;

use Brain\Games\Engine;

use function cli\line;
use function Engine\{getName, askQuestion, getAnswer, checkAnswer, printCongrats};

function generateTask(): array
{
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
