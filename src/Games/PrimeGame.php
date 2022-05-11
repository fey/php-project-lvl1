<?php

namespace BrainGames\Games\PrimeGame;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUNDS_COUNT;

function isPrime(int $number): bool
{
    if ($number < 2) {
        return false;
    }
    for ($delim = 2; $delim ** 2 <= $number; $delim += 1) {
        if ($number % $delim === 0) {
            return false;
        }
    }
    return true;
}

function buildRound()
{
    $number = random_int(5, 100);

    $answer = isPrime($number) ? 'yes' : 'no';

    return [
        'question' => "$number",
        'answer' => "$answer",
    ];
}

function run(): void
{
    $description = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $rounds = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i += 1) {
        $rounds[] = buildRound();
    }

    runGame($description, $rounds);
}
