<?php

session_start();
if (!isset($_SESSION['com'])) {
	header("location:../login/login.php");
}else{
	$cid = $_SESSION['com'];
	include("../lib/config.php");

	$sql = "SELECT vid FROM vacancy WHERE cid='$cid'";
	$result = $conn->query($sql);
	
	$comCount = $result->num_rows;
	$empCount = 0;

	if ($comCount>0) {
	
	while ($row = $result->fetch_assoc()) {
		$sql = "SELECT aid FROM apply WHERE vid=".$row['vid']."";
		$empCount += ($conn->query($sql))->num_rows;
	}

	}
}

if (isset($_GET['logout'])) {
	session_destroy();
	header("location:../login/login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>VaCa Vacancies</title>
	<meta charset="utf-8">  
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="../../css/basic.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/s15.css"> 
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <!--Get your own code at fontawesome.com-->

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
					<a href="?logout">LogOut</a>
				</li>
			</ul>
	</div>


<div class="row content">
		<meta name="viewport" content="width=device-width, initial-scale=1">

  
  <div class="row-content">
  	<div class="col-sm-2 sidenav">
  <a href="#" class="active"><i class='fas fa-tachometer-alt'> dashboard</i></a>
  <a href="../addjob/addjobs.php"><i class='fas fa-user-plus'> ADD Jobs</i></a>
  <a href="#"><i class='far fa-file-alt'></i> Candidates Reports</i></a>
</div>
	</div>
	


 

	<div class="content">
		
 <div class = "s21">
<p>  <i class='fas fa-user-tie'><br>  <?php echo $empCount;?><br>Employees</i></p>
 </div>

 <div class = "s22">
    <p> <i class='fas fa-briefcase'><br>  <?php echo $comCount;?><br> Vacancies</i></p>
 </div><br>
 <div>
	<a href="../addjob/addjobs.php"><p class = "s1"> <i class='fas fa-edit'><br><b>post job</b><br>fill in simple form to find s your requirement</i></p></a>
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