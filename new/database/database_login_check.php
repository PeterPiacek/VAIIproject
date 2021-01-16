<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "schooldb";
	$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = $conn->prepare('SELECT name, admin FROM profiles WHERE name LIKE :name and password LIKE :password');
    $sql->bindParam(':name',$_POST["name"]);
    $sql->bindParam(':password',$_POST["password"]);
    $sql->execute();
	/*$res = $conn->query($sql);
    $rows = array();*/
    $rows = [];
    if ($sql->rowCount() > 0) {
        $rows = $sql->fetch(PDO::FETCH_ASSOC);
        /*while ($data = $res->fetch(PDO::FETCH_ASSOC)) {
            count++
        }*/
    } else {
        $rows = NULL;
        //rows[] = "No data";
    }

	header('Content-Type: application/json');
	echo json_encode($rows);