<?php

$msg = "";

session_start();
if (!isset($_SESSION['com'])) {
	header("location:../login/login.php");
}else{
	$cid = $_SESSION['com'];

	if (isset($_POST['submit'])) {
		$title = $_POST['jobTitile'];
		$position = $_POST['position'];

		$dar = $_POST['dar'];
		$quli = $_POST['quli'];
		$cat = $_POST['cat'];
		$clvl = $_POST['career'];
		$location = $_POST['location'];
		$salary = $_POST['salary'];

		date_default_timezone_set("Asia/Colombo");
		$time = date("Y-m-d H:i:s");

		include_once("../lib/config.php");

		$sql = "SELECT MAX(vid) AS mid FROM vacancy";
		$result = $conn->query($sql);

		$row = $result->fetch_assoc();
		$mid = $row['mid']+1;

		$sql = "INSERT INTO `vacancy`(`vid`, `cid`, `title`, `position`, `category`, `dar`, `qualification`,`career_lvl`, `location`, `salary`, `time`, `status`) VALUES ('$mid','$cid','$title','$position','$cat','$dar','$quli','$clvl','$location','$salary','$time',1)";

		if ($conn->query($sql) == TRUE) {
			$msg = "Job Inserted Successfully!";
		}else{
			$msg = "Can,t Insert!";
			echo $conn->error;
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
	<title>VaCa Add Jobs</title>
	<meta charset="utf-8">  
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="../../css/basic.css">
	<link rel="stylesheet" type="text/css" href="../../css/conboth.css">


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
				<li>
					<a href="">Company</a>
				</li>
				<li class="gbutton">
					<a href="?logout">LogOut</a>
				</li>
			</ul>
	</div> 


<!-- ``````````````````````````````````````````````````````````````````````````````````````` -->


	<div class="row content">
  
	  <div class="row-content">
		 <div class="col-sm-2 sidenav">
		  <a href="../companyDash/companyDash.php">Dashboard</a>
		  <a href="#" class="active">Add jobs</a>
		  <a href="#">Candidate Report</a>
		</div>
	  </div>

	  <br>
	<div class="main-Layout"> <br>
		<div class="main-heading">
		<h1><div class="comIcon">
				<i class="icon fa fa-check-square"></i>
				</div> POST A NEW JOB </h1><hr>
			</div>
			 <br>
			
	<div class="main-form">
		<h2 style="text-align: center;"><?php echo $msg;?></h2>
		<h2>create Here..</h2><br><br>

		<form method="POST">
		<center>
			<textarea name="jobTitile" cols="40" rows="2" placeholder="Job Title"></textarea>
  <br><br>			

			<textarea name="position" cols="40" rows="2" placeholder="Potition"></textarea>
  <br><br>			

		<center><h3><div class="titleIcon">
				<i class="icon fa fa-clipbord"></i>
				</div>Job Summary</h3></center>		

		<center>
			<textarea name="dar" cols="40" rows="8" placeholder="Dutes And Reports"></textarea>
  <br><br>			

			<textarea name="quli" cols="40" rows="6" placeholder="qulification And Requriments"></textarea>
  <br><br>			

  <br><br>			



		</center>

	</div>



	<div class="seco-form">
		<p><center>Add extra details about the job to boost visibility and tragetting.</center></p><br><br>

		<center>	



		<label for="indus">Industry</label>

		<select name="cat" id="cat">
				<option value="Coumputing">Coumputing</option>
				<option value="Engineering">Engineering</option>
				<option value="Human resources">Human resources</option>
				<option value="Accounting">Accounting</option>
		</select><br><br>		



		<label for="career">Career Level</label>

		<select name="career" id="career">
		<option value="Senior">Senior</option>
		<option value="Junior">Junior</option>
		<option value="Intern">Intern</option>
		</select><br><br>		



		<label for="education">Location</label>

		<input type="text" name="location" required=""><br><br>		
		</center>

		<h4><center>Salary Range</center></h4>

		<input type="number" name="salary">

		<br><br>	
		</center>

		<hr><br>
		<center>
			
			<input type="submit" value="Submit" name="submit"><br><br>
  			<input type="reset" value="Reset" >
		 </center>

		 </form>
		</div>


<!--````````````````````````````````````````````````````````````````````````````-->
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
			<label><u>We are associated with</u></label>
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

</body>
</html>