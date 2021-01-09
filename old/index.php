<?php

	function loadPage($page) {
		if ($page == "plan_aktivit"){
			include "plan_aktivit.php";
		} else if ($page == "prispevky"){
			include "prispevky.php";
		}else if ($page == "gallery"){
			include "gallery.php";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Temporary</title>
		<link rel="shortcut icon" href="placeholder.png">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class="menu">
			<a href="index.php?page=gallery">foto</a>
			<a href="index.php?page=prispevky">príspevky</a>
			<a href="index.php?page=plan_aktivit">plán aktivít</a>
		</div>
		<?php 
			if (!isset($_GET['page']))
				include "plan_aktivit.php";
			else loadPage($_GET['page']);
		?>
	</body>
</html>