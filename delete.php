<?php
session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    // Check if user ID is provided
    if(isset($_GET['id'])) {
        $userId = $_GET['id'];

        // Include database connection
        require_once 'connection.php';

        // Fetch user data
        $selectUser = $connection->prepare("DELETE FROM users WHERE id = :id");
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
?>
