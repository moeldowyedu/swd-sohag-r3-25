<?php
if($_SERVER['REQUEST_METHOD']==='POST'&&!empty($_POST)){
    require_once 'functions.php';
    require_once 'connection.php';
    $name=cleanData($_POST['name']);
    $email=cleanData($_POST['email']);
    $password=password_hash($_POST['password'], PASSWORD_DEFAULT);
    $imageName = $_FILES['userImage']['name'];
    $imageTmp = $_FILES['userImage']['tmp_name'];
    $uniqueImageName = uniqid('img_', true) . '.' . pathinfo($imageName, PATHINFO_EXTENSION);

    // insert prepare using ?
    //$stmt = $connection->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    //$stmt->bind_param( $name, $email, $password);
    //$stmt->execute([$name, $email, $password]);
    // insert prepare using placeholders
    $stmt = $connection->prepare("INSERT INTO users (name, email, password,image) VALUES (:name, :email, :password, :image)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':image', $uniqueImageName);
    $insert=$stmt->execute();
    if($insert){
        if(!empty($imageName)){
            move_uploaded_file($imageTmp, "assets/imgs/$uniqueImageName");
        }
        header('Location: login.php');

    }



}
