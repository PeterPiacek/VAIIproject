<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "schooldb";
	$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /*$sql = $conn->prepare('INSERT INTO activityplan (author, date, activity, description) VALUES (:author, :date, :activity, :description)');
    
    $sql->bindParam(':date',$_POST['date']);
    $sql->bindParam(':activity',$_POST["activity"]);
    $sql->bindParam(':description',$_POST["description"]);
    $sql->bindParam(':author',$_POST["author"]);
    $sql->execute();

    echo $sql->rowCount();*/

	header('Content-Type: application/json');