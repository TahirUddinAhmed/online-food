<?php

/**
 * check_input function
 *
 * @param $input
 * @return void
 */

// validate form input
function check_input($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);

    return $input;
}