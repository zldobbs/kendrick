<!-- Footer info to be included on bottom of every page -->
<footer class="navbar-default navbar-fixed-bottom">
	<div class="container text-center">
		<ul class="nav navbar-nav navbar-right">
			<li><a href="about.php">&copy; Zach Dobbs 2017</a></li>
		</ul>
	</div>
</footer>

<?php 
	// Close the databse connection established in info.php
	$mysqli->close();
?>

<!-- JavaScript included at end of page to increase loadtimes -->
<script src="../assets/js/jquery-3.2.1.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>