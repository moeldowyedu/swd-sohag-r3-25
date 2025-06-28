<?php
function cleanInput($data) {
    $data=trim($data);
    $data=strip_tags($data);
    $data=htmlspecialchars($data);
    return $data;
}

function validateNID($input){
    $pattern = '/^[23]\d{13}$/';
    return preg_match($pattern, $input);
}
