<?php
	require 'db.php';
	$database = new Database();
	
	//kontroluje aky prikaz sa zadal, a ci ma potrebne data
	if (isset($_POST['date']) && isset($_POST['activity']) && isset($_POST['description']) && isset($_POST['Add'])){
		$database->addActivity($_POST['date'], $_POST['activity'], $_POST['description']);
	} else if (isset($_POST['Delete'])) {
		$database->deleteActivity($_POST['Delete']);
	} else if (isset($_POST['date']) && isset($_POST['activity']) && isset($_POST['description']) && isset($_POST['Update'])) {
		$database->updateActivity($_POST['Update'], $_POST['date'], $_POST['activity'], $_POST['description']);
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
		$database->loadActivity();
		?>
	</tbody>
</table>

<!-- oznamuje co forma roby -->
<div class="centering">
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
</div>