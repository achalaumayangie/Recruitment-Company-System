<?php
$msg = "";
if (isset($_GET['vid'])) {
	$vid = $_GET['vid'];

	include_once("../lib/config.php");
	$sql = "SELECT * FROM vacancy WHERE vid='$vid' AND status=1";
	$result = $conn->query($sql);

	if ($result->num_rows>0) {
		$row = $result->fetch_assoc();
	}
}else{
	header("location:../search/search.php");
}

if (isset($_POST['apply'])) {
	$vid = $_POST['apply'];

	session_start();
	$_SESSION['emp'] = 1;
	if (isset($_SESSION['emp'])) {
		$eid = $_SESSION['emp'];
		$sql = "SELECT aid FROM apply WHERE vid='$vid' AND eid='$eid'";
		$resultc = $conn->query($sql);

		if (!$resultc->num_rows>0) {
			$sql = "SELECT MAX(aid) AS mid FROM apply;";
			$resultM = $conn->query($sql);
			$mid = ($resultM->fetch_assoc())['mid']+1;

			date_default_timezone_set("Asia/Colombo");
			$time = date("Y-m-d H:i:s");

			$sql = "INSERT INTO apply VALUES('$mid','$eid','$vid','$time')";
			if ($conn->query($sql) == TRUE) {
				$msg = "Applied Succefully!";
			}else{
				$msg = "Can't Apply Try Again Later!";
				die($conn->error);
			}
		}else{
			$msg = "Already Applied!";
		}
		
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>VaCa Vacancies</title>
	<meta charset="utf-8">  
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <link rel="stylesheet" type="text/css" href="../../css/s11.css"> 
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

	<div class="nav">
		<a href="index.html">
			<img src="../../images/logo.png">
		</a>
			<ul class="links">
				<li>
					<a href="">Home</a>
				</li>
				<li>
					<a href="">About</a>
				</li>
				<li class="gbutton">
					<a href="">Register</a>
				</li>
				<li class="gbutton">
					<a href="">Login</a>
				</li>
			</ul>
	</div>

	<div class="content">
		
		<!--page content-->

	</div>
	<div class = im1>
<img src="../../images/vit.jpg" alt="Tulli" class = "s11">
</div>
<div class = s10>
<p> Name : <?php  echo $row['title'];?></p>
<p> Category : <?php echo $row['category'];?></p>
<p> Website : www.vitusa.lk</p>
</div>
<ul>

<ul style="list-style-type:disc;">
  	<h3 style="text-align: center;"><?php echo $msg;?></h3>
      <div class = s12>
	    
  <li>DUTIES AND RESPONSIBILITES</li>
        <p><?php echo $row['dar'];?></p>

  <li>POSITION</li>
	<p><?php echo $row['position'];?></p>

	<li>Career Level</li>
		<p><?php echo $row['career_lvl'];?></p>

	<li>Location</li>
		<p><?php echo $row['location'];?></p>

	<li>Salary</li>
		<p><?php echo $row['salary'];?></p>

  <li>QUALIFICATIONS AND REQUIREMENTES</li>
        <ul style="list-style-type:disc;">
        	<p><?php echo $row['qualification'];?></p>
	   <ul>
</ul>
     </div class = s12>



<div class = s13>

<form method="POST">
	<button class="button" name="apply" value="<?php echo $vid;?>">apply</button>
</form>

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
					<li>About</li>
					<li>Contact</li>
					<li>Privacy & Policy</li>
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

</body>
</html>