<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "schooldb";
	$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = $conn->prepare('UPDATE articles SET title=:title, article=:segment WHERE id=:id');
    
    $sql->bindParam(':id',$_POST["id"]);
    $sql->bindParam(':title',$_POST['title']);
    $sql->bindParam(':segment',$_POST["segment"]);
    $sql->execute();

    header('Content-Type: application/json');