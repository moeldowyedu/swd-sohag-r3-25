<?php
session_start();
if(isset($_SESSION['username'])){?>
<?php require_once 'templates/header.php';?>
            <div class="col-md-6 col-lg-5">
                <div class="d-flex justify-content-end mb-3">

                </div>
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h1 class="card-title mb-4 text-center"><?="Welcome ". $_SESSION['username']?></h1>
                        <h2 class="card-title mb-4 text-center">Upload File</h2>
                        <form action="dashboard.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="file" class="form-label">Choose File</label>
                                <input class="form-control" type="file" id="file" name="file" accept=".txt,.jpg,.png" required>
                                <div class="form-text">Accepted: .txt, .jpg, .png</div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" required placeholder="name@example.com">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" required placeholder="Your Name">
                            </div>
                            <div class="mb-3">
                                 <label for="national_id" class="form-label">Egypt National ID</label>
                                 <input type="text" class="form-control" id="national_id" name="national_id" placeholder="Enter 14-digit National ID">
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
<?php require_once 'templates/footer.php';?>
    <?php
} else {
    header('Refresh: 5; url=login.php');
    echo "<h1>Unauthorized access. Please log in first.</h1>";

}