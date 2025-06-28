<?php require_once 'templates/header.php'; ?>
<?php require_once 'templates/nav.php'; ?>

    <!-- Registration Form -->
    <div class="container mt-5">
        <div class="form-container">
            <h2 class="mb-4 text-center">User Registration</h2>
            <form action="insert.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="userImage" class="form-label">Profile Image</label>
                    <input type="file" class="form-control" id="userImage" name="userImage" accept="image/*" >
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
                <div class="mt-3 text-center">
                    <p>Already have an account? <a href="login.php">Login here</a></p>
                </div>
            </form>
        </div>
    </div>

<?php require_once 'templates/footer.php'; ?>
