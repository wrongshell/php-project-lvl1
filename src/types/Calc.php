<?php

namespace Brain\Games\Types\Calc;

use Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

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
    $name = Engine\getName();
    line('What is the result of the expression?');

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
