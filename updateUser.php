<?php

session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    require_once 'functions.php';
    // Check if user ID is provided
    if (isset($_POST['id'])) {
        $userId = $_POST['id'];
        $name=cleanData($_POST['name']);
        $email=cleanData($_POST['email']);

        // Include database connection
        require_once 'connection.php';

        // Fetch user data
        $selectUser = $connection->prepare("UPDATE users SET name=:name,email=:email WHERE id = :id");
        $selectUser->bindParam(':name', $name);
        $selectUser->bindParam(':email', $email);
        $selectUser->bindParam(':id', $userId);
        $selectUser->execute();
        header("Location: allUsers.php");
    } else {
        echo "<div class='alert alert-danger'>No user ID provided!</div>";
        exit;
    }
} else {
    header("Location: login.php");
}

