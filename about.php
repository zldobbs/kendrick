<?php
	require "template/info.php";
    $received = false;

    if (isset($_POST['submit'])) {
        // add feedback to server
        $username = $_SESSION['username'];
        $feedback = htmlspecialchars($_POST['feedback']);
        
        $query = "INSERT INTO feedback VALUES(?,?,NOW())";
        if (!$ps->prepare($query)) {
			die('Failed to prepare feedback');
		}
		
		$ps->bind_param("ss", $username, $feedback);
		if (!$ps->execute()) {
			die('Failed to add feedback to server');
		} else {
            $received = true;
			$ps->close();
		}
    }
?>
<!DOCTYPE html>
<html>
	<head>
		<title>K-Dot | About</title>
		<?php require "template/head.php"; ?>
	</head>
	<body>
		<?php require "template/navbar.php"; ?>
		<div class="container">
			<div class="row">
				<h1 class="jumbotron">About</h1>
				<p>This website is a final project submission for the course CMP_SC 2830 at the University of Missouri. My name is Zachary Dobbs and I am the developer of this website. My pawprint at Mizzou is zld6fd and you may contact me at <a href="mailto:zld6fd@mail.missouri.edu">zld6fd@mail.missouri.edu.</a> Alternatively, you may login or create an account and submit a message using the form below.</p>
                <p>The purpose of this website is to draw attention to one of my favorite rappers, Kendrick Lamar. I find a lot of inspiration in his music and I decided it would be fun to make a website devoted to his work. A majority of the content on this site is purely my own opinion. That being said, a majority of the factual information that is presented comes from <a href="https://en.wikipedia.org/wiki/Kendrick_Lamar">WikiPedia.</a></p>
			</div>
            <div class="row">
                <!-- Form for logged in users to provide feedback on the site -->
                <?php if(login()) { ?>
                <!-- User is logged in -->
                <h3>Your comments are valued</h3>
                <p>Submit any questions, comments, or concerns on the site using the form below. Any and all feedback is greatly appreciated!</p>
                <?php if($received) { ?>
                <p class="text-success text-center">Message received, thank you for your feedback!</p>
                <?php } ?>
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="feedback">Feedback</label>
                        <textarea class="form-control" rows="3" id="feedback" name="feedback" required></textarea>
                    </div>
                    <input class="btn btn-info pull-right" type="submit" name="submit" value="Submit">
                </form>
                <?php } else { ?>
                <!-- User is not logged in -->
                <p><a href="login.php">Login</a> to submit feedback on the site.</p>
                <?php } ?>
            </div>
		</div>
		<?php require "template/footer.php"; ?>
	</body>
</html>