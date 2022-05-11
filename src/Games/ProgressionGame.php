<?php

namespace BrainGames\Games\ProgressionGame;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUNDS_COUNT;

function buildProgression(int $start, int $step, int $size): array
{
    $progression = [];

    for ($i = 0; $i < $size; $i += 1) {
        $progression[] = $start + $step * $i;
    }

    return $progression;
}

function buildRound(): array
{
    $size = 10;
    $start = random_int(5, 10);
    $step = random_int(5, 10);
    $hiddenElementPosition = random_int(0, $size - 1);

    $progression = buildProgression($start, $step, $size);
    $answer = $progression[$hiddenElementPosition];
    $progression[$hiddenElementPosition] = '..';

    return [
        'question' => implode(' ', $progression),
        'answer' => "$answer",
    ];
}

function run(): void
{
    $description = 'What number is missing in the progression?';
    $rounds = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i += 1) {
        $rounds[] = buildRound();
    }

    runGame($description, $rounds);
}
