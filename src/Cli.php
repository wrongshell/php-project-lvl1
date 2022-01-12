<?php

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

function welcome()
{
    $name = '%username%';
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}
