<?php	
	require "template/info.php";

	if (login()) {
		header('Location: index.php');
	}

	$login = "";

	if (isset($_POST['submit'])) {
		// Username is not case sensitive, but password is
		$username = strtolower(htmlspecialchars($_POST['username']));
		$password = htmlspecialchars($_POST['password']);
		
		$query = "SELECT password FROM authentication WHERE username=?";
		if (!$ps->prepare($query)) {
			die('Failed to prepare login query');
		}
		$ps->bind_param("s", $username);
		$ps->execute();
		
		$result = $ps->get_result();
		$row = $result->fetch_array(MYSQLI_NUM);
		
		// Password is hashed for extra security
		if ($password == $row[0]) {
			$_SESSION['username'] = $username;
			$ps->close();
			$mysqli->close();
			header('Location: index.php');
		} else {
			$login = "failed";
		}
	} 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>K-Dot | Login</title>
		<?php require "template/head.php"; ?>
	</head>
	<body>
		<?php require "template/navbar.php"; ?>
		<div class="container">
			<div class="row">
				<div class="page-header col-sm-12 col-md-6 col-md-offset-3">
					<h2>Login</h2>
					<h3><small>Please provide proper credentials or register</small></h3>
				</div>
				<div class="col-sm-12 col-md-6 col-md-offset-3">
					<?php if ($login == "failed") { ?>
					<p class="text-danger text-center">Incorrect Username/Password</p>
					<?php } ?>
					<form action="" method="post">
						<div class="form-group">
							<label for="username">Username: </label>
							<input class="form-control" type="text" id="username" name="username" required autofocus>
						</div>
						<div class="form-group">
							<label for="password">Password: </label>
							<input class="form-control" type="password" id="password" name="password" required>
						</div>
						<input class="btn btn-success pull-right" type="submit" name="submit" value="Login">
					</form>	
					<a class="btn btn-info pull-right" href="register.php">Register</a>
                    <a class="btn btn-danger pull-left" href="forgot.php">Forgot Password</a>
				</div>
			</div>
		</div>
		<?php require "template/footer.php"; ?>
	</body>
</html>