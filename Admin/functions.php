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

function uiExist($conn, $email) {
   $sql = "SELECT * FROM `users` WHERE `Email` = '$email' AND `role` = 'admin'";
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