<?php
require './config.php';

if (isset($_POST['submit'])) {

	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password' LIMIT 1";
	$result = $conn->query($sql);

	if ($result->num_rows == 1) {
		// echo '<script>alert("Admin Login Successful")</script>';
		header("location: add-products.php");
	} else {
		echo '<script>alert("Username and Password Doesn\'t Match")</script>';
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Sign In</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./css/styles.css">

	<script>
		function validateForm() {
			var username = document.forms["signin"]["username"].value;
			var password = document.forms["signin"]["password"].value;

			if (username == "") {
				alert("Username is required! ");
				return false;
			}

			if (password == "") {
				alert("Password is required! ");
			}
		}
	</script>

</head>

<body class="login" style="background-image: url(./images/generic\ books\ pixabay_0.jpg);">
	<header>
		<div class="logl" style="background-color: aliceblue; width: 304px; border-radius: 12px; opacity: 0.5; color: black;">
			<h1><a href="./index.php" class="nav-link">Damayanthi Book Shop</a></h1>
		</div>
	</header>
	<center>
		<div class="loginf">
			<img class="acc-img" src="./images/account-269-866236.png">
			<h3>Admin Login</h3>
			<form name="signin" onsubmit="return validateForm()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
				<div class="form-group">
					<input class="loginpt" name="username" type="text" placeholder="Username">
				</div>
				<div class="form-group">
					<input class="loginpt" name="password" type="password" placeholder="Password">
				</div>
				<!-- <div class="form-group">
					<label>Remember Me &nbsp;
						<input type="checkbox" unchecked>
						<span class="checkmark"></span>
					</label>
				</div> -->
				<div class="form-group">
					<button class="bttn" name="submit" type="submit">Log In</button>
				</div>
			</form>
		</div>
	</center>

</body>

</html>