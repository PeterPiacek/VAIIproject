<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "schooldb";
	$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "SELECT * FROM articles ORDER BY id desc";
	$res = $conn->query($sql);
	$rows = array();
	while ($data = $res->fetch(PDO::FETCH_ASSOC)) {
		$rows[] = $data;
	}

	header('Content-Type: application/json');
	echo json_encode($rows);