<?php
session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    require_once 'templates/header.php';
    require_once 'templates/nav.php';

    // Check if user ID is provided
    if(isset($_GET['id'])) {
        $userId = $_GET['id'];

        // Include database connection
        require_once 'connection.php';

        // Fetch user data
        $selectUser = $connection->prepare("SELECT * FROM users WHERE id = :id");
        $selectUser->bindParam(':id', $userId);
        $selectUser->execute();
        $user = $selectUser->fetch(PDO::FETCH_ASSOC);
?>
<!-- Main Content -->
<div class="container mt-5">
    <?php if($user): ?>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">User Profile</h4>
                </div>
                <div class="card-body text-center">
                    <img src="assets/imgs/<?= $user['image'] ?>" class="rounded-circle mb-3" alt="User Profile" width="150" height="150">
                    <h3><?= $user['name'] ?></h3>
                    <p class="text-muted"><?= $user['email'] ?></p>
                    <div class="mt-3">
                        <a href="allUsers.php" class="btn btn-secondary">Back to All Users</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
    <div class="alert alert-danger">User not found!</div>
    <a href="allUsers.php" class="btn btn-secondary">Back to All Users</a>
    <?php endif; ?>
</div>
<?php
    } else {
?>
<div class="container mt-5">
    <div class="alert alert-warning">No user ID provided!</div>
    <a href="allUsers.php" class="btn btn-secondary">Back to All Users</a>
</div>
<?php
    }

    require_once 'templates/footer.php';
} else {
    header("Location: login.php");
}
?>
