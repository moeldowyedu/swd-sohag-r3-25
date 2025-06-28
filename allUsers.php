<?php
session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']=== true) {
require_once 'templates/header.php';
require_once 'templates/nav.php';
require_once 'connection.php'; // Include database connection
$selectUsers = $connection->prepare("SELECT * FROM users");
$selectUsers->execute();
$users = $selectUsers->fetchAll(PDO::FETCH_ASSOC); // Fetch all users as an associative array
?>
    <!-- Main Content -->
    <div class="container mt-5">
        <h2 class="mb-4">All Registered Users</h2>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Profile Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Sample data - in a real application, this would be populated from a database -->
                    <?php
                    foreach ($users as $user) {?>
                        <tr>
                            <td><img src="assets/imgs/<?= $user['image']?>" class="rounded-circle" alt="User 1" width="50" height="50"></td>
                            <td><?= $user['name']?></td>
                            <td><?= $user['email']?></td>
                            <td>
                                <a href="profile.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-info">View</a>
                                <a href="edit.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="delete.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<?php require_once 'templates/footer.php'; ?>
<?php
} else {
    header("Location: login.php");
}
