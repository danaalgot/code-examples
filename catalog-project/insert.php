<?php
	session_start();

	if (!isset($_SESSION['dlahfoiwahp;hfhahwf779276*6'])) {
		header("Location:login.php");
	}

	include("includes/images.php");
	include("includes/site-header.php");
?>

<?php 
	if (isset($_POST['submit'])) {
		$name = trim($_POST['name']);
		$city = trim($_POST['city']);
		$province = trim($_POST['province']);
		$breed = trim($_POST['breed']);
		$color = trim($_POST['color']);
		$gender = trim($_POST['gender']);
		$discipline = trim($_POST['discipline']);
		$age = trim($_POST['age']);
		$ageOptions = trim($_POST['inlineAgeOptions']);
		$height = trim($_POST['height']);
		$cost = trim($_POST['cost']);
		$phone = trim($_POST['phone']);
		$description = trim($_POST['description']);

		$name = filter_var($name, FILTER_SANITIZE_STRING);
		$city = filter_var($city, FILTER_SANITIZE_STRING);
		$breed = filter_var($breed, FILTER_SANITIZE_STRING);
		$color = filter_var($color, FILTER_SANITIZE_STRING);
		$discipline = filter_var($discipline, FILTER_SANITIZE_STRING);
		$age = filter_var($age, FILTER_SANITIZE_STRING);
		$height = filter_var($height, FILTER_SANITIZE_STRING);
		$cost = filter_var($cost, FILTER_SANITIZE_STRING);
		$description = filter_var($description, FILTER_SANITIZE_STRING);

		$validationPassed = 1;

		/*------------CITY-----------*/
		if (strlen($city) < 2) {
			$validationPassed = 0; 
			$errorCity = "<p>City must contain 2 or more characters</p>";
		} else if (strlen($city) > 100) {
			$validationPassed = 0; 
			$errorCity = "<p>City must contain less than 100 characters</p>";
		}

		if (!isset($_POST['inlineAgeOptions'])){
			$validationPassed = 0; 
			$ageOptionError = "<p>Please choose an option.</p>";
		}

		/*------------Breed-----------*/
		if (strlen($breed) < 2) {
			$validationPassed = 0; 
			$errorBreed = "<p>Breed must contain 2 or more characters</p>";
		} else if (strlen($breed) > 100) {
			$validationPassed = 0; 
			$errorBreed = "<p>Breed must contain less than 100 characters</p>";
		}

		/*------------Color-----------*/
		if (strlen($color) < 2) {
			$validationPassed = 0; 
			$errorColor = "<p>Color must contain 2 or more characters</p>";
		} else if (strlen($color) > 100) {
			$validationPassed = 0; 
			$errorColor = "<p>Color must contain less than 100 characters</p>";
		}

		/*------------Height-----------*/
		if (strlen($height) < 1) {
			$validationPassed = 0; 
			$errorHeight = "<p>Height must contain 2 or more characters</p>";
		} else if (strlen($height) > 20) {
			$validationPassed = 0; 
			$errorHeight = "<p>Height must contain less than 20 characters</p>";
		} else if (!is_numeric($height)){
			$validationPassed = 0; 
			$errorHeight = "<p>Height must be like 16.2</p>";
		}

		// /*------------Cost-----------*/
		if (strlen($cost) < 2) {
			$validationPassed = 0; 
			$errorCost = "<p>Cost must contain 2 or more characters</p>";
		} else if (strlen($cost) > 30) {
			$validationPassed = 0; 
			$errorCost = "<p>Cost must contain less than 30 characters</p>";
		} else if (!is_numeric($cost)){
			$validationPassed = 0; 
			$errorCost = "<p>Cost must contain numbers only.</p>";
		}

		/*------------PHONE-----------*/
		if ($phone == "") {
			
		} else {
			if(!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone)) {
  				$validationPassed = 0;
  				$errorPhone = "<p>Phone Number must match the pattern of 111-222-3333</p>";
			}
		}

		/*------------Description-----------*/
		if (strlen($description) > 1000) {
			$validationPassed = 0; 
			$errorDesc = "<p>Description must contain less than 1000 characters</p>";
		} 

		/*------------IMAGES-----------*/
		//File type
		if ($_FILES['uploadimage']['type'] == "image/jpeg") {
			$fileName = uniqid() . ".jpg";
		} else if ($_FILES['uploadimage']['type'] == "image/png") {
			$fileName = uniqid() . ".png";
		} else {
			$validationPassed = 0;
			$errorImage = "File type not valid";
		}

		//file size
		if ($_FILES['uploadimage']['size'] > 4000000) {
			$validationPassed = 0;
			$errorImage = "File is too large";
		} else if ($_FILES['uploadimage']['size'] == 0){
			$validationPassed = 0;
			$errorImage = "Please choose an image for your post";
		}

		//----------------IMAGE FOLDERS--------------//
		$origionalsFolder = "image/originals/";
		$normalThumbsFolder = "image/resized/";
		$squareThumbsFolder = "image/thumbnail/";
		$displayFolder = "image/display/";

		if ($validationPassed == 1 ) {
			if (move_uploaded_file($_FILES['uploadimage']['tmp_name'], $origionalsFolder . $_FILES['uploadimage']['name'])){

				$thisFile = $origionalsFolder . $_FILES['uploadimage']['name'];

				$exif = @exif_read_data ( $thisFile ,'IFD0');
				$orientation = $exif['Orientation'];

				resizeImage($thisFile, $normalThumbsFolder, $fileName, 200, $orientation);
				resizeImage($thisFile, $displayFolder, $fileName, 500, $orientation);
				createSquareImageCopy($thisFile, $squareThumbsFolder, $fileName, 338, $orientation);

				$success = 'Ad created successfully';

				mysqli_query($con, "INSERT INTO dal_horses_for_sale (dal_name, dal_city, dal_province, dal_breed, dal_gender, dal_discipline, dal_height, dal_age, dal_ageoption, dal_color, dal_cost, dal_description, dal_phone, dal_image)
				VALUES('$name', '$city', '$province', '$breed', '$gender', '$discipline', '$height', '$age', '$ageOptions', '$color', '$cost', '$description', '$phone', '$fileName')") or die (mysqli_error($con));

				$name = "";
				$city = "";
				$province = "";
				$breed = "";
				$color = "";
				$gender = "";
				$discipline = "";
				$age = "";
				$ageOptions = "";
				$height = "";
				$cost = "";
				$phone = "";
				$description = "";

			}
		} else {
			$validationNotPassed = "Could not submit form: An error occurred";
		}
	}

	if(isset($_POST['preview'])){ 
		$name = trim($_POST['name']);
		$city = trim($_POST['city']);
		$province = trim($_POST['province']);
		$breed = trim($_POST['breed']);
		$color = trim($_POST['color']);
		$gender = $_POST['gender'];
		$discipline = trim($_POST['discipline']);
		$age = $_POST['age'];
		$ageOptions = $_POST['inlineAgeOptions'];
		$height = trim($_POST['height']);
		$cost = trim($_POST['cost']);
		$phone = trim($_POST['phone']);
		$description = trim($_POST['description']);

		$previewFolder = "image/preview/";

		$previewValidation = 1;

		//file size
		if ($_FILES['uploadimage']['size'] > 4000000) {
			$previewValidation = 0;
			$errorImage = "File is too large";
		} else if ($_FILES['uploadimage']['size'] == 0){
			$previewValidation = 0;
			$errorImage = "Please choose an image for your post";
		}

		if (!$_FILES['uploadimage']['size'] == 0 && $previewValidation == 1) {
			if (move_uploaded_file($_FILES['uploadimage']['tmp_name'], $previewFolder . $_FILES['uploadimage']['name'])){
				$fileName = $_FILES['uploadimage']['name'];
				$thisFile = $previewFolder . $fileName;
				$exif = @exif_read_data ( $thisFile ,'IFD0');
				$orientation = $exif['Orientation'];

				createSquareImageCopy($thisFile, $previewFolder, $fileName, 150, $orientation);

				$image = "<img src=\"$thisFile\">";
			}
		} else {
			$image = "No image was uploaded!<br><br>";
		}

	}

?>
<div class="row" style="margin-top: 40px;">
	<div class="col-md-6" style="margin-left: 60px; max-width: 600px;">
		<h2>Create Ad</h2>
		<form id="myform" name="myform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
			<?php 
				if ($validationNotPassed) {
					echo "<p style=\"color: #a94442;\">$validationNotPassed</p>";
				} else if ($success) {
					echo "<p style=\"color: #66824f;\">$success</p>";
				}
			 ?>
			<div class="form-group <?php if ($errorName) {echo "has-error";} ?>">
				<label class="<?php if ($errorName) {echo "control-label";} ?>" for="name">Name:</label> <span class="required" style="color: #a94442; font-size: 20px;">  *</span>
				<input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
				<?php 
					if ($errorName) {
						echo "<div class=\"alert alert-danger\">" . $errorName . "</div>";
					}
				 ?>
			</div>

			<div class="form-group">
				<label for="city">City:</label><span class="required" style="color: #a94442; font-size: 20px;">  *</span>
				<input type="text" name="city" class="form-control" value="<?php echo $city; ?>">
				<?php 
					if ($errorCity) {
						echo "<div class=\"alert alert-danger\">" . $errorCity . "</div>";
					}
				 ?>
			</div>

			<div class="form-group">
				<label for="province">Province:</label><span class="required" style="color: #a94442; font-size: 20px;">  *</span>
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
				<label for="breed">Breed:</label><span class="required" style="color: #a94442; font-size: 20px;">  *</span>
				<input type="text" name="breed" class="form-control" value="<?php echo $breed; ?>">
				<?php 
					if ($errorBreed) {
						echo "<div class=\"alert alert-danger\">" . $errorBreed . "</div>";
					}
				 ?>
			</div>

			<div class="form-group">
				<label for="discipline">Discipline:</label>
				<input type="text" name="discipline" class="form-control" value="<?php echo $discipline; ?>">
			</div>

			<div class="form-group">
				<label for="color">Color:</label><span class="required" style="color: #a94442; font-size: 20px;">  *</span>
				<input type="text" name="color" class="form-control" value="<?php echo $color; ?>">
				<?php 
					if ($errorColor) {
						echo "<div class=\"alert alert-danger\">" . $errorColor . "</div>";
					}
				 ?>
			</div>

			<div class="form-group">
				<label for="gender">Gender:</label><span class="required" style="color: #a94442; font-size: 20px;">  *</span>
				<select class="form-control" name="gender">
					<option <?php if($gender == "Gelding"){echo "selected=\"selected\"";} ?> value="Gelding">Gelding</option>
					<option <?php if($gender == "Colt"){echo "selected=\"selected\"";} ?> value="Colt">Colt</option>
					<option <?php if($gender == "Mare"){echo "selected=\"selected\"";} ?> value="Mare">Mare</option>
					<option <?php if($gender == "Filly"){echo "selected=\"selected\"";} ?> value="Filly">Filly</option>
					<option <?php if($gender == "Stallion"){echo "selected=\"selected\"";} ?> value="Stallion">Stallion</option>
				</select>
			</div>

			<div class="form-group">
				<label for="height">Height:</label><span class="required" style="color: #a94442; font-size: 20px;">  *</span>
				<input type="text" name="height" class="form-control" value="<?php echo $height; ?>">
				<?php 
					if ($errorHeight) {
						echo "<div class=\"alert alert-danger\">" . $errorHeight . "</div>";
					}
				 ?>
				 <p>Height must be measured in hands (like 16.2).</p>
			</div>

			<div class="form-group">
				<label for="age">Age:</label><span class="required" style="color: #a94442; font-size: 20px;">  *</span>
				<select class="form-control" name="age">
					<option <?php if($age == "1"){echo "selected=\"selected\"";} ?> value="1">1</option>
					<option <?php if($age == "2"){echo "selected=\"selected\"";} ?> value="2">2</option>
					<option <?php if($age == "3"){echo "selected=\"selected\"";} ?> value="3">3</option>
					<option <?php if($age == "4"){echo "selected=\"selected\"";} ?> value="4">4</option>
					<option <?php if($age == "5"){echo "selected=\"selected\"";} ?> value="5">5</option>
					<option <?php if($age == "6"){echo "selected=\"selected\"";} ?> value="6">6</option>
					<option <?php if($age == "7"){echo "selected=\"selected\"";} ?> value="7">7</option>
					<option <?php if($age == "8"){echo "selected=\"selected\"";} ?> value="8">8</option>
					<option <?php if($age == "9"){echo "selected=\"selected\"";} ?> value="9">9</option>
					<option <?php if($age == "10"){echo "selected=\"selected\"";} ?> value="10">10</option>
					<option <?php if($age == "11"){echo "selected=\"selected\"";} ?> value="11">11</option>
					<option <?php if($age == "12"){echo "selected=\"selected\"";} ?> value="12">12</option>
					<option <?php if($age == "13"){echo "selected=\"selected\"";} ?> value="13">13</option>
					<option <?php if($age == "14"){echo "selected=\"selected\"";} ?> value="14">14</option>
					<option <?php if($age == "15"){echo "selected=\"selected\"";} ?> value="15">15</option>
					<option <?php if($age == "16"){echo "selected=\"selected\"";} ?> value="16">16</option>
					<option <?php if($age == "17"){echo "selected=\"selected\"";} ?> value="17">17</option>
					<option <?php if($age == "18"){echo "selected=\"selected\"";} ?> value="18">18</option>
					<option <?php if($age == "19"){echo "selected=\"selected\"";} ?> value="19">19</option>
					<option <?php if($age == "20"){echo "selected=\"selected\"";} ?> value="20">20</option>
					<option <?php if($age == "21"){echo "selected=\"selected\"";} ?> value="21">21</option>
					<option <?php if($age == "22"){echo "selected=\"selected\"";} ?> value="22">22</option>
					<option <?php if($age == "23"){echo "selected=\"selected\"";} ?> value="23">23</option>
					<option <?php if($age == "24"){echo "selected=\"selected\"";} ?> value="24">24</option>
					<option <?php if($age == "25"){echo "selected=\"selected\"";} ?> value="25">25</option>
					<option <?php if($age == "26"){echo "selected=\"selected\"";} ?> value="26">26</option>
					<option <?php if($age == "27"){echo "selected=\"selected\"";} ?> value="27">27</option>
					<option <?php if($age == "28"){echo "selected=\"selected\"";} ?> value="28">28</option>
					<option <?php if($age == "29"){echo "selected=\"selected\"";} ?> value="29">29</option>
					<option <?php if($age == "30"){echo "selected=\"selected\"";} ?> value="30">30</option>
					<option <?php if($age == "31"){echo "selected=\"selected\"";} ?> value="31">31</option>
					<option <?php if($age == "32"){echo "selected=\"selected\"";} ?> value="32">32</option>
					<option <?php if($age == "33"){echo "selected=\"selected\"";} ?> value="33">33</option>
					<option <?php if($age == "34"){echo "selected=\"selected\"";} ?> value="34">34</option>
					<option <?php if($age == "35"){echo "selected=\"selected\"";} ?> value="35">35</option>
					<option <?php if($age == "36"){echo "selected=\"selected\"";} ?> value="36">36</option>
					<option <?php if($age == "37"){echo "selected=\"selected\"";} ?> value="37">37</option>
					<option <?php if($age == "38"){echo "selected=\"selected\"";} ?> value="38">38</option>
					<option <?php if($age == "39"){echo "selected=\"selected\"";} ?> value="39">39</option>
					<option <?php if($age == "40"){echo "selected=\"selected\"";} ?> value="40">40</option>
				</select>
				<div class="form-check form-check-inline">
				  	<input <?php if($adAgeOptions == "1"){echo "checked";} ?> class="form-check-input" type="radio" name="inlineAgeOptions" id="Age1" value="1">
				  	<label class="form-check-label" for="Age1">Years</label>
				</div>
				<div class="form-check form-check-inline">
				 	<input <?php if($adAgeOptions == "2"){echo "checked";} ?> class="form-check-input" type="radio" name="inlineAgeOptions" id="Age2" value="2">
				  	<label class="form-check-label" for="Age2">Months</label>
				</div>
				<?php 
					if ($ageOptionError) {
						echo "<div class=\"alert alert-danger\">" . $ageOptionError . "</div>";
					}

				 ?>
			</div>

			<div class="form-group">
			    <label for="cost">Price:</label><span class="required" style="color: #a94442; font-size: 20px;">  *</span>
			    <input type="number" class="form-control" name="cost" id="cost" value="<?php echo $cost; ?>" placeholder="Amount">
			    <?php 
					if ($errorCost) {
						echo "<div class=\"alert alert-danger\">" . $errorCost . "</div>";
					}
				 ?>
			 </div>

			<div class="form-group">
				<label for="phone">Phone Number:</label>
				<input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>">
				<?php 
					if ($errorPhone) {
						echo "<div class=\"alert alert-danger\">" . $errorPhone . "</div>";
					}
				 ?>
			</div>

			<div class="form-group">
				<label for="description">Description:</label>
				<textarea name="description" class="form-control"><?php echo $description; ?></textarea>
				<?php 
					if ($errorDesc) {
						echo "<div class=\"alert alert-danger\">" . $errorDesc . "</div>";
					}
				 ?>
			</div>

			<div class="form-group">
				<label for="uploadimage">Image:</label><span class="required" style="color: #a94442; font-size: 20px;">  *</span><br>
				<input type="file" name="uploadimage">
				<?php 
					if ($errorImage) {
						echo "<div class=\"alert alert-danger\">" . $errorImage . "</div>";
					}
				 ?>
			</div>
			<div style="display: flex;">
				<div class="form-group" style="margin-right: 15px;">
					<label for="preview"></label>
					<input type="submit" name="preview" class="btn btn-info" value="Preview">
				</div>
				<div class="form-group">
					<label for="submit"></label>
					<input type="submit" name="submit" class="btn btn-primary" value="Submit">
				</div>
			</div>
		</form>
	</div>
	<div class="col-md-5 output" style="border: 1px solid lightgrey; border-radius: 5px; height: 1200px;">
		<h2 style="margin-top: 20px;">Preview</h2>
		<?php 
			if(isset($_POST['preview'])){
				echo "$image";
				echo "<p>Name: $name</p>";
				echo "<p>Location: $city, $province</p>";
				echo "<p>Breed: $breed</p>";
				echo "<p>Discipline: $discipline</p>";
				echo "<p>Color: $color</p>";
				echo "<p>Gender: $gender</p>";
				echo "<p>Age: $age $ageOptions old</p>";
				echo "<p>Height: $height hh</p>";
				echo "<p>Cost: $cost</p>";
				echo "<p>Phone: $phone</p>";
				echo "<p>Description: $description</p>";
			}
		 ?>
	</div>
</div>

<?php
	include("includes/site-footer.php");
?>