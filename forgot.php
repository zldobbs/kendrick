<?php	
	require "template/info.php";

	if (login()) {
		header('Location: index.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>K-Dot | Forgot Password</title>
		<?php require "template/head.php"; ?>
	</head>
	<body>
		<?php require "template/navbar.php"; ?>
		<div class="container">
			<div class="row">
				<div class="page-header col-sm-12 col-md-6 col-md-offset-3">
					<h2>Forgot Password</h2>
					<h3><small>Enter your email to receive your password</small></h3>
				</div>
            </div>
            <div class="row text-center">
                <div class="col-sm-12 col-md-6 col-md-offset-3" id="ajaxBox">
                </div>
            </div>
            <div class="row">
				<div class="col-sm-12 col-md-6 col-md-offset-3">
                    <div class="form-group">
                        <label for="username">Email: </label>
                        <input class="form-control" type="email" id="email" name="username" required autofocus>
                    </div>
                    <input class="btn btn-info pull-right" id="submitRequest" type="submit" value="Submit">
				</div>
			</div>
		</div>
		<?php require "template/footer.php"; ?>
        <script>
            // Use AJAX to handle checking and sending email
            $("#submitRequest").click(function() {
                var email = $("#email").val();
                
                options = {
					"email" : email
				};
                
				$("#ajaxBox").html('<img src="assets/img/loading.gif" alt="Loading...">');
                $.get("forgot_pass.php", options, function(data) {
					$("#ajaxBox").html(data);
				});
            });
        
        </script>
	</body>
</html>