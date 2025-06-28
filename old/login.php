<?php
session_start();
if (isset($_SESSION['username'])) {
   echo "<h1>you are already loggedin</h1>";
    header("Refresh: 3; url=index.php");
    exit();
}else{?>
<?php require_once 'templates/header.php'; ?>
<div class="login-form">
    <h2>Login</h2>
    <form id="loginForm" method="post" action="checkLogin.php">
       <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <div class="text-center mt-3">
        <a href="register.php">Don't have an account? Register here</a>
    </div>
</div>
<?php require_once 'templates/footer.php'; ?>
<?php }