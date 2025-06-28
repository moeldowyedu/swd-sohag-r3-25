<?php
// php clean data function
function cleanData($data) {
    $data = trim($data); // Remove whitespace from the beginning and end
    $data = stripslashes($data); // Remove backslashes
    $data = htmlspecialchars($data); // Convert special characters to HTML entities
    return $data; // Return the cleaned data
}

// filter validate function for email
function validateEmail($email) {
    $email = cleanData($email); // Clean the email data
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return $email; // Return the valid email
    } else {
        return false; // Return false if the email is not valid
    }
}
