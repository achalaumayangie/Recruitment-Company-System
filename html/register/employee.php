<?php
$msg = "";
if (isset($_POST['btn'])) {
	$gender = $_POST['gender'];
	$name  = $_POST['name'];
	$address = $_POST['addr'];
	$dob = $_POST['dob'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$password = $_POST['pwd'];
	$password = md5($password);
	$edu_quli = $_POST['edu'];
	$additional_quli = $_POST['add'];

	include_once("../lib/config.php");

	$sql = "SELECT MAX(eid) AS mid FROM employee;";
	$mid = ($conn->query($sql))->fetch_assoc()['mid']+1;

	$sql = "INSERT INTO `employee`(eid, name, address, birth, contact, mail, psw, gender, edu_quli, pro_quli, adi_quli, cv, status) VALUES ($mid,'$name','$address','$dob','$mobile','$email','$password','$gender','$edu_quli','','$additional_quli','null',1)";

	if ($conn->query($sql) == TRUE) {
		$msg = "Account Created Successfully!";
	}else{
		$msg = "Failed to create the account try again.";
	}

}

?>
<!DOCTYPE html>
<html>
<head>

<style>
	form {
	padding-left: 20px
	}

button {background-color: #09dd09;}

button:hover {
  background-color: #0ea642; 
}
btn1 {background-color: #09dd09;}

form {
	margin:20px;
	padding:20px;
	overflow:hidden;
}
</style>	

<body

style="background-color:#ebebe0";/>

</body>

<title>VaCa | Register Form for Employee</title>

	<meta charset="utf-8">  
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="../../css/basic.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
	<script src="../../js/myscript.js"></script>

	
</head>
<body>


<div class="nav">
		<a href="index.html">
			<img src="../../images/logo.png">
		</a>
			<ul class="links">
				<li>
					<a href="../">Home</a>
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

	<div class="content">
<br><br>
<center>
<h1>New Employee Registration </h1>
<h2><?php  echo $msg;?></h2>
</center>
<br>


<form target="_self" method="POST" onsubmit="return checkPassword()">
    <label>Full Name</label><br>
	<input type="text" id="fname" name="name" style="width:750px;" required><br><br>
	
	Address <br>
	<textarea id="addr" name="addr" rows="10" cols="50" style="width:500px;"required></textarea><br><br>
	
	Choose Your DOB<br>
	<input type="date" id="dob" name="dob">
	<br><br>
	
	Gender <br>
	<input type="radio" id="gender" name="gender" value="1"> Male
	<input type="radio" id="gender" name="gender" value="0"> Female
	<br><br>
	
	Contact No <br>
	<input type="text" id="mobile" name="mobile" style="width:250px;" pattern="[0-9]{10}" required><br><br>
	
	Email <br>
	<input type="email" id="emailAdd" name="email" style="width:250px;" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9]+\.[a-z]{2,3}" required><br><br>
	
	Password <br>
	<input type="password" id="pwd" name="pwd" style="width:250px;" pattern="[a-zA-Z0-9]{5,10}"required><br><br>

	Confirm Password <br>
	<input type="password" id="rpwd" name="rpwd" style="width:250px;"required><br><br>
	
	Educational qualifications <br>
	<textarea id="edu" name="edu" rows="10" cols="50" style="width:500px;"required></textarea><br><br>
	
	Additional information <br>
	<textarea id="add" name="add" rows="6" cols="50" style="width:500px;"required></textarea><br><br>
	
	Accept privacy policy terms
	<input type="checkbox" id="policy" name="policy" required onclick="enableButton()"><br><br><br>
	<center>
	<input type="submit" id="btn1" name="btn" value="Submit"style="background-color:#09dd09" >
    </center>
	<br><br>
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
					<li><a href="../about/about.html">About</a></li>
					<li><a href="../contact/contact.php">contact</a></li>
					<li><a href="../privacy/privacy.html">Privacy & Policy</a></li>
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