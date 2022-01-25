<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\playGame;

const GAME_NAME = 'Calc';
const GAME_DESCRIPTION = 'What is the result of the expression?';

function calculate(int $num1, int $num2, string $operation): float
{
    switch ($operation) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        case '/':
            return $num1 / $num2;
        case '%':
            return $num1 % $num2;
        case '**':
            return $num1 ** $num2;
        default:
            exit('Unknown operation!');
    }
}

function play(): void
{
    $generateTask = function (): array {
        $operations = ['+','-','*'];
        $operation = $operations[array_rand($operations)];
        $number1 = random_int(1, 99);
        $number2 = random_int(1, 99);

        return [
            'question' => "{$number1} {$operation} {$number2}",
            'answer' => calculate($number1, $number2, $operation)
        ];
    };

    playGame(GAME_NAME, GAME_DESCRIPTION, $generateTask);
}
