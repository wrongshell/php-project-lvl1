<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\playGame;

const GAME_NAME = 'Progression';
const GAME_DESCRIPTION = 'What number is missing in the progression?';

function getProgression(int $size, array $start, array $step): array
{
    $progression = array(
        '0' => random_int($start[0], $start[1])
    );
    $step = random_int($step[0], $step[1]);

    for ($i = 1; $i <= $size - 1; $i++) {
        $progression[$i] = $progression[$i - 1] + $step;
    }

    return $progression;
}

function play(): void
{
    $generateTask = function (): array {
        $progressionSize = 10;
        $progressionStart = [1, 10];
        $progressionStep = [2, 5];
        $progression = getProgression($progressionSize, $progressionStart, $progressionStep);
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
