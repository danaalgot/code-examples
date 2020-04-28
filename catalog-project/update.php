<?php
	session_start();

	if (!isset($_SESSION['dlahfoiwahp;hfhahwf779276*6'])) {
		header("Location:login.php");
	}

	include("includes/site-header.php");
?>
<?php 
	$horseID = $_GET['horseID'];

	if (!isset($horseID)) {
			$default = mysqli_query($con, "SELECT horseid FROM dal_horses_for_sale LIMIT 1") or die 
			(mysqli_error($con));
		while ($row = mysqli_fetch_array($default)){
			$horseID = $row['horseid'];
		} 
	}

	if (isset($_POST['submit'])) {
		$formName = trim($_POST['name']);
		$formCity = trim($_POST['city']);
		$formProvince = trim($_POST['province']);
		$formBreed = trim($_POST['breed']);
		$formColor = trim($_POST['color']);
		$formGender = trim($_POST['gender']);
		$formDiscipline = trim($_POST['discipline']);
		$formAge = trim($_POST['age']);
		$formAgeOptions = trim($_POST['inlineAgeOptions']);
		$formHeight = trim($_POST['height']);
		$formCost = trim($_POST['cost']);
		$formPhone = trim($_POST['phone']);
		$formDescription = trim($_POST['description']);

		$formName = filter_var($formName, FILTER_SANITIZE_STRING);
		$formDiscipline = filter_var($formDiscipline, FILTER_SANITIZE_STRING);
		$formCity = filter_var($formCity, FILTER_SANITIZE_STRING);
		$formBreed = filter_var($formBreed, FILTER_SANITIZE_STRING);
		$formColor = filter_var($formColor, FILTER_SANITIZE_STRING);
		$formAge = filter_var($formAge, FILTER_SANITIZE_STRING);
		$formHeight = filter_var($formHeight, FILTER_SANITIZE_STRING);
		$formCost = filter_var($formCost, FILTER_SANITIZE_STRING);
		$formPhone = filter_var($formPhone, FILTER_SANITIZE_STRING);
		$formDescription = filter_var($formDescription, FILTER_SANITIZE_STRING);

		$validation = 1;

		/*------------CITY-----------*/
		if (strlen($formCity) < 2) {
			$validation = 0; 
			$errorCity = "<p>City must contain 2 or more characters</p>";
		} else if (strlen($formCity) > 100) {
			$validation = 0; 
			$errorCity = "<p>City must contain less than 100 characters</p>";
		}

		/*------------Breed-----------*/
		if (strlen($formBreed) < 2) {
			$validation = 0; 
			$errorBreed = "<p>Breed must contain 2 or more characters</p>";
		} else if (strlen($formBreed) > 100) {
			$validation = 0; 
			$errorBreed = "<p>Breed must contain less than 100 characters</p>";
		}

		/*------------Color-----------*/
		if (strlen($formColor) < 2) {
			$validation = 0; 
			$errorColor = "<p>Color must contain 2 or more characters</p>";
		} else if (strlen($formColor) > 100) {
			$validation = 0; 
			$errorColor = "<p>Color must contain less than 100 characters</p>";
		}

		/*------------Height-----------*/
		if (strlen($formHeight) < 1) {
			$validation = 0; 
			$errorHeight = "<p>Height must contain 2 or more characters</p>";
		} else if (strlen($formHeight) > 20) {
			$validation = 0; 
			$errorHeight = "<p>Height must contain less than 20 characters</p>";
		} else if (!is_numeric($formHeight)){
			$validation = 0; 
			$errorHeight = "<p>Height must be like 16.2</p>";
		}

		/*------------Cost-----------*/
		if (strlen($formCost) < 2) {
			$validation = 0; 
			$errorCost = "<p>Cost must contain 2 or more characters</p>";
		} else if (strlen($formCost) > 30) {
			$validation = 0; 
			$errorCost = "<p>Cost must contain less than 30 characters</p>";
		} else if (!is_numeric($formCost)){
			$validation = 0; 
			$errorCost = "<p>Cost must contain numbers only.</p>";
		}

		/*------------PHONE-----------*/
		if ($formphone == "") {
			
		} else {
			if(!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $formPhone)) {
  				$validation = 0;
  				$errorPhone = "<p>Phone Number must match the pattern of 111-222-3333</p>";
			}
		}

		/*------------Description-----------*/
		if (strlen($formDescription) < 20) {
			$validation = 0; 
			$errorDesc = "<p>Description must contain 20 or more characters</p>";
		} else if (strlen($formDescription) > 1000) {
			$validation = 0; 
			$errorDesc = "<p>Description must contain less than 1000 characters</p>";
		}

		if ($validation == 1) {
			$successMessage = 'Your post was updated successfully';
			mysqli_query($con, "UPDATE dal_horses_for_sale 
			SET dal_name = '$formName',
				dal_city = '$formCity',
				dal_province = '$formProvince',
				dal_breed = '$formBreed',
				dal_gender = '$formGender',
				dal_discipline = '$formDiscipline', 
				dal_height = '$formHeight',
				dal_age = '$formAge',
				dal_ageoption = '$formAgeOptions',
				dal_color = '$formColor',
				dal_cost = '$formCost',
				dal_description = '$formDescription',
				dal_phone = '$formPhone'
				WHERE horseid = '$horseID'") or die (mysqli_error($con));
		} else {
			$failMessage = 'Could not update post: An error occurred';
		}
	}

	$result = mysqli_query($con, "SELECT * FROM dal_horses_for_sale WHERE horseid = '$horseID'") or die(mysqli_error($con));
	while ($row = mysqli_fetch_array($result)) {
		$adName = $row['dal_name'];
		$adCity = $row['dal_city'];
		$adProvince = $row['dal_province'];
		$adBreed = $row['dal_breed'];
		$adGender = $row['dal_gender'];
		$adDiscipline = $row['dal_discipline'];
		$adHeight = $row['dal_height'];
		$adAge = $row['dal_age'];
		$adAgeOptions = $row['dal_ageoption'];
		$adColor = $row['dal_color'];
		$adCost = $row['dal_cost'];
		$adDesc = $row['dal_description'];
		$adPhone = $row['dal_phone'];
	}
 ?>
 <div style="margin-top: 40px; margin-left: 60px; margin-bottom: 40px;">
 	<h2>Update Ad</h2>
	<form name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
		 <?php 
			if ($failMessage != ''){
				echo "<p style=\"color: #a94442;\">$failMessage</p>";
			}

			if ($successMessage != ''){
				echo "<p style=\"color: #66824f;\">$successMessage</p>";
			}
		 ?> 
	    <div style="display: flex; border-bottom: 2px solid black; padding-bottom: -20px; margin-bottom: 20px; width: 93.5%;">
	    	<div class="form-group" style="width: 400px;">
	    		<label for="selectad">Select Ad</label>
	    		<select class="form-control" id="selectad" name="selectad" onchange="window.open(this.value,'_self');">
		    	<?php 
			    	$result = mysqli_query($con, "SELECT * FROM dal_horses_for_sale") or die(mysqli_error($con));
					while ($row = mysqli_fetch_array($result)){
						$name = $row['dal_name'];
						$age = $row['dal_age'];
						$ageOption = $row['dal_ageoption'];

						if ($ageOption == 1) {
							$ageOptionValue = 'year old';
						} else if ($ageOption == 2){
							$ageOptionValue = 'month old';
						}

						$breed = $row['dal_breed'];
						$adHorseId = $row['horseid'];

						$adTitle = $name .', '. $age . ' ' . $ageOptionValue . ' ' . $breed;

						if ($adHorseId == $horseID){
							echo "\n\t<option value=\"update.php?horseID=$adHorseId\" selected>$adTitle</option>";
						} else {
							echo "\n\t<option value=\"update.php?horseID=$adHorseId\">$adTitle</option>";
						}
					}
		    	 ?>
		    	 </select><br>
	    	</div>
	    	<div style="padding-top: 32px; padding-left: 40px; width: 200px;">
	    		<p class="deletechar" onclick="return confirm('Are you sure you want to delete this post?')"><a href="delete.php?horseID=<?php echo $horseID; ?>" class="btn btn-primary"">Delete Post</a></p>
	    	</div>
		</div>
		<div style="display: flex;">
			<div style="width: 400px; margin-right: 40px;">
				<div class="form-group">
					<label for="name">Name:</label>
					<input type="text" name="name" class="form-control" value="<?php if(isset($formName)){ echo $formName; } else { echo $adName; } ?>">
					<?php 
						if ($errorName) {
							echo "<div class=\"alert alert-danger\">" . $errorName . "</div>";
						}
					 ?>
				</div>

				<div class="form-group">
					<label for="city">City:</label>
					<input type="text" name="city" class="form-control" value="<?php if(isset($formCity)){ echo $formCity; } else { echo $adCity; } ?>">
					<?php 
						if ($errorCity) {
							echo "<div class=\"alert alert-danger\">" . $errorCity . "</div>";
						}
					 ?>
				</div>
				<div class="form-group">
					<label for="province">Province:</label>
					<select class="form-control" name="province">
						<option <?php if($adProvince == "Alberta"){echo "selected=\"selected\"";} ?> value="Alberta">Alberta</option>
						<option <?php if($adProvince == "British Columbia"){echo "selected=\"selected\"";} ?> value="British Columbia">British Columbia</option>
						<option <?php if($adProvince == "Manitoba"){echo "selected=\"selected\"";} ?> value="Manitoba">Manitoba</option>
						<option <?php if($adProvince == "New Brunswick"){echo "selected=\"selected\"";} ?> value="New Brunswick">New Brunswick</option>
						<option <?php if($adProvince == "Newfoundland and Labrador"){echo "selected=\"selected\"";} ?> value="Newfoundland and Labrador">Newfoundland and Labrador</option>
						<option <?php if($adProvince == "Nova Scotia"){echo "selected=\"selected\"";} ?> value="Nova Scotia">Nova Scotia</option>
						<option <?php if($adProvince == "Ontario"){echo "selected=\"selected\"";} ?> value="Ontario">Ontario</option>
						<option <?php if($adProvince == "Prince Edward Island"){echo "selected=\"selected\"";} ?> value="Prince Edward Island">Prince Edward Island</option>
						<option <?php if($adProvince == "Quebec"){echo "selected=\"selected\"";} ?> value="Quebec">Quebec</option>
						<option <?php if($adProvince == "Saskatchewan"){echo "selected=\"selected\"";} ?> value="Saskatchewan">Saskatchewan</option>
						<option <?php if($adProvince == "Northwest Territories"){echo "selected=\"selected\"";} ?> value="Northwest Territories">Northwest Territories</option>
						<option <?php if($adProvince == "Nunavut"){echo "selected=\"selected\"";} ?> value="Nunavut">Nunavut</option>
						<option <?php if($adProvince == "Yukon"){echo "selected=\"selected\"";} ?> value="Yukon">Yukon</option>
					</select>
				</div>

				<div class="form-group">
					<label for="breed">Breed:</label>
					<input type="text" name="breed" class="form-control" value="<?php if(isset($formBreed)){ echo $formBreed; } else { echo $adBreed; } ?>">
					<?php 
						if ($errorBreed) {
							echo "<div class=\"alert alert-danger\">" . $errorBreed . "</div>";
						}
					 ?>
				</div>

				<div class="form-group">
					<label for="discipline">Discipline:</label>
					<input type="text" name="discipline" class="form-control" value="<?php if(isset($formDiscipline)){ echo $formDiscipline; } else { echo $adDiscipline; } ?>">
				</div>

				<div class="form-group">
					<label for="color">Color:</label>
					<input type="text" name="color" class="form-control" value="<?php if(isset($formColor)){ echo $formColor; } else { echo $adColor; } ?>">
					<?php 
						if ($errorColor) {
							echo "<div class=\"alert alert-danger\">" . $errorColor . "</div>";
						}
					 ?>
				</div>
				<div class="form-group">
					<label for="gender">Gender:</label>
					<select class="form-control" name="gender">
						<option <?php if($adGender == "Gelding"){echo "selected=\"selected\"";} ?> value="Gelding">Gelding</option>
						<option <?php if($adGender == "Colt"){echo "selected=\"selected\"";} ?> value="Colt">Colt</option>
						<option <?php if($adGender == "Mare"){echo "selected=\"selected\"";} ?> value="Mare">Mare</option>
						<option <?php if($adGender == "Filly"){echo "selected=\"selected\"";} ?> value="Filly">Filly</option>
						<option <?php if($adGender == "Stallion"){echo "selected=\"selected\"";} ?> value="Stallion">Stallion</option>
					</select>
				</div>

				<div class="form-group">
					<label for="height">Height:</label>
					<input type="text" name="height" class="form-control" value="<?php if(isset($formHeight)){ echo $formHeight; } else { echo $adHeight; } ?>">
					<?php 
						if ($errorHeight) {
							echo "<div class=\"alert alert-danger\">" . $errorHeight . "</div>";
						}
					 ?>
				</div>
			</div>
			<!-- Right Side -->
			<div style="width: 400px;">
				<div class="form-group">
					<label for="age">Age:</label><span class="required" style="color: #a94442; font-size: 20px;">  *</span>
					<select class="form-control" name="age">
						<option <?php if($adAge == "1"){echo "selected=\"selected\"";} ?> value="1">1</option>
						<option <?php if($adAge == "2"){echo "selected=\"selected\"";} ?> value="2">2</option>
						<option <?php if($adAge == "3"){echo "selected=\"selected\"";} ?> value="3">3</option>
						<option <?php if($adAge == "4"){echo "selected=\"selected\"";} ?> value="4">4</option>
						<option <?php if($adAge == "5"){echo "selected=\"selected\"";} ?> value="5">5</option>
						<option <?php if($adAge == "6"){echo "selected=\"selected\"";} ?> value="6">6</option>
						<option <?php if($adAge == "7"){echo "selected=\"selected\"";} ?> value="7">7</option>
						<option <?php if($adAge == "8"){echo "selected=\"selected\"";} ?> value="8">8</option>
						<option <?php if($adAge == "9"){echo "selected=\"selected\"";} ?> value="9">9</option>
						<option <?php if($adAge == "10"){echo "selected=\"selected\"";} ?> value="10">10</option>
						<option <?php if($adAge == "11"){echo "selected=\"selected\"";} ?> value="11">11</option>
						<option <?php if($adAge == "12"){echo "selected=\"selected\"";} ?> value="12">12</option>
						<option <?php if($adAge == "13"){echo "selected=\"selected\"";} ?> value="13">13</option>
						<option <?php if($adAge == "14"){echo "selected=\"selected\"";} ?> value="14">14</option>
						<option <?php if($adAge == "15"){echo "selected=\"selected\"";} ?> value="15">15</option>
						<option <?php if($adAge == "16"){echo "selected=\"selected\"";} ?> value="16">16</option>
						<option <?php if($adAge == "17"){echo "selected=\"selected\"";} ?> value="17">17</option>
						<option <?php if($adAge == "18"){echo "selected=\"selected\"";} ?> value="18">18</option>
						<option <?php if($adAge == "19"){echo "selected=\"selected\"";} ?> value="19">19</option>
						<option <?php if($adAge == "20"){echo "selected=\"selected\"";} ?> value="20">20</option>
						<option <?php if($adAge == "21"){echo "selected=\"selected\"";} ?> value="21">21</option>
						<option <?php if($adAge == "22"){echo "selected=\"selected\"";} ?> value="22">22</option>
						<option <?php if($adAge == "23"){echo "selected=\"selected\"";} ?> value="23">23</option>
						<option <?php if($adAge == "24"){echo "selected=\"selected\"";} ?> value="24">24</option>
						<option <?php if($adAge == "25"){echo "selected=\"selected\"";} ?> value="25">25</option>
						<option <?php if($adAge == "26"){echo "selected=\"selected\"";} ?> value="26">26</option>
						<option <?php if($adAge == "27"){echo "selected=\"selected\"";} ?> value="27">27</option>
						<option <?php if($adAge == "28"){echo "selected=\"selected\"";} ?> value="28">28</option>
						<option <?php if($adAge == "29"){echo "selected=\"selected\"";} ?> value="29">29</option>
						<option <?php if($adAge == "30"){echo "selected=\"selected\"";} ?> value="30">30</option>
						<option <?php if($adAge == "31"){echo "selected=\"selected\"";} ?> value="31">31</option>
						<option <?php if($adAge == "32"){echo "selected=\"selected\"";} ?> value="32">32</option>
						<option <?php if($adAge == "33"){echo "selected=\"selected\"";} ?> value="33">33</option>
						<option <?php if($adAge == "34"){echo "selected=\"selected\"";} ?> value="34">34</option>
						<option <?php if($adAge == "35"){echo "selected=\"selected\"";} ?> value="35">35</option>
						<option <?php if($adAge == "36"){echo "selected=\"selected\"";} ?> value="36">36</option>
						<option <?php if($adAge == "37"){echo "selected=\"selected\"";} ?> value="37">37</option>
						<option <?php if($adAge == "38"){echo "selected=\"selected\"";} ?> value="38">38</option>
						<option <?php if($adAge == "39"){echo "selected=\"selected\"";} ?> value="39">39</option>
						<option <?php if($adAge == "40"){echo "selected=\"selected\"";} ?> value="40">40</option>
					</select>
					<div class="form-check form-check-inline">
					  	<input <?php if($adAgeOptions == "1"){echo "checked";} ?> class="form-check-input" type="radio" name="inlineAgeOptions" id="Age1" value="1">
					  	<label class="form-check-label" for="Age1">Years</label>
					</div>
					<div class="form-check form-check-inline">
					 	<input <?php if($adAgeOptions == "2"){echo "checked";} ?> class="form-check-input" type="radio" name="inlineAgeOptions" id="Age2" value="2">
					  	<label class="form-check-label" for="Age2">Months</label>
					</div>
				</div>

				<div class="form-group">
					<label for="cost">Cost:</label>
					<input type="text" name="cost" class="form-control" value="<?php if(isset($formCost)){ echo $formCost; } else { echo $adCost; } ?>">
					<?php 
						if ($errorCost) {
							echo "<div class=\"alert alert-danger\">" . $errorCost . "</div>";
						}
					 ?>
				</div>

				<div class="form-group">
					<label for="phone">Phone Number:</label>
					<input type="text" name="phone" class="form-control" value="<?php if(isset($formPhone)){ echo $formPhone; } else { echo $adPhone; } ?>">
					<?php 
						if ($errorPhone) {
							echo "<div class=\"alert alert-danger\">" . $errorPhone . "</div>";
						}
					 ?>
				</div>

				<div class="form-group">
					<label for="description">Description:</label>
					<textarea name="description" class="form-control"><?php if(isset($formDescription)){ echo $formDescription; } else { echo $adDesc; } ?></textarea>
					<?php 
						if ($errorDesc) {
							echo "<div class=\"alert alert-danger\">" . $errorDesc . "</div>";
						}
					 ?>
				</div>

				<div class="form-group">
					<label for="submit"></label>
					<input type="submit" name="submit" class="btn btn-info" value="Submit" style="width: 200px;"><br>
				</div>
			</div>
		</div>
	</form>
 </div>


<?php
	include("includes/site-footer.php");
?>