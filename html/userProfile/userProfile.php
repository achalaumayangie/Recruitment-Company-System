<?php
session_start();
$msg = "";
if (!isset($_SESSION['emp'])) {
	header("location:../login/login.php");
}else{
	$eid = $_SESSION['emp'];

	include_once("../lib/config.php");

	if (isset($_POST['submit'])) {
		$edu_quli = $_POST['edu'];
		$pro_quli = $_POST['pro'];
		$addi_quli = $_POST['addi'];

		$sql = "UPDATE employee SET edu_quli='$edu_quli',pro_quli='$pro_quli',adi_quli='$addi_quli' WHERE eid='$eid'";

		if ($conn->query($sql) == TRUE) {
			$msg = "Updated Successfully!";
		}else{
			$msg = "Failed to update , Try again!";
		}
	}

	$sql = "SELECT * FROM employee WHERE eid='$eid'";
	$result = $conn->query($sql);

	$row = $result->fetch_assoc();

	$i = 0;
	foreach ($row as $value) {
		if ($value != "" AND $value != "null") {
			$i++;
		}
	}

	$complete = round(($i / 13) * 100);
}

if (isset($_GET['logout'])) {
	session_destroy();
	header("location:../login/login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>VaCa User Profile</title>
	<meta charset="utf-8">  
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="../../css/basic.css">
	<link rel="stylesheet" type="text/css" href="../../css/userAccount.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

	<div class="nav">
		<a href="index.html">
			<img src="../../images/logo.png">
		</a>
			<ul class="links">
				<li>
					<a href="index.html">Home</a>
				</li>
				<li>
					<a href="">About</a>
				</li>
				<li class="adminIco">
					<a href=""><i class="fa fa-user-circle-o"></i> User</a>
				</li>
				<li class="rButton">
					<a href="?logout">LogOut</a>
				</li>
			</ul>
	</div>


	<div class="content" style="margin-top: 90px;padding:30px;">
		<h1 style="text-align: center;">Welcome to the Profile</h1>
		<h2 style="text-align: center;"><?php echo $msg;?></h2>
		<hr style="margin: 0">

		<div class="mainLay">
			<div class="sLayout">
				<i class="icon fa fa-user-circle-o"></i>
				<?php
				echo'
				<h4>Name    : '.$row['name'].'</h4>
				<h4>Mail    : '.$row['mail'].'</h4>
				<h4>Contact : '.$row['contact'].'</h4>
				';
				?>
				<i class="recicon fa fa-flag"></i>
			</div>

			<div class="lLayout">
				<form method="post">
				<div class="complete">
					<div class="comIcon">
						<i class="icon fa fa-pie-chart"></i>
					</div>
					<div class="comDel">
						<h2>Complete Your Profile</h2>
						<h1><?php echo $complete;?> %</h1>
					</div>
				</div>

				<h4 class="quli"><i class="fa fa-graduation-cap" style="margin-left: 5px;"></i> Education Queslifications</h4>

				<ul>
					<li>Education Qualifications:-</li>

					<textarea type="text" id="edu" name="edu"><?php echo $row['edu_quli'];?></textarea>
					
				</ul>

				<h4 class="quli"><i class="fa fa-graduation-cap" style="margin-left: 5px;"></i> Additional Queslifications</h4><br>
					<ul>
					<li>Qualifications</li></ul>
					<textarea type="text" name="addi" placeholder="Additional" style="border:2px solid #000000;margin-left: 20px;"><?php echo $row['adi_quli'];?></textarea><br><br>


				<h4 class="quli"><i class="fa fa-graduation-cap" style="margin-left: 5px;"></i> Professional Queslifications</h4><br>

					<textarea type="text" name="pro" placeholder="Professional" style="border:2px solid #000000;margin-left: 20px;"><?php echo $row['pro_quli'];?></textarea> <br><br>


				<h4 class="quli"><i class="fa fa-graduation-cap" style="margin-left: 5px;"></i> CV</h4><br>

					<input type="file" style="border:none;margin-left: 20px;"><br><br>

				<input type="submit" name="submit" value="Update" style="width: 100%;border:2px solid #000000;border-bottom: none;cursor: pointer;">
				</form>
			</div>
		</div>
	</div>


	<div class="footer" style="padding-top: 20px;"> 

		<p style="text-align: center;margin-bottom: 10px;"><script>document.write(new Date().getFullYear());</script> All rights reserved</p>

	</div>

</body>
</html>