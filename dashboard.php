<?php
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_FILES['file'])){
    $email = $_POST['email'];
    $name = $_POST['name'];
    $fileName = $_FILES['file']['name'];
    // array of allowed image extensions
/*  $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    $filenameParts = explode('.', $fileName);//returns an indexed array of file name parts [0 => 'movie', 1 => 'extension',2 => 'anotherExtension']
    $fileExtension = strtolower(end($filenameParts)); // get the last part of the array, which is the file extension*/
    $fileType = $_FILES['file']['type'];
    // array of allowed file types for images only
    $allowedFileTypes = ['image/jpeg', 'image/png', 'image/gif'];
    $fileTempName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    if(in_array($fileType,$allowedFileTypes)&& $fileSize < 5000000){
        // check if the file type is allowed and the file size is less than 5MB
        move_uploaded_file($fileTempName,"images/".$fileName);
        echo "File uploaded successfully: " . htmlspecialchars($fileName) . "<br>";
        echo "<img src='images/" . htmlspecialchars($fileName) . "' alt='Uploaded Image' style='max-width: 300px; max-height: 300px;'><br>";
    }else{
        echo "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed. OR file size is bigger than 5 MB<br>";
    }
}else {
    echo "No file uploaded or invalid request.";
    header('Refresh: 5; url=index.php');
}