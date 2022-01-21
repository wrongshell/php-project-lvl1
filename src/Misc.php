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
