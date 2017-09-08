<?php
	require "template/info.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>K-Dot | Home</title>
		<?php require "template/head.php"; ?>
	</head>
	<body>
		<?php require "template/navbar.php"; ?>
		<div class="container">
            <div class="row">
                <div class="jumbotron indexContent">
                    <h1>Kung Fu Kenny</h1>
                </div>
                <div class="col-sm-12 col-md-6">
                    <img src="assets/img/kendrick.jpg" id="kendrickPhoto" alt="Kendrick Lamar">
                </div>
                <div class="col-sm-12 col-md-6 indexContent">
                    <h3>K-Dot. Kung Fu Kenny. Kendrick Lamar.</h3>
                    <p>The legendary kid from Compton goes by many names, but at the end of the day only one resonates with his true identity: King. Kendrick Lamar has propelled himself to the top of the hip hop industry and cemented his influence in culture with a plethora of amazing albums. Whether it be the socially shaking To Pimp A Butterfly or his raw, unforgiving new DAMN. album, Kendrick continues to define what it means to be the best rapper alive.</p>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <h4>Discography</h4>
                            <p>Kendrick Lamar has spent years honing and perfecting his unique delivery. Read up on all of his albums and listen to samples from each.</p>
							<a href="discography.php"><button class="btn pull-right">Music</button></a>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <h4>The Life of a GOAT</h4>
                            <p>Read the story of Kendrick's humble beginnings and his rise to the top.</p>
							<a href="life.php"><button class="btn pull-right">Life</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php require "template/footer.php"; ?>
        <script>
            // JQuery to fadeIn all album art when page loads
            $(document).ready(function() {
                $(".indexContent").hide().fadeIn(3000);
                $("#kendrickPhoto").hide().fadeIn(1000);
            });
        </script>
	</body>
</html>