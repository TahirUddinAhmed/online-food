<?php

/**
 * check_input function
 *
 * @param $data
 * @return $data
 */
function check_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

/**
 * validate contact form
 *
 * @param [string] $fullname
 * @param [string] $email
 * @param [number] $phone
 * @param [string] $message
 * @return bool
 */
function validateContact($fullname, $email, $phone, $message):bool {
    $val = false;
    if(empty($fullname) || empty($email) || empty($phone) || empty($message)) {
       $val = true;
    }

    return $val;
}