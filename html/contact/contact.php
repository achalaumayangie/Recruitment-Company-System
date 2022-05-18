<?php
$alert = "";
include_once("../lib/config.php");

if (isset($_POST['sub'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$msg = $_POST['msg'];

	$sql = "SELECT MAX(co_id) AS mid FROM contact_request;";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	$mid =  $row['mid'] + 1;

	$sql = "INSERT INTO contact_request VALUES('$mid','$name','$email','$msg')";

	if ($conn->query($sql) == TRUE) {
		$alert = "Request Sent Successfully!";
	}else{
		$alert = "Can't send please try again!";
		echo $conn->error;
	}
}

?>
<!DOCTYPE html>
<html>
  <head>
    <title> Contact us page </title> <br><br>
	<meta charset="utf-8">  
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="../../css/basic.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../../css/style.css">  	
<style>   
 input[type=text], input[type=password] {   
        width: 70%;   
        margin: 1px 3px;  
        padding: 14px 22px;   
        display: inline-block; 
        border: 6px #09dd09;   
        box-sizing: border-box;
    }  
	 form {   
        text-align: center;
		width: 100%;
		margin-top: 50px;
		border: 0px;
		}
	div {
		width: 100%;
		}

    </style>   
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
		
		<center><h1> Contact Us Now!</h1></center>
      <div>
        	<h3 style="text-align: center;"><?php echo $alert;?></h3>
          <div id= "left"><br><br>
		  <form method="POST">
            <label>Name</label><br><br>
            <input type= "text" placeholder="enter your name" name="name" required >
	<br><br>
            <label>Email Address</label><br><br>
            <input type= "text" placeholder="enter your Email address" name="email" required >
	<br><br>
              <label>Message</label><br><br>
              <textarea id ="name" cols= "50" rows="8" placeholder = "comment" name="msg"></textarea>
              <input type="submit" name="sub" value="Send">
			</form>
          </div>

        <div id= "right"><br><br>
				
				<div> 
				<p><h2>we are here,</h2>
                <h3>vaca vacancies<br><br></h3>
				
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.3536382468583!2d79.92335591409515!3d6.848142321205617!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2507a18263a73%3A0xe4de7c8d85adad1d!2sMaharagama%20Bus%20Station!5e0!3m2!1sen!2slk!4v1601290673690!5m2!1sen!2slk" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div>
				<div>
                

                <h4> 132/2,<br>
                    Highlevel Road,<br>
                    Nugegoda.<br><br><br>

                    Tele No- 0112345654<br>
                    Fax No - 0112345655  <br>
                    
                    email: vacavacancies5@gmail.com<br>
                    </h4></p>
					</div>
         </div>
          
		  </div>
		  
		  </div>

<br>
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

		<div class="column" style="width: 100%; text-align: center;">
			<hr>
			<p><script>document.write(new Date().getFullYear());</script> All rights reserved</p>
		</div>

	</div>
          </body>     
</html>  


