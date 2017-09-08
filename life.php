<?php
	require "template/info.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>K-Dot | Life</title>
		<?php require "template/head.php"; ?>
	</head>
	<body>
		<?php require "template/navbar.php"; ?>
		<div class="container">
            <div class="row">
                <div class="jumbotron">
					<h1>The Man Behind the Music</h1>
                    <button class="btn btn-info" onclick="switchPersonal()">Personal Life</button>
					<button class="btn btn-info" onclick="switchCareer()">Career</button>
                </div>
				<div class="row" id="personalBox">
					<div class="col-sm-12 col-md-6">
						<img class="pull-left" src="assets/img/life.jpg" id="life" alt="Kendrick Lamar">
					</div>
					<div class="col-sm-12 col-md-6">
						<h3>Early Life</h3>
						<p>Kendrick Lamar Duckworth was born and raised in Compton, California. Kendrick was given his name by his mother to honor the American singer Eddie Kendricks from the Temptations. At a young age, Kendrick witnessed the filming of the "California Love" music video by Tupac and Dr. Dre. Kendrick has associated this experience as being a pivotal moment in his life. Life was not easy for young Kendrick, growing up on welfare in a section 8 housing. He made the most of his struggles and still managed to achieve academically throughout high school. A lot of the hardships that Kendrick experienced throughout his childhood became inspriation for the music he would produce later in his life.</p>
						<h3>Currently</h3>
						<p>Kendrick has recently became engaged to his longtime girlfriend, Whitney Alford. He is 29 years of age with no children. K-Dot is also a devouted Christian, often referring to his faith in the lyrics of his music.</p>
					</div>
				</div>
				<div class="row" id="careerBox">
					<div class="col-sm-12 col-md-6">
						<h3>Formal Awards</h3>
						<p>Kendrick Lamar has won numerous accolades for his music. In 2014 he received seven nominations at the grammys, one of which was for Album of the Year for good kid, m.A.A.d. city. The following year he then won Best Rap Song and Best Rap Performance at the grammys with his ingle "i" from To Pimp A Butterfly. To Pimp A Butterfly also helped propel Kendrick to 11 total nominations at the 58th Grammy Awards, an absolutely stunning achievement.</p>
						<p>Aside from his musical success, Lamar has also received the California State Senate's Generational Icon Award in 2015. A year later he would receive a key to the city of his hometown Compton, California.</p>
						<h3>Commercial Acclaim</h3>
						<p>Kendrick has become a favorite for many music fans. He has topped the Billboard numerous times, with his most recent project DAMN. becoming number 1 on the Billboard 200 and the single HUMBLE. ranking number 1 on the Billboard Hot 100. Furthermore, the former president of the United States, Barack Obama, had also had such a deep interest in Kung Fu Kenny that he invited him to the White House while he still served as president.</p>
					</div>
					<div class="col-sm-12 col-md-6">
						<img class="pull-right" src="assets/img/grammys.jpg" id="grammys" alt="Grammys">
					</div>
				</div>
            </div>
        </div>
		<?php require "template/footer.php"; ?>
        <script>
			var personalInfo = document.getElementById('personalBox');
			var careerInfo = document.getElementById('careerBox');
            
			function switchPersonal() {
				// Switch from career to personal
				$(careerInfo).hide();
				$(personalInfo).hide().fadeIn(1000);
			}
			
			function switchCareer() {
				// Switch from personal to career
				$(personalInfo).hide();
				$(careerInfo).hide().fadeIn(1000);
			}
            
			$(document).ready(function() {	
				// Default to personal life
				switchPersonal();
            });
        </script>
	</body>
</html>