<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7">
         <?php
        if(isset($_SESSION['username'])){?>
            <div class="d-flex justify-content-between mb-3">
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        <?php }
        ?>