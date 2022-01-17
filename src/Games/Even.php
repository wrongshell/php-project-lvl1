<?php

namespace BrainGames\Games\Even;

use BrainGames\Engine;

// use function cli\line;
// use function BrainGames\Engine\{getName, askQuestion, getAnswer, checkAnswer, printCongrats};
use function BrainGames\Engine\playGame;

// use const BrainGames\Engine\MAX_WINS;

const GAME = 'Even';
const RULES = 'Answer "yes" if the number is even, otherwise answer "no".';

// $generateTask = function (): array {
//     $task = [];
//     $task['question'] = random_int(1, 99);
//     $task['answer'] = $task['question'] % 2 === 0 ? 'yes' : 'no';

//     return $task;
// };

// function playEven(): bool
// {
//     $name = getName();
//     line('Answer "yes" if the number is even, otherwise answer "no".');

//     for ($scores = 0; $scores < MAX_WINS;) {
//         $task = generateTask();
//         askQuestion($task['question']);
//         $userAnswer = getAnswer();
//         if (checkAnswer($name, $task['answer'], $userAnswer)) {
//             $scores++;
//         } else {
//             return false;
//         }
//     }

//     printCongrats($name);

//     return true;
// }

function play(): void
{
    $generateTask = function (): array {
        $task = [];
        $task['question'] = random_int(1, 99);
        $task['answer'] = $task['question'] % 2 === 0 ? 'yes' : 'no';

        return $task;
    };

    playGame(GAME, RULES, $generateTask);

    return;
}
