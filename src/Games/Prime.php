<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\playGame;
use function BrainGames\Misc\getDivisors;

const GAME_NAME = 'Prime';
const GAME_DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function play(): void
{
    $generateTask = function (): array {
        $number = random_int(1, 99);
        $prime = count(getDivisors($number)) === 2;
        $task = [
            'question' => $number,
            'answer' => $prime ? 'yes' : 'no'
        ];

        return $task;
    };

    playGame(GAME_NAME, GAME_DESCRIPTION, $generateTask);
}
