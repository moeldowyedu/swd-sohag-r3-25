<?php
session_start();
// Unset all of the session variables
$_SESSION = array();
session_regenerate_id(true);
// Destroy the session
session_destroy();
header("Location: login.php");