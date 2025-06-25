<?php
require_once 'functions.php';
session_start();
if (!isset($_SESSION['username'])) {
    header('Refresh: 5; url=login.php');
    echo "<h1>Unauthorized access. Please log in first.</h1>";
    exit;
}

$uploadSuccess = false;
$errorMsg = '';
$fileUrl = '';
$fileName = '';
$email = '';
$name = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    $email = cleanInput($_POST['email']);
    if(filter_var($email,FILTER_SANITIZE_EMAIL) === false)
        $errorMsg = "Invalid email format.";{

    }

    $name = cleanInput($_POST['name']);
    $nationalId = validateNID($_POST['national_id']);

    $fileName = $_FILES['file']['name'];
    $fileType = $_FILES['file']['type'];
    $allowedFileTypes = ['image/jpeg', 'image/png', 'image/gif'];
    $fileTempName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];

    if (in_array($fileType, $allowedFileTypes) && $fileSize < 5000000) {
        $targetPath = "images/" . basename($fileName);
        move_uploaded_file($fileTempName, $targetPath);
        $fileUrl = $targetPath;
        $uploadSuccess = true;
    } else {
        $errorMsg = "Invalid file type or file size exceeds 5MB.";
    }
}
?>
<?php require_once 'templates/header.php'; ?>
            <?php if ($uploadSuccess): ?>
                <div class="alert alert-success">File uploaded successfully!</div>
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Uploaded File</h5>
                        <div class="mb-3">
                            <img src="<?= htmlspecialchars($fileUrl) ?>" alt="Uploaded Image" class="img-fluid rounded" style="max-width: 300px;">
                        </div>
                        <ul class="list-group mb-3">
                            <li class="list-group-item"><strong>File Name:</strong> <?= htmlspecialchars($fileName) ?></li>
                            <li class="list-group-item"><strong>Email:</strong> <?= $email ?></li>
                            <li class="list-group-item"><strong>Name:</strong> <?= $name ?></li>
                        </ul>
                        <form action="dashboard.php" method="post" class="mt-4">
                            <h6>Send Additional Data</h6>
                            <div class="mb-3">
                                <label for="additional" class="form-label">Additional Info</label>
                                <input type="text" class="form-control" id="additional" name="additional" placeholder="Enter more info">
                            </div>
                            <button type="submit" class="btn btn-primary">Send</button>
                        </form>
                    </div>
                </div>
            <?php elseif ($errorMsg): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($errorMsg) ?></div>
            <?php else: ?>
                <div class="alert alert-warning">No file uploaded or invalid request.</div>
            <?php header('Refresh: 3; url=index.php');?>
            <?php endif; ?>
<?php require_once 'templates/footer.php'; ?>