<?php

namespace BrainGames\Games\EvenGame;

use function cli\line;
use function cli\prompt;

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

function runGame()
{
    $description = 'Answer "yes" if the number is even, otherwise answer "no".';

    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?', null, ' ');
    line("Hello, %s!", $name);

    line($description);

    for ($i = 0; $i < 3; $i += 1) {
        ['question' => $question, 'answer' => $answer] = buildRound();

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
