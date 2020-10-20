<?php

// Create cards using html and php variables in a returned string to display to user

function output()
{

    global $cards;
    $output = '<div class="row justify-content-center">' . $cards . '</div>';
    return $output;
}
