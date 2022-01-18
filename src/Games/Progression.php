<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\playGame;

const GAME_NAME = 'Progression';
const GAME_DESCRIPTION = 'What number is missing in the progression?';

function play(): void
{
    $generateTask = function (): array {
        $progression = array(
            '0' => random_int(1, 10)
        );
        $step = random_int(2, 5);
        $length = 10;

        for ($i = 1; $i <= $length - 1; $i++) {
            $progression[$i] = $progression[$i - 1] + $step;
        }

        $secretKey = random_int(0, $length - 1);
        $secretValue = $progression[$secretKey];
        $progression[$secretKey] = '..';
        $task = array(
            'question' => implode(' ', $progression),
            'answer' => $secretValue
        );

        return $task;
    };

    playGame(GAME_NAME, GAME_DESCRIPTION, $generateTask);
}
