<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\playGame;
use function BrainGames\Misc\getDivisors;

const GAME = 'Gcd';
const RULES = 'Find the greatest common divisor of given numbers.';

function play(): void
{
    $generateTask = function (): array {
        $number1 = random_int(1, 99);
        $number2 = random_int(1, 99);
        $divisors = array_intersect(getDivisors($number1), getDivisors($number2));
        $task = [];
        $task['question'] = "{$number1} {$number2}";
        $task['answer'] = end($divisors);

        return $task;
    };

    playGame(GAME, RULES, $generateTask);

    return;
}
