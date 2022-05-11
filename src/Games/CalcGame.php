<?php

namespace BrainGames\Games\CalcGame;

use InvalidArgumentException;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUNDS_COUNT;

function calculate($operation, $number1, $number2)
{
    return match ($operation) {
        '-' => $number1 - $number2,
        '+' => $number1 + $number2,
        '*' => $number1 * $number2,
        default => throw new InvalidArgumentException('Invalid operation'),
    };
}

function buildRound()
{
    $operations = ['-', '+', '*'];
    $number1 = random_int(5, 10);
    $number2 = random_int(5, 10);
    $operation = $operations[array_rand($operations)];
    $answer = calculate($operation, $number1, $number2);

    return [
        'question' => "{$number1} {$operation} {$number2}",
        'answer' => "$answer",
    ];
}

function run()
{
    $description = 'What is the result of the expression?';
    $rounds = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i += 1) {
        $rounds[] = buildRound();
    }

    runGame($description, $rounds);
}
