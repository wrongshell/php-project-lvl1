<?php

namespace BrainGames\Misc;

function getDivisors(int $number): array
{
    $divisors = [];

    for ($i = 1; $i <= $number; $i++) {
        if (is_int($number / $i)) {
            $divisors[] = $i;
        }
    }

    return $divisors;
}

function getProgression(int $size): array
{
    $progression = array(
        '0' => random_int(1, 10)
    );
    $step = random_int(2, 5);

    for ($i = 1; $i <= $size - 1; $i++) {
        $progression[$i] = $progression[$i - 1] + $step;
    }

    return $progression;
}
