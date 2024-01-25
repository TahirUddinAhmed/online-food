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

/**
 * uiExists Function
 *
 * @param $conn
 * @param $email
 * @return bool
 */

function uiExist($conn, $email) {
    $sql = "SELECT * FROM `users` WHERE `Email` = '$email' AND `role` = 'buyer'";
    $result = mysqli_query($conn, $sql);
 
    if(!$result) {
     die("QUERY FAILED" . mysqli_error($conn));
    } 
 
    if($row = mysqli_fetch_assoc($result)) {
     return $row;
    } else {
     return false;
    }
    
 }