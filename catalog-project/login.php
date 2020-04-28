<?php 
	$userName = trim($_POST['username']);
	$password = trim($_POST['password']);

	if (isset($_POST['login-submit'])){
		
		if (($userName == "H0rs3sAr3Aw3s0me21") && ($password == "3qu!neC0mpan!0ns")) {
		session_start();
		$_SESSION['dlahfoiwahp;hfhahwf779276*6'] = session_id();

		header("Location:display.php");
		} else {

			if (($userName != "") && ($password != "")) {
				$error = "Incorrect Login";
			} else {
				$error = "Please enter your username and password.";
			} // Error handling
		} //Login credentials 
	} // If button is pressed

	include("includes/site-header.php");
?>

<div style="margin: 20px 60px 60px 60px;">
	<h1>Login</h1>
	<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['
	PHP_SELF']); ?>">
		<div class="form-group">
			<label for="username">Username:</label>
	  		<input type="text" class="form-control" id="username" name="username">
		</div>
		<div class="form-group">
			<label for="username">Password:</label>
	  		<input type="password" class="form-control" id="password" name="password">
		</div>
		<?php 
			if ($error) {
				echo "<div class=\"alert alert-danger\">" . $error . "</div>";
			}
		 ?>
		<div class="form-group">
			<input type="submit" name="login-submit" class="btn btn-primary" value="Login">
		</div>
	</form>
</div>

<?php
	include("includes/site-footer.php");
?>