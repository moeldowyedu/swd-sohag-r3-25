<?php
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'&&!empty($_POST['username'])&&!empty($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $users = [
        255 => ['username' => 'ahmed', 'password' => '123456'],
        256 => ['username' => 'mohamed', 'password' => '654321'],
        257 => ['username' => 'sarah', 'password' => 'abcdef'],
    ];
    $found=false;
    foreach ($users as $user) {
        if($username === $user['username']&&$password === $user['password']){
            $found = true;
            $_SESSION['username'] = $username;
            header("Location: index.php");
            break;
        }
    }
}
