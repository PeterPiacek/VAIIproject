<?php
	/*class Database {
		
		private $con;
		
		public function __construct() {
			$this->con = mysqli_connect("localhost", "root", "", "skola");
		}
		
		public function addActivity($date, $activity, $description) {
			mysqli_query($this->con, "INSERT INTO plan_aktivit (date, activity, description) VALUES ('$date', '$activity', '$description');");
		}
		
		public function loadActivity() {
			$plans = mysqli_query($this->con, "SELECT * FROM plan_aktivit ORDER BY date ASC");
			while ($row = mysqli_fetch_assoc($plans)){
				echo '<tr>';
				echo '<td>'.$row['date'].'</td>';
				echo '<td>'.$row['activity'].'</td>';
				echo '<td>'.$row['description'].'</td>';
				echo '<td>
					<form method="POST">
						<button type="submit" name="Delete" value='.$row['id'].'>Delete</button>
						<button type="submit" name="Update_tag" value='.$row['id'].'>Update</button>
					</form>
				</td>';
			}
		}
		
		public function updateActivity($id, $date, $activity, $description) {
			mysqli_query($this->con, "UPDATE plan_aktivit SET date='$date', activity='$activity', description='$description' WHERE id='$id'");
		}
		
		public function deleteActivity($id) {
			mysqli_query($this->con, "DELETE FROM plan_aktivit WHERE id=$id");
		}
		
    }*/
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "profiles";

    $this->con = mysqli_connect($servername, $username, $password, $database);

    if (!$conn){
        die("Connection failed: " , mysqli_connect_error())
    }