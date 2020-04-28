<?php
  include("includes/site-header.php");
?>

<div style="display: flex; margin-right: 200px;">
<?php 
	$horseID = $_GET['horseID'];

	$sql = "SELECT * FROM dal_horses_for_sale WHERE horseid = $horseID";

	$result = mysqli_query($con, $sql) or die (mysql_error($con));

	while ($row = mysqli_fetch_array($result)) {
		$name = $row['dal_name'];
		$city = $row['dal_city'];
		$province = $row['dal_province'];
		$breed = $row['dal_breed'];
		$gender = $row['dal_gender'];
		$height = $row['dal_height'];
		$discipline = $row['dal_discipline'];
		$age = $row['dal_age'];
		$ageOption = $row['dal_ageoption'];
		$color = $row['dal_color'];
		$cost = $row['dal_cost'];
		$desc = $row['dal_description'];
		$phone = $row['dal_phone'];
		$horseID = $row['horseid'];
		$image = $row['dal_image'];

		if ($ageOption == 1) {
			$ageOptionValue = 'year old';
		} else if ($ageOption == 2){
			$ageOptionValue = 'month old';
		}
		echo "<div style=\"margin-left: 70px;margin-right: 40px;margin-top: 20px;margin-bottom: 30px;\">";
			echo "<h2 style='margin-bottom: 20px;'>$name</h2>";
			echo "<img src=\"image/display/$image\" style=\"border: 4px solid rgb(109, 134, 160); border-radius: 6px;\">";
		echo "</div>";
		echo "<div style=\"margin-top: 80px;\">";
			echo "<p style=\"margin: 0; padding: 0; padding: 10px 0; border-bottom: 1px solid lightgrey;\">Location: $city, $province</p>"; 
			echo "<p style=\"margin: 0; padding: 0; padding: 10px 0; border-bottom: 1px solid lightgrey;\">Breed: $breed</p>";
			echo "<p style=\"margin: 0; padding: 0; padding: 10px 0; border-bottom: 1px solid lightgrey;\">Gender: $gender</p>";
			echo "<p style=\"margin: 0; padding: 0; padding: 10px 0; border-bottom: 1px solid lightgrey;\">Discipline: $discipline</p>";
			echo "<p style=\"margin: 0; padding: 0; padding: 10px 0; border-bottom: 1px solid lightgrey;\">Height: $height</p>";
			echo "<p style=\"margin: 0; padding: 0; padding: 10px 0; border-bottom: 1px solid lightgrey;\">Age: $age $ageOptionValue</p>";
			echo "<p style=\"margin: 0; padding: 0; padding: 10px 0; border-bottom: 1px solid lightgrey;\">Color: $color</p>";
			echo "<p style=\"margin: 0; padding: 0; padding: 10px 0; border-bottom: 1px solid lightgrey;\">Cost: " . "$" ."$cost</p>";
			if ($phone !== "") {
				echo "<p style=\"margin: 0; padding: 0; padding: 10px 0; border-bottom: 1px solid lightgrey;\">Contact: $phone</p>";
			}
			echo "<p style=\"width: 30rem; padding: 10px 0;\">$desc</p>";
		echo "</div>";
	}

?>
</div>

<?php
  include("includes/site-footer.php");
?>