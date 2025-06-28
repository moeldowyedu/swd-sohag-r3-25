<?php require_once 'templates/header.php'; ?>
<?php require_once 'templates/nav.php'; ?>
<div class="container mt-5">
    <div class="form-container">
        <h2 class="mb-4 text-center">User Login</h2>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="d-grid gap">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
            <div class="mt-3 text-center">
                <p>Don't have an account? <a href="registeration.php">Register here</a></p>
            </div>
        </form>
    </div>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'connection.php'; // Include database connection
    require_once 'functions.php'; // Include any necessary functions
    $email = cleanData($_POST['email']);
    $password = $_POST['password'];

    // Validate input
    if (empty($email) || empty($password)) {
        echo "<div class='alert alert-danger'>Please fill in all fields.</div>";
    } else {
        // Prepare and execute the query
        $stmt = $connection->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC); // Set fetch mode to associative array
        $user = $stmt->fetch();
        if($user){
            if(password_verify($password,$user['password'])){
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['name'];
                $_SESSION['logged_in'] = true;
                header("Location: index.php");
            }
            else {
                echo "<div class='alert alert-danger'>Invalid password.</div>";
            }
        }else {
            echo "<div class='alert alert-danger'>No user found with that email.</div>";
        }
    }
}
?>
<?php require_once 'templates/footer.php'; ?>
