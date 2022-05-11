<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function runGame(string $description, array $rounds): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?', '', ' ');
    line("Hello, %s!", $name);

    line($description);

    foreach ($rounds as ['question' => $question, 'answer' => $answer]) {
        line("Question: %s", $question);
        $userAnswer = prompt('Your answer');

        if ($userAnswer !== $answer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $answer);
            line("Let's try again, {$name}!");
            return;
        }

        line('Correct!');
    }

    line("Congratulations, {$name}!");
}
