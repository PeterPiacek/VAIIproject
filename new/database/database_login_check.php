<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "schooldb";
	$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sqlcheck = $conn->prepare('SELECT password FROM profiles WHERE name LIKE :name');
    $sql = $conn->prepare('SELECT name, admin FROM profiles WHERE name LIKE :name');
    $sqlcheck->bindParam(':name',$_POST["name"]);
    $sql->bindParam(':name',$_POST["name"]);

    $sqlcheck->execute();
    $check = $sqlcheck->fetch(PDO::FETCH_ASSOC);
    $hash = $check["password"];
    $rows = [];
    if(password_verify($_POST["password"], $hash)){
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $rows = $sql->fetch(PDO::FETCH_ASSOC);
        } else {
            $rows = NULL;
        }
    } else {
        $rows = NULL;
    }

	header('Content-Type: application/json');
	echo json_encode($rows);