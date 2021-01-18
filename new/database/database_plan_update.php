<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "schooldb";
	$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = $conn->prepare('UPDATE activityplan SET date=:date, activity=:activity, description=:description WHERE id=:id');
    
    $sql->bindParam(':id',$_POST["id"]);
    $sql->bindParam(':date',$_POST['date']);
    $sql->bindParam(':activity',$_POST["activity"]);
    $sql->bindParam(':description',$_POST["description"]);
    $sql->execute();

    header('Content-Type: application/json');