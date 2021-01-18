<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "schooldb";
	$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = $conn->prepare('DELETE FROM articles WHERE id=:id');
    $sql->bindParam(':id',$_POST["id"]);
    $sql->execute();

    header('Content-Type: application/json');