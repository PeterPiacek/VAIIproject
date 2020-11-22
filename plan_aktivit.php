<?php
	require 'db.php';
	//prida zaznam do DB
	function addActivity($con){
		$date = $_POST['date'];
		$activity = $_POST['activity'];
		$description = $_POST['description'];
		mysqli_query($con, "INSERT INTO plan_aktivit (date, activity, description) VALUES ('$date', '$activity', '$description');");
	}
	//vymaze zaznam z DB
	function deleteActivity($con){
		$id = $_POST['Delete'];
		mysqli_query($con, "DELETE FROM plan_aktivit WHERE id=$id");
	}
	//upravy zaznam v DB
	function updateActivity($con) {
		$id = $_POST['Update'];
		$date = $_POST['date'];
		$activity = $_POST['activity'];
		$description = $_POST['description'];
		mysqli_query($con, "UPDATE plan_aktivit SET date='$date', activity='$activity', description='$description' WHERE id='$id'");
	}
	//kontroluje aky prikaz sa zadal, a ci ma potrebne data
	if (isset($_POST['date']) && isset($_POST['activity']) && isset($_POST['description']) && isset($_POST['Add'])){
		addActivity($con);
	} else if (isset($_POST['Delete'])) {
		deleteActivity($con);
	} else if (isset($_POST['date']) && isset($_POST['activity']) && isset($_POST['description']) && isset($_POST['Update'])) {
		updateActivity($con);
	}
?>
<!-- tabuka s udajmy vytiahnutimy z databazy -->
<table class="plan">
	<thead>
		<tr>
			<th>
				Datum
			</th>
			<th>
				Akcia
			</th>
			<th>
				Popis
			</th>
			<th>
				Funkcie
			</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$plans = mysqli_query($con, "SELECT * FROM plan_aktivit ORDER BY date ASC");
		while ($row = mysqli_fetch_assoc($plans)){
			echo '<tr>';
			echo '<td>'.$row['date'].'</td>';
			echo '<td>'.$row['activity'].'</td>';
			echo '<td>'.$row['description'].'</td>';
			#echo '<td><a href="index.php??page=plan_aktivit+delete='.$row['id'].'">Zmaz</a></td>';
			echo '<td>
					<form method="POST">
						<button type="submit" name="Delete" value='.$row['id'].'>Delete</button>
						<button type="submit" name="Update_tag" value='.$row['id'].'>Update</button>
					</form>
				</td>';
		}
		?>
	</tbody>
</table>
<!-- oznamuje co forma roby -->
<?php 
	if (isset($_POST['Update_tag'])){
		echo '<h3>upravenie aktivity</h3>'; 
	} else {
		echo '<h3>pridanie aktivity</h3>'; 
	}
?>
<!-- forma, kde sa zadavaju prikazy pre funkcie DB -->
<form method="POST">
	<label for="date">Tu si vyberte planovany datum aktivity</label><br>
	<input type="date" name="date" value="2000-01-01" required><br><br>
	<label for="activity">Zadajte meno aktivity</label><br>
	<input type="text" name="activity" maxlength="100" required><br><br>
	<label for="description">Zadajte popis pre aktivitu</label><br>
	<input type="text" name="description" maxlength="1000" required><br><br>
	<?php
		if (!isset($_POST['Update_tag'])){
			echo '<input type="submit" name="Add" value="pridaj aktivitu">';
		} else {
			echo '<button type="submit" name="Update" value='.$_POST['Update_tag'].'>uprav aktivitu</button>';
		}
	?>
</form>