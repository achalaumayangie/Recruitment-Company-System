<?php
session_start();
$msg = "";
if (!isset($_SESSION['admin'])) {
	header("location:../login/login.php");
}else{
	include_once("../lib/config.php");

	include("count.php");


	//disable enable accounts
	if (isset($_POST['e_enable']) OR isset($_POST['e_disable']) OR isset($_POST['c_disable']) OR isset($_POST['c_enable'])) {
		if (isset($_POST['e_enable'])) {

			$eid = $_POST['e_enable'];
			$sql = "UPDATE employee SET status=1 WHERE eid='$eid'";
		}elseif (isset($_POST['e_disable'])) {

			$eid = $_POST['e_disable'];
			$sql = "UPDATE employee SET status=0 WHERE eid='$eid'";
		}

		if (isset($_POST['c_enable'])) {

			$cid = $_POST['c_enable'];
			$sql = "UPDATE company SET status=1 WHERE cid='$cid'";
		}elseif(isset($_POST['c_disable'])){

			$cid = $_POST['c_disable'];
			$sql = "UPDATE company SET status=0 WHERE cid='$cid'";
		}

		//executing the sql query
		if ($conn->query($sql) == FALSE) {
			echo $conn->error;
		}
	}

	if (isset($_POST['c_delete']) OR isset($_POST['e_delete'])) {
		if (isset($_POST['c_delete'])) {
			$cid = $_POST['c_delete'];

			$sql = "SELECT vid FROM vacancy WHERE cid='$cid'";
			$result = $conn->query($sql);

			if ($result->num_rows>0) {
				$row = $result->fetch_assoc();

				$sql = "DELETE FROM apply WHERE vid=".$row['vid']."";
				$conn->query($sql);

				$sql = "DELETE FROM vacancy WHERE cid='$cid'";
				$conn->query($sql);
			}

			$sql = "DELETE FROM company WHERE cid='$cid'";

		}elseif(isset($_POST['e_delete'])){
			$eid = $_POST['e_delete'];

			$sql = "DELETE FROM apply WHERE eid='$eid'";
			$conn->query($sql);

			$sql = "DELETE FROM employee WHERE eid='$eid'";

		}

		if ($conn->query($sql) == FALSE) {
			die("Deleting error-".$conn->error);
		}else{
			include("count.php");
		}
	}

	//add new company
	if (isset($_POST['addC'])) {
		$sql = "SELECT MAX(cid) AS mid FROM company;";
		$resultMid = $conn->query($sql);
		$mid = ($resultMid->fetch_assoc())['mid'] + 1;

		$cname = $_POST['cname'];
		$mail = $_POST['email'];
		$psw = $_POST['psw'];
		$psw = md5($psw);

		$sql = "INSERT INTO company(cid, cname, owner, mail,contact,address,psw,status) VALUES ($mid,'$cname','','$mail','','','$psw',1)";
		if ($conn->query($sql) == TRUE) {
			$msg = "Company Added Successfully!";
		}else{
			$msg = "Failed to insert,Try again!";
		}
	}	
	//add new employee
	elseif (isset($_POST['addE'])) {
		$sql = "SELECT MAX(eid) AS mid FROM employee;";
		$resultMid = $conn->query($sql);
		$mid = ($resultMid->fetch_assoc())['mid'] + 1;

		$name = $_POST['cname'];
		$mail = $_POST['email'];
		$psw = $_POST['psw'];
		$psw = md5($psw);

		$sql = "INSERT INTO employee(eid, name, address, birth, contact, mail, psw, gender, edu_quli, pro_quli, adi_quli, cv, status) VALUES ($mid,'$name','','0000-00-00 00:00:00','','$mail','$psw','1','','','','null',1)";

		if ($conn->query($sql) == TRUE) {
			$msg = "Employee Added Successfully!";
		}else{
			$msg = "Failed to insert,Try again!";
			echo $conn->error;
		}
	}
}

if (isset($_GET['logout'])) {
	unset($_SESSION['admin']);
	header("location:../login/login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>VaCa Admin</title>
	<meta charset="utf-8">  
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="../../css/basic.css">
	<link rel="stylesheet" type="text/css" href="../../css/admin.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

	<div class="nav">
		<a href="../index.html">
			<img src="../../images/logo.png">
		</a>
			<ul class="links">
				<li>
					<a href="../index.html">Home</a>
				</li>
				<li>
					<a href="">About</a>
				</li>
				<li class="adminIco">
					<a href=""><i class="fa fa-user-circle-o"></i> Admin</a>
				</li>
				<li class="rButton">
					<a href="?logout">LogOut</a>
				</li>
			</ul>
	</div>


	<div class="content alignCenter" style="margin-top: 90px;padding:30px;">
		<div class="Icolumn">
			<div class="icoColumn">
				<p><i class="fa fa-user-circle-o"></i></p>
			</div>
			<div class="icoTitle">
				<p id="ti">Employee</p>
			</div>
			<div class="countColumn">
				<p><?php echo $E_count;?></p>
			</div>
		</div>

		<div class="Icolumn">
			<div class="icoColumn">
				<p><i class="fa fa-briefcase"></i></p>
			</div>
			<div class="icoTitle">
				<p id="ti">Company</p>
			</div>
			<div class="countColumn">

				<p><?php echo $C_count;?></p>
			</div>
		</div>

		<?php if($msg != ""){ echo '<h3 class="alertS">'.$msg.'</h3>';}?>

		<form method="POST">
		<div class="table">

			<h4 class="title">Company Accounts</h4>
			<table border="1">
				<tr>
					<th>Company</th>
					<th>Info</th>
					<th>Account</th>
				</tr>

				<?php

				$sql = "SELECT * FROM company;";
				$result = $conn->query($sql);

				if ($result->num_rows>0) {
					while ($row = $result->fetch_assoc()) {
						echo '
						<tr>
							<td>'.$row['cname'].'</td>
							<td><button type="submit" name="info" value="'.$row['cid'].'" class="info">Info</button></td>
							<td>';

							//cheking account disable or enabled
							if ($row['status'] == 0) {
								echo '<button type="submit" name="c_enable" value="'.$row['cid'].'" class="enable">Enable</button><br>';
							}else{
								echo '<button type="submit" name="c_disable" class="disable" value="'.$row['cid'].'">Disable</button><br>';
							}
							
							echo'<button type="submit" name="c_delete" value="'.$row['cid'].'" class="delete">Delete</button>
							</td>
						</tr>
						';
					}
				}

				?>

			</table>
			<div style="text-align: left;"><button type="button" class="add" onclick="addUser('c')">ADD</button></div>
		</div>


		<div class="table">
			<h4 class="title">Employee Accounts</h4>
			<table border="1">
				<tr>
					<th>Name</th>
					<th>Info</th>
					<th>Account</th>
				</tr>

				<?php

				$sql = "SELECT * FROM employee;";
				$result = $conn->query($sql);

				if ($result->num_rows>0) {
					while ($row = $result->fetch_assoc()) {
						echo '
						<tr>
							<td>'.substr($row['name'],0,10).'...</td>
							<td><button type="submit" name="info" value="'.$row['eid'].'" class="info">Info</button></td>
							<td>';

							//cheking account disable or enabled
							if ($row['status'] == 0) {
								echo '<button type="submit" name="e_enable" value="'.$row['eid'].'" class="enable">Enable</button><br>';
							}else{
								echo '<button type="submit" name="e_disable" class="disable" value="'.$row['eid'].'">Disable</button><br>';
							}
							
							echo'<button type="submit" name="e_delete" value="'.$row['eid'].'" class="delete">Delete</button>
							</td>
						</tr>
						';
					}
				}
				?>
			</table>
			<div style="text-align: left;"><button type="button" class="add" onclick="addUser('e')">ADD</button></div>
		</div>
		</form>

		<div class="form" id="form">

			<form method="POST">
				<span class="cancel" onclick="document.getElementById('form').style.display = 'none'">X</span>

				<fieldset id="companyLay">
					<legend>Add Company</legend>

					<p>Company Name: </p>
					<input type="text" name="cname" placeholder="Company Name" required><br>

					<p>Email: </p>
					<input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Email Address" required><br>

					<p>Password: </p>
					<input type="password" name="psw" pattern=".{8,}" placeholder="Password" required><br><br>

					<input type="submit" name="addC" value="Add">
				</fieldset>
			</form>
			<form method="POST">
				<fieldset id="employeeLay">
					<legend>Add Employee</legend>

					<p>Employee Name: </p>
					<input type="text" name="cname" placeholder="Employee Name" required><br>

					<p>Email: </p>
					<input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Email Address" required><br>

					<p>Password: </p>
					<input type="password" name="psw" pattern=".{8,}" placeholder="Password" required><br><br>

					<input type="submit" name="addE" value="Add">
				</fieldset>
			</form>
		</div>
	</div>


	<div class="footer" style="padding-top: 20px;"> 

		<p style="text-align: center;margin-bottom: 10px;"><script>document.write(new Date().getFullYear());</script> All rights reserved</p>

	</div>

<script src="../../js/admin.js"></script>
</body>
</html>