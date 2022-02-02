<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\playGame;
use function BrainGames\Misc\getDivisors;

const GAME_NAME = 'Prime';
const GAME_DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $number): bool
{
    if ($number <= 1 || $number % 2 === 0 || $number % 3 === 0) {
        return false;
    } elseif ($number === 2 || $number === 3) {
        return true;
    } else {
        for ($i = 5; $i < $number; $i++) {
            if ($number % $i === 0) {
                return false;
            }
        }
        return true;
    }
}

function play(): void
{
    $generateTask = function (): array {
        $number = random_int(1, 99);

        return [
            'question' => $number,
            'answer' => isPrime($number) ? 'yes' : 'no'
        ];
    };

    playGame(GAME_NAME, GAME_DESCRIPTION, $generateTask);
}
