<!-- Create navbar to be included on every page -->
<header class="navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-left">
				<li><a href="index.php">Home</a></li>
				<li><a href="discography.php">Music</a></li>
				<li><a href="life.php">Life</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
                <li><a href="about.php">About</a></li>
				<?php if (!login()) { ?>
					<li><a href="login.php">Login</a></li>
				<?php } else { ?>
					<li><a href="logout.php">Logout</a></li>
				<?php } ?>
			</ul>
		</div>
	</div>	
</header>