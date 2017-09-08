<?php
	require "template/info.php";

	if (login()) {
		header('Loction: index.php');
	}
	
	$register = "";

	if (isset($_POST['submit'])) {
		/* 	
			Not doing anything with email right now. 
			Plan on placing it and any other relevant
			info into a seperate table 					
		*/
		$email = htmlspecialchars($_POST['email']);
		$username = strtolower(htmlspecialchars($_POST['username']));
		$password = htmlspecialchars($_POST['password']);
		$password_verify = htmlspecialchars($_POST['password_verify']);
		
		if ($password != $password_verify) {
			$register = "pass_fail";
		} else {
			$query = "INSERT INTO authentication VALUES(?,?,?)";
			if (!$ps->prepare($query)) {
				die('Unable to prepare insertion query');
			}
			$ps->bind_param("sss", $username, $password, $email);
			if($ps->execute()) {
				// New user created, log in and redirect
				$_SESSION['username'] = $username;
				$ps->close();
				$mysqli->close();
				header('Location: index.php');
			} else {
				$register = "name_fail";
			}
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>K-Dot | Register</title>
		<?php require "template/head.php"; ?>
	</head>
	<body>
		<?php require "template/navbar.php"; ?>
		<div class="container">
			<div class="row">
				<div class="page-header col-sm-12 col-md-6 col-md-offset-3">
					<h2>Register</h2>
					<h3><small>Create an account to get the full K-Dot experience.</small></h3>
				</div>
				<div class="col-sm-12 col-md-6 col-md-offset-3">
					<?php if ($register == "name_fail") { ?>
					<p class="text-danger text-center">Username already exists</p>
					<?php } elseif ($register == "pass_fail") { ?>
					<p class="text-danger text-center">Passwords do not match</p>
					<?php } ?>
					<form action="" method="post">
						<div class="form-group">
							<label for="email">Email: </label>
							<input class="form-control" type="email" id="email" name="email" maxlength="100" required autofocus> 
						</div>
						<div class="form-group">
							<label for="username">Username: </label>
							<input class="form-control" type="text" id="username" name="username" maxlength="25" required>
						</div>
						<div class="form-group">
							<label for="password">Password: </label>
							<input class="form-control" type="password" id="password" name="password" maxlength="25" required>
						</div>
						<div class="form-group">
							<label for="password_verify">Verify Password: </label>
							<input class="form-control" type="password" id="password_verify" name="password_verify" maxlength="25" required>
						</div>
						<input class="btn btn-success pull-right" type="submit" name="submit" value="Register">
					</form>	
				</div>
			</div>
		</div>
		<?php require "template/footer.php"; ?>
	</body>
</html>