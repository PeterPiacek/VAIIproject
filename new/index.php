<?php
	function loadPage($page) {
		if ($page == "plan_aktivit"){
			include "plan_aktivit.html";
		} else if ($page == "prispevky"){
			include "prispevky.html";
		}else if ($page == "ucivo"){
			include "ucivo.html";
		}else if ($page == "login"){
            include "login.php";
        }
	}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular-route.js"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
        <link href="css/index.css" rel="stylesheet">
        <script src="js/app.js"></script>
    </head>
    <!--
            Extra small
            <576px	Small
            ≥576px	Medium
            ≥768px	Large
            ≥992px	X-Large
            ≥1200px	XX-Large
            ≥1400px

            .container	    100%	540px	720px	960px	1140px	1320px
            .container-sm	100%	540px	720px	960px	1140px	1320px
            .container-md	100%	100%	720px	960px	1140px	1320px
            .container-lg	100%	100%	100%	960px	1140px	1320px
            .container-xl	100%	100%	100%	100%	1140px	1320px
            .container-xxl	100%	100%	100%	100%	100%	1320px
            .container-fluid	100%	100%	100%	100%	100%	100%
         -->
    <body class="container">
        <div class="logo">
            <a href="index.php?page=login">
                <img src="images/placeholder.png" alt="temporary picture" width="100" height="100">
                <h1>Skola</h1>
            </a>
        </div>
        <div class="menu dropdown">
            <span class="d-block d-md-none drop">menu</span>
            <ul class="col-12 center-block center-text">
                <li class="d-block d-md-inline"><a href="index.php?page=prispevky">prispevky</a></li>
                <li class="d-block d-md-inline"><a href="index.php?page=ucivo">ucivo</a></li>
                <li class="d-block d-md-inline"><a href="index.php?page=ucivo">ulohy</a></li>
                <li class="d-block d-md-inline"><a href="index.php?page=plan_aktivit">plan aktivit</a></li>
            </ul>
        </div>
        <div>
            <?php 
                if (!isset($_GET['page']))
                    include "plan_aktivit.html";
                else loadPage($_GET['page']);
            ?>
        </div>
    </body>
</html>