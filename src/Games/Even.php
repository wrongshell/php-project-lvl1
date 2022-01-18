<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\playGame;

const GAME_NAME = 'Even';
const GAME_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function play(): void
{
    $generateTask = function (): array {
        $task = [];
        $task['question'] = random_int(1, 99);
        $task['answer'] = $task['question'] % 2 === 0 ? 'yes' : 'no';

        return $task;
    };

    playGame(GAME_NAME, GAME_DESCRIPTION, $generateTask);
}
