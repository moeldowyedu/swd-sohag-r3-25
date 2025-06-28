<?php
// 4. PDO with prepared statements to prevent SQL injection
try{
    $connection = new PDO('mysql:host=localhost;dbname=solanddb','root','');
}catch(PDOException $exception){
    echo "Connection failed: " . $exception->getMessage();
    exit();
}