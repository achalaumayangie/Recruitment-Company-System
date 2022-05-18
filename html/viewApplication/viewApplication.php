<?php
session_start();
if (!isset($_SESSION['com'])) {
	header("location:../login/login.php");
}else{
	$cid = $_SESSION['com'];
}

if (isset($_GET['logout'])) {
	session_destroy();
	header("location:../login/login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>VaCa Candidates Report</title>
	<meta charset="utf-8">  
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="../../css/basic.css">
	<link rel="stylesheet" type="text/css" href="../../css/canre.css">

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
		  <a href="#">Dashboard</a>
		  <a href="#">Add jobs</a>
		  <a href="#" class="active">Candidate Report</a>
		</div>
	  </div>

	  <br>
	<div class="main-Layout"> <br>
		<div class="main-heading">
		<h1><div class="comIcon">
				<i class="icon fa fa-address-card"></i>
				</div>	 YOUR CANDIDATES REPORT</h1><hr>
			</div>
			 <br>
			<div class="searchbar">
      				<input type="text" placeholder="Search.." name="search">
      				<button type="submit"><i class="fa fa-search"></i></button>
			</div> <br>
			<hr>
			<div class="table">
				<form method="POST">
				<center>
					<?php
					include("../lib/config.php");

					if (isset($_POST['see'])) {
						$vid = $_POST['see'];

						echo "<button type='submit' name='back'>Back</button>";

						echo'
						<table>
						<tr>
							<th>Name</th>
							<th>Address</th>
							<th>Birth Day</th>
							<th>Contact</th>
							<th>Mail</th>
							<th>Education</th>
							<th>Proffessional</th>
							<th>Addition</th>
							<th>Applied</th>
						</tr>';

						$sql = "SELECT * FROM apply a,employee e WHERE vid='$vid' AND a.eid=e.eid";
						$result = $conn->query($sql);

						if ($result->num_rows>0) {
							while ($row = $result->fetch_assoc()) {
								echo '
								<tr>
									<td>'.$row['name'].'</td>
									<td>'.$row['address'].'</td>
									<td>'.$row['birth'].'</td>
									<td>'.$row['contact'].'</td>
									<td>'.$row['mail'].'</td>
									<td>'.$row['edu_quli'].'</td>
									<td>'.$row['pro_quli'].'</td>
									<td>'.$row['adi_quli'].'</td>
									<td>'.substr($row['time'],0,16).'</td>
								</tr>
								';
							}
						}
						echo'
					</table>';
						
					}else{
						echo'
						<table>
						<tr>
							<th>No.</th>
							<th>Vacancy Type</th>
							<th>Applied Date</th>
							<th>View Report</th>
						</tr>';


						$sql = "SELECT * FROM vacancy WHERE cid='$cid'";
						$result = $conn->query($sql);

						if ($result->num_rows>0) {

							$i = 1;
							while ($row = $result->fetch_assoc()) {
								echo '
								<tr>
									<td>'.$i.'</td>
									<td>'.$row['title'].'</td>
									<td>'.substr($row['time'],0,10).'</td>
									<td><button value="'.$row['vid'].'" name="see">Get</button></td>
								</tr>
								';
								$i++;
							}
						}
					}
					
					echo'
				</table>';
				?>
				</center>
				

				</form>
			</div> 





	</div>

	</div>



<!--``````````````````````````````````````````````````````````````````````````-->



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