<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "schooldb";
	$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = $conn->prepare('INSERT INTO profiles (name, password, email, admin) VALUES (:name, :password, :email, false)');
    $sqlCheck = $conn->prepare('SELECT name FROM profiles WHERE name LIKE :name');
    
    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $sqlCheck->bindParam(':name',$_POST['name']);
    $sql->bindParam(':name',$_POST['name']);
    $sql->bindParam(':password',$hashed_password);
    $sql->bindParam(':email',$_POST["email"]);
    
    $sqlCheck->execute();
    if ($sqlCheck->rowCount() < 1) {
        $sql->execute();
    }

    header('Content-Type: application/json');