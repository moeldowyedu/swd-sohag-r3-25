<?php
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) { ?>

<?php require_once 'templates/header.php'; ?>
<?php require_once 'templates/nav.php'; ?>
    <!-- Main Content -->
    <div class="container mt-5">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to User Management System</h1>
            <p class="lead">This is a simple user management system where you can register, view users, and more.</p>
            <hr class="my-4">
            <p>Click the button below to register a new user.</p>
            <a class="btn btn-primary btn-lg" href="registeration.php" role="button">Register Now</a>
        </div>
    </div>
<?php require_once 'templates/footer.php'; ?>
<?php } else {
    header("Location: login.php");
    exit();
}
