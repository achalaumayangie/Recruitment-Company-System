<?php
include_once("../lib/config.php");

//set cat and location if hav selected
$catSet = "";
$locSet = "";
$search = "";

$order = "DESC";

if (isset($_GET['lt'])) {
	$order = "DESC";
}elseif(isset($_GET['ol'])){
	$order = "ASC";
}

if (isset($_GET['sub'])) {

	$filerQuery = "";

	$search = $_GET['search'];
	$cat = $_GET['cat'];
	$location = $_GET['loc'];


	if ($cat != "all" AND $cat != "") {
		$filerQuery = " AND v.category='$cat'";
		$catSet = " WHERE category != '".$cat."'";
	}

	if ($location != "all" AND $location != "") {
		$filerQuery = $filerQuery." AND v.location='$location'";
		$locSet = " WHERE location != '".$location."'";
	}

	$sqls = "SELECT v.title,v.dar,v.location,v.time,v.vid,c.cname FROM vacancy v,company c WHERE v.status = 1 AND v.cid=c.cid AND (v.title LIKE '%$search%' OR v.dar LIKE '%$search%' OR v.qualification LIKE '%$search%') $filerQuery ORDER BY v.vid $order";
}else{
	$sqls = "SELECT v.title,v.dar,v.location,v.time,v.vid,c.cname FROM vacancy v,company c WHERE v.status = 1 AND v.cid=c.cid ORDER BY v.vid $order";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>VaCa Search</title>
	<meta charset="utf-8">  
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="../../css/basic.css">
	<link rel="stylesheet" type="text/css" href="../../css/search.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

	<div class="nav">
		<a href="../index.html">
			<img src="../../images/logo.png">
		</a>
			<ul class="links">
				<li>
					<a href="../index.php">Home</a>
				</li>
				<li>
					<a href="../about/about.html">About</a>
				</li>
				<li class="gbutton">
					<a href="../register/register.html">Register</a>
				</li>
				<li class="gbutton">
					<a href="../login/login.php">Login</a>
				</li>
			</ul>
	</div>

	<div class="search">
		
		<form method="GET" class="sform">
			<select name="loc">
				
				<?php

				if ($locSet == "") {
					echo '<option value="all">Location</option>';
				}else{
					echo '<option value="all">Location</option>
							<option value="'.$location.'" selected>'.$location.'</option>
					';
				}

				$sql = "SELECT DISTINCT location FROM vacancy $locSet;";
				$result = $conn->query($sql);

				if ($result->num_rows>0) {
					while ($row = $result->fetch_assoc()) {
						echo '<option value="'.$row['location'].'">'.$row['location'].'</option>';
					}
				}

				?>
			</select>
			<select name="cat">
				
				<?php

				if ($catSet == "") {
					echo '<option value="all">Category</option>';
				}else{
					echo '<option value="all">Category</option>
							<option value="'.$cat.'" selected>'.$cat.'</option>
					';
				}

				$sql = "SELECT DISTINCT category FROM vacancy $catSet;";
				$result = $conn->query($sql);

				if ($result->num_rows>0) {
					while ($row = $result->fetch_assoc()) {
						echo '<option value="'.$row['category'].'">'.$row['category'].'</option>';
					}
				}

				?>
			</select>

			<input type="text" name="search" placeholder="Search by title" value="<?php echo $search;?>"><input class="Mbutton" type="submit" name="sub" value="search">

		

	</div>

	<div class="content alignCenter">

		<div class="orderButton">
			<button class="active" type="submit" id="ltt" name="lt" onclick="changeOrder('ltt')">Latest</button><button id="tr" onclick="changeOrder('tr')" name="ol" type="submit">Oldest</button>
		</div>

	</form>
		<div class="result">

			<?php

			$result = $conn->query($sqls);

			//checking weather there is rows
			if ($result->num_rows>0) {
				//getting availble rows
				while ($row = $result->fetch_assoc()) {
					echo '
					<div class="resultRow">
						<div class="SPcolumn">
							<img src="../../images/logo.png">
						</div>
						<div class="SCcolumn">
							<h3>'.$row['title'].'</h3>
							<p>'.$row['dar'].'</p>

							<p><i class="fa fa-briefcase"> '.$row['cname'].'  </i>  | <i class="fa fa-map-marker"> '.$row['location'].'  </i>  | <i class="fa fa-calendar"> '.substr($row['time'],0,10).' |</i></p>
						</div>
						<div class="sArrow">
							<a href="../viewJob/viewjob.php?vid='.$row['vid'].'" style="color:#ffffff"><i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
					';
				}
			}else{
				echo "<br><h2>No Result :(</h2>";
			}
			?>

		</div>


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
					<a href="../about/about.html" style="color: #ffffff;"><li>About</li></a>
					<a href="../contact/contact.php" style="color: #ffffff;"><li>Contact</li></a>
					<a href="../privacy/privacy.html" style="color: #ffffff;"><li>Privacy & Policy</li></a>
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

<script src="../../js/search.js"></script>

<script>
<?php

if (isset($_GET['ol'])) {
	echo "changeOrder('tr');";
}elseif (isset($_GET['lt'])) {
	echo "changeOrder('ltt')";
}

?>
</script>

</body>
</html>