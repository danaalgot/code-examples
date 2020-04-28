<?php 
	include("includes/mysql_connect.php");

	$horseID = htmlspecialchars($_GET["horseID"]);

	if (!is_numeric($horseID)) {
		exit();
	}

	mysqli_query($con, "DELETE FROM dal_horses_for_sale WHERE horseid = '$horseID'") or die (mysqli_error($con));

	header("Location:update.php");

 ?>