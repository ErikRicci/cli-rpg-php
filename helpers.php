<?php

if (! function_exists('exit_run')) {
    function exit_run()
    {
        echo "\033[0m";
        exit();
    }
}

if (! function_exists('readline_hidden')) {
    function readline_hidden(string $prompt)
    {
        echo "\033[30;40m";
        readline($prompt);
        echo "\033[0m";
        return $prompt;
    }
}

if (! function_exists('character')) {
    function character()
    {
        return $GLOBALS['character'];
    }
}