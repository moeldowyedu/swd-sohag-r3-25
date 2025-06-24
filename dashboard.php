<?php
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_FILES['file'])){
    $email = $_POST['email'];
    $name = $_POST['name'];
    $fileName = $_FILES['file']['name'];
    // array of allowed image extensions
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    $filenameParts = explode('.', $fileName);//returns an indexed array of file name parts [0 => 'example', 1 => 'extension']
    $fileExtension = strtolower(end($filenameParts)); // get the last part of the array, which is the file extension
    $fileType = $_FILES['file']['type'];
    // array of allowed file types for images only
    $allowedFileTypes = ['image/jpeg', 'image/png', 'image/gif'];
    $fileTempName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    if(in_array($fileExtension,$allowedExtensions)){
        move_uploaded_file($fileTempName,"images/".$fileName);
        echo "File uploaded successfully: " . htmlspecialchars($fileName) . "<br>";
    }else{
        echo "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.<br>";
    }
}else {
    echo "No file uploaded or invalid request.";
    header('Refresh: 5; url=index.php');
}