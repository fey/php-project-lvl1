<?php

namespace BrainGames\Games\EvenGame;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUNDS_COUNT;

function isEven(int $number): bool
{
    return $number % 2 == 0;
}

function buildRound(): array
{
    $number = random_int(5, 50);
    $answer = isEven($number) ? 'yes' : 'no';

    return [
        'question' => "{$number}",
        'answer' => $answer,
    ];
}

function run(): void
{
    $description = 'Answer "yes" if the number is even, otherwise answer "no".';
    $rounds = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i += 1) {
        $rounds[] = buildRound();
    }

    runGame($description, $rounds);
}
