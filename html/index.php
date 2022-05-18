<?php

include_once("lib/config.php");

$sql = "SELECT COUNT(vid) AS count,category FROM vacancy GROUP BY category";
$result = $conn->query($sql);

$comCount = 0;
$hrCount = 0;
$accCount = 0;
$engCount = 0;

while ($row = $result->fetch_assoc()) {
	if ($row['category'] == "Coumputing") {
		$comCount = $row['count'];
	}elseif($row['category'] == "Engineering"){
		$engCount = $row['count'];
	}elseif($row['category'] == "Human resources"){
		$hrCount = $row['count'];
	}elseif ($row['category'] == "Accounting") {
		$accCount = $row['count'];
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>VaCa Vacancies</title>
	<meta charset="utf-8">  
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="../css/basic.css">
	<link rel="stylesheet" type="text/css" href="../css/home.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

	<div class="nav">
		<a href="index.html">
			<img src="../images/logo.png">
		</a>
			<ul class="links">
				<li>
					<a href="#">Home</a>
				</li>
				<li>
					<a href="about/about.html">About</a>
				</li>
				<li class="gbutton">
					<a href="register/register.html">Register</a>
				</li>
				<li class="gbutton">
					<a href="login/login.php">Login</a>
				</li>
			</ul>
	</div>

	<div class="search">
		
		<form method="GET" class="sform" action="search/search.php">
			<select name="loc">
				<option value="all">Location</option>
				<?php
				$sql = "SELECT DISTINCT location FROM vacancy;";
				$result = $conn->query($sql);

				if ($result->num_rows>0) {
					while ($row = $result->fetch_assoc()) {
						echo '<option value="'.$row['location'].'">'.$row['location'].'</option>';
					}
				}

				?>
			</select>
			<select name="cat">
				<option value="all">Category</option>
				<?php

				$sql = "SELECT DISTINCT category FROM vacancy;";
				$result = $conn->query($sql);

				if ($result->num_rows>0) {
					while ($row = $result->fetch_assoc()) {
						echo '<option value="'.$row['category'].'">'.$row['category'].'</option>';
					}
				}

				?>
			</select>

			<input type="text" name="search" placeholder="Search by title"><input class="Mbutton" type="submit" name="sub" value="Search">
		</form>

	</div>

	<div class="content">

		<div class="features">
			<h1>Find your career with US</h1>

			<div class="column">
				<i class="fa fa-envelope-open-o"></i>
				<p>Latest Alert about Vacancies</p>
			</div>
			<div class="column">
				<i class="fa fa-check-circle"></i>
				<p>Status about Applied Vacancies</p>
			</div>
			<div class="column">
				<i class="fa fa-tachometer"></i>	
				<p>Easy to Control & Find Vacancies</p>	
			</div>

			<hr class="hrStyle">
		</div>
		
		<div class="count">
			<h1>We Have</h1>
			<?php
			echo'
			<div class="Hcolumn">
				<p class="Btext">Infomation & Communiacation Technology</p>
				<span>'.$comCount.'</span>
			</div>

			<div class="Hcolumn">
				<p class="Btext">Accounting & Financial Jobs</p>
				<span>'.$accCount.'</span>
			</div>

			<div class="Hcolumn">
				<p class="Btext">Human Resources & Recruitment Jobs</p>
				<span>'.$hrCount.'</span>
			</div>

			<div class="Hcolumn">
				<p class="Btext">Engineering Jobs</p>
				<span>'.$engCount.'</span>
			</div>';
			?>
			<button name="more" class="more"><i class="fa fa-rocket"></i> More</button><br>

			<hr class="hrStyle">
		</div>

		<div class="feed">
			<h1>FeedBack</h1>

			<div class="feedLay">
				<div class="feedIcon">
					<i class="fa fa-user-circle-o"></i>
				</div>
				<div class="feedComment">
					<p id="com">
						
						<?php

						$sql =  "SELECT * FROM feedback ORDER BY fid DESC";
						$resultFeed = $conn->query($sql);

						if ($resultFeed->num_rows>0) {
							$i = 1;
							while ($row = $resultFeed->fetch_assoc()) {
								if ($i == 1) {
									echo '<span id="f'.$i.'">'.$row['name'].'<br>'.$row['description'].'</span>';
								}else{
									echo '<span id="f'.$i.'" style="display:none;">'.$row['name'].'<br>'.$row['description'].'</span>';
								}
								$i++;
							}
						}

						?>

					</p>
				</div>
				<div class="feedArrow">
					<i class="fa fa-arrow-circle-right" id="nButton" onclick="nextFeed(1)"></i>
				</div>
			</div>
		</div>

	</div>

	<div class="feedBack">
		
	</div>

	<div class="footer"> 
		<div class="column">

			<div class="fcontent">
				<p> 
				Achive your goals with VaCa.Find your dream job easily using VaCa.Show your skills and get your dream job.We are here to help you.</p>
			</div>

			<div class="fcontent">
				<i class="fa fa-instagram"></i>
				<i class="fa fa-facebook"></i>
				<i class="fa fa-twitter"></i>
			</div>
		</div>
		
		<div class="column" style="text-align: center;">
			<div class="fcontent">
				<label><u>Links</u></label>
				<ul>
					<a href="about/about.html" style="color: #ffffff;"><li>About</li></a>
					<a href="contact/contact.php" style="color: #ffffff;"><li>Contact</li></a>
					<a href="privacy/privacy.html" style="color: #ffffff;"><li>Privacy & Policy</li></a>
				</ul>
			</div>
		</div>

		<div class="column">
			<div class="fcontent associations">
				<label><u>We are associated with</u></label>
			</div>
			<div class="fcontent associations">
				<i class="fa fa-google"></i>
				<i class="fa fa-amazon"></i><br><br>
				<i class="fa fa-yahoo"></i>
				<i class="fa fa-whatsapp"></i>
			</div>
		</div>

		<div class="column" style="width: 100%;text-align: center;">
			<hr>
			<p><script>document.write(new Date().getFullYear());</script> All rights reserved</p>
		</div>

	</div>

<script src="../js/homeFeed.js"></script>
</body>
</html>