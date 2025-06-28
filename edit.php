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
            <div class="form-container">
                <h2 class="mb-4 text-center">User Registration</h2>
                <form action="updateUser.php" method="post" enctype="multipart/form-data">
<!--                    <div class="mb-3">
                        <label for="userImage" class="form-label">Profile Image</label>
                        <input type="file" class="form-control" id="userImage" name="userImage" accept="image/*" >
                    </div>-->
                    <input type="hidden" name="id" value="<?=$user['id']?>">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?=$user['name']?>" placeholder="Enter your full name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?=$user['email']?>" placeholder="Enter your email" required>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
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
