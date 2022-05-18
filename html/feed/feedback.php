<?php
$alert = "";
if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$mail = $_POST['mail'];
	$msg = $_POST['msg'];

	include_once("../lib/config.php");

	$sql = "SELECT MAX(fid) AS mid FROM feedback;";
	$mid = ($conn->query($sql))->fetch_assoc()['mid']+1;

	$sql = "INSERT INTO feedback(fid, name, mail, description) VALUES ($mid,'$name','$mail','$msg')";

	if ($conn->query($sql) == TRUE) {
		$alert = "FeedBack Added!";
	}else{
		$alert = "Cannot Send FeedBack Please Try again later!";
		die($conn->error);
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>VaCa Vacancies</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/sha1.css"> 
	<link rel="stylesheet" type="text/css" href="../../css/basic.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
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
					<a href="">Login</a>
				</li>
			</ul>
	</div>

<div class = "review">
<div class="sha">
<h2> feedbacks</h2>  
</div> 

<br><br><br>
<?php
include_once("../lib/config.php");

$sql = "SELECT * FROM feedback;";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
	echo '
	<h3 style="font-size: 15px;">'.$row['name'].'</h3>
	<p>'.$row['description'].'</p>
	<hr>
	';
}

?>


</div> 
  
<div class="container"> 
	<h3 style="text-align: center;"><?php echo $alert;?></h3>
<div class="sh">
<center>
	<h2>your feedback!</h2></center> 
</div class="sh"> 
  
  <form method="POST">    
    <div class="row">    
      <div class="col-25">    
        <label for="fname"> Name</label>    
      </div>    
      <div class="col-75">    
        <input type="text" id="fname" name="name" placeholder="Input name here">    
      </div>    
    </div>    
   
    <div class="row">    
        <div class="col-25">    
          <label for="email">E-mail</label>    
        </div>    
        <div class="col-75">    
          <input type="email" id="email" name="mail" placeholder="ex:example@name.com">    
        </div>    
      </div>    
          
    <div class="row">    
      <div class="col-25">    
        <label for="feed_back">Type feedback</label>    
      </div>    
      <div class="col-75">    
        <textarea id="subject" name="msg" placeholder="input text here" style="height:150px"></textarea>    
      </div>    
    </div>    
    <div class="row">    
      <input type="submit" value="Submit" name="submit">    
    </div>    
  </form>    
</div>
	<div class="content">
		
		<!--page content-->

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