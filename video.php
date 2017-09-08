<?php
	require "template/info.php";
    
    $album = htmlspecialchars($_GET['album']);

    switch($album) {
        // Display information on page based on current album
        case 'section80':
            $src = "https://www.youtube.com/embed/RT2ZCdPVLAs";
            $title = "HiiiPOWER";
            $desc = "A masterpiece single from Section.80, HiiiPower. HiiiPower was the first song released from Kendrick Lamar's debut album Section.80. It focuses on finding enlightment through self-reflection. This song is a perfect showcase of K-Dot's introspective rapping style.";
            break;
        case 'goodkidmaadcity':
            $src = "https://www.youtube.com/embed/NUcPy7aYys8";
            $title = "good kid, m.A.A.d. city";
            $desc = "A song from the album that shares the same name. The version included on this page is a remix of the original, due to copyright issues. The song embodies the overall message of the entire album, telling of the adversity and struggles a person must overcome growing up in a bad neighboorhood.";
            break;
        case 'topimpabutterfly':
            $src = "https://www.youtube.com/embed/61rLgUYJtvY";
            $title = "King Kunta";
            $desc = "King Kunta is Kendrick Lamars declaration to other artists: I am the best. It is also a historical tale about a slave that lost his feet when trying to escape his binds. Overall the song is a powerful verbal attack by Kung Fu Kenny. The version included on this page is a witty remix with Thomas the Train.";
            break;
        case 'untitledunmastered':
            $src = "https://www.youtube.com/embed/cziv-WGRLcE";
            $title = "untitled 02";
            $desc = "untitled 02 is the second track of untitled unmastered and often a fan favorite. Here Kendrick performs the track on the Tonight Show before he ever announced he would be releasing a new album. The song deals with more cultural issues and the oppression of African Americans in today's society.";
            break;
        case 'damn':
            $src = "https://www.youtube.com/embed/lbYIUnV8u7E";
            $title = "The Heart Part IV";
            $desc = "This song released shortly before DAMN. It is not included on the album, but it reflects Kendrick's the same rage that he conveys throughout DAMN. This diss track will leave you steaming. Don't tell a lie on K-Dot, he won't tell the truth on you.";
            break;
        default:
            $album = "rickroll";
            $src= "https://www.youtube.com/embed/oHg5SJYRHA0";
            $title = "Um... This is awkward";
            $desc = "The album you selected doesn't exist in Kendrick's library. <a href='discography.php'>Go back</a> and select a valid option or stay and enjoy some great Rick Astely. Your choice";
            break;
    }

	if (isset($_POST['submit'])) {
		$username = $_SESSION['username'];
		$comment = htmlspecialchars($_POST['comment']);
        
		$query = "INSERT INTO comments VALUES(?,?,?,NOW())";
		if (!$ps->prepare($query)) {
			die('Failed to prepare comment');
		}
		
		$ps->bind_param("sss", $username, $album, $comment);
		if (!$ps->execute()) {
			die('Failed to add comment to server');
		} else {
			$ps->close();
		}
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>K-Dot | Video</title>
		<?php require "template/head.php"; ?>
	</head>
	<body>
		<?php require "template/navbar.php"; ?>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-7">
					<!-- 
						Embed YouTube Video 
						Choose based on GET info
					-->
					<iframe width="600" height="400" src="<?= $src ?>" frameborder="5" allowfullscreen></iframe>
				</div>
				<div class="col-sm-12 col-md-5">
					<!-- Video Description -->
					<h3><?= $title ?></h3>
					<p><?= $desc ?></p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<h3>Comments</h3>
					<hr>
					<?php if (login()) { ?>
					<!-- Allow user to leave a comment -->
					<p>Share your thoughts:</p>
					<form action="video.php?album=<?= $album ?>" method="post">
						<div class="form-group">
							<textarea class="form-control" name="comment" required></textarea>
						</div>
						<input class="btn btn-info pull-right" type="submit" name="submit" value="Comment">
					</form>
					<?php } else { ?>
                    <p><a href="login.php">Login</a> to leave a comment</p>
					<?php } ?>
				</div>
				<div class="col-sm-12">
					<?php
						// Get comments from server, display on page
						$query = "SELECT * FROM comments WHERE album=? ORDER BY post_time DESC";
                        $ps = $mysqli->stmt_init();
						if (!$ps->prepare($query)) {
                            die('Failed to prepare comments');
                        }

                        $ps->bind_param("s", $album);
                        if (!$ps->execute()) {
                            die('Failed to find album name');
                        } else {
                            $result = $ps->get_result();
                            $ps->close();
                        }
                        
						while ($row = $result->fetch_array(MYSQLI_NUM)) {
					?>
						<hr>
						<div class="card">
							<div class="card-block">
								<h4 class="card-title"><?= $row[0] ?></h4>
								<h5 class="card-subtitle text-muted">Posted: <?= $row[3] ?></h5>
								<p class="card-text"><?= $row[2] ?></p>
							</div>
						</div>
					<?php 
						}
					?>
				</div>
			</div>
		</div>
		<?php require "template/footer.php"; ?>
	</body>
</html>