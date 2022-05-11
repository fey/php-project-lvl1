<?php

namespace BrainGames\Games\GcdGame;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUNDS_COUNT;

function gcd(int $num1, int $num2): int
{
    $min = min([$num1, $num2]);
    $max = max([$num1, $num2]);
    $modulo = ($min === 0) ? 0 : ($max % $min);

    return ($modulo === 0) ? $min : gcd($min, $modulo);
}

function buildRound(): array
{
    $number1 = rand(2, 50);
    $number2 = rand(10, 100);

    $answer = gcd($number1, $number2);

    return [
        'question' => "{$number1} {$number2}",
        'answer' => "$answer",
    ];
}

function run(): void
{
    $description = 'Find the greatest common divisor of given numbers.';
    $rounds = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i += 1) {
        $rounds[] = buildRound();
    }

    runGame($description, $rounds);
}
