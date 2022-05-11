<?php

namespace BrainGames\Games\EvenGame;

use function BrainGames\Engine\runGame;

function isEven($number): bool
{
    return $number % 2 == 0;
}

function buildRound()
{
    $number = random_int(5, 50);
    $answer = isEven($number) ? 'yes' : 'no';

    return [
        'question' => "{$number}",
        'answer' => $answer,
    ];
}

function run()
{
    $description = 'Answer "yes" if the number is even, otherwise answer "no".';
    $rounds = [];

    for ($i = 0; $i < 3; $i += 1) {
        $rounds[] = buildRound();
    }

    runGame($description, $rounds);
}
