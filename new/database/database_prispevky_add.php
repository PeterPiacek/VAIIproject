<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "schooldb";
	$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = $conn->prepare('INSERT INTO articles (author, title, article) VALUES (:author, :title, :segment)');
    
    $sql->bindParam(':segment',$_POST["segment"]);
    $sql->bindParam(':title',$_POST["title"]);
    $sql->bindParam(':author',$_POST["author"]);
    $sql->execute();

	header('Content-Type: application/json');