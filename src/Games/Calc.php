<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\playGame;

const GAME = 'Calc';
const RULES = 'What is the result of the expression?';

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

function play(): void
{
    $generateTask = function (): array {
        $operations = ['+','-','*'];
        $operation = $operations[random_int(0, 2)];
        $number1 = random_int(1, 99);
        $number2 = random_int(1, 99);
        $task = [];
        $task['question'] = "{$number1} {$operation} {$number2}";
        $task['answer'] = eval('return ' . $task['question'] . ';');

        return $task;
    };

    playGame(GAME, RULES, $generateTask);

    return;
}
