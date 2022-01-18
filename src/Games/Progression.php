<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\playGame;
use function BrainGames\Misc\getProgression;

const GAME_NAME = 'Progression';
const GAME_DESCRIPTION = 'What number is missing in the progression?';

function play(): void
{
    $generateTask = function (): array {
        $progressionSize = 10;
        $progression = getProgression($progressionSize);
        $secretKey = array_rand($progression);
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
