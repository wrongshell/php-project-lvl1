<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\playGame;

const GAME_NAME = 'Calc';
const GAME_DESCRIPTION = 'What is the result of the expression?';

function play(): void
{
    $generateTask = function (): array {
        $operations = ['+','-','*'];
        $operation = $operations[array_rand($operations)];
        $number1 = random_int(1, 99);
        $number2 = random_int(1, 99);
        $task = array(
            'question' => "{$number1} {$operation} {$number2}"
        );
        $task['answer'] = eval('return ' . $task['question'] . ';');

        return $task;
    };

    playGame(GAME_NAME, GAME_DESCRIPTION, $generateTask);
}
