<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\playGame;

const GAME = 'Progression';
const RULES = 'What number is missing in the progression?';

function play(): void
{
    $generateTask = function (): array {
        $progression = [];
        $progression[] = random_int(1, 10);
        $step = random_int(2, 5);
        $length = 10;

        for ($i = 1; $i <= $length - 1; $i++) {
            $progression[$i] = $progression[$i - 1] + $step;
        }

        $secret_key = random_int(0, $length - 1);
        $secret_value = $progression[$secret_key];
        $progression[$secret_key] = '..';
        $task = [];
        $task['question'] = implode(' ', $progression);
        $task['answer'] = $secret_value;

        return $task;
    };

    playGame(GAME, RULES, $generateTask);

    return;
}
