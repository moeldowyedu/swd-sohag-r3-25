<?php
session_start();
unset($_SESSION['username']); // Unset the session variable
// protect your user against session fixation
session_regenerate_id(true); // Regenerate session ID to prevent session fixation
session_destroy(); // Destroy the session
header('Location: login.php'); // Redirect to login page