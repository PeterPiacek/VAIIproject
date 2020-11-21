<?php
	require 'db.php';
	
	function addActivity($con){
		$date = $_POST['date'];
		$activity = $_POST['activity'];
		$description = $_POST['description'];
		mysqli_query($con, "INSERT INTO plan_aktivit (date, activity, description) VALUES ('$date', '$activity', '$description');");
	}
	#"INSERT INTO plan_aktivit (date, activity, description) VALUES ('$_POST['date']', '$_POST['activity']', '$_POST['description']');"
	if (isset($_POST['date']) && isset($_POST['activity']) && isset($_POST['description'])){
		addActivity($con);
	}
?>

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
		}
		?>
	</tbody>
</table>
<h3>pridanie aktivity</h3>
<form method="POST">
	<label for="date">Tu si vyberte planovany datum aktivity</label><br>
	<input type="date" name="date" value="2000-01-01"><br><br>
	<label for="activity">Zadajte meno aktivity</label><br>
	<input type="text" name="activity" value="aktivita" maxlength="100"><br><br>
	<label for="description">Zadajte popis pre aktivitu</label><br>
	<input type="text" name="description" value="popis" maxlength="1000"><br><br>
	<input type="submit" name="Add" value="pridaj aktivitu">
</form>