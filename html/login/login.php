<?php
$msg = "";
if (isset($_POST['button'])) {
	$mail = $_POST['email'];
	$pwd = $_POST['pwd'];
	$pwd = md5($pwd);

	include_once("../lib/config.php");

	//cheking wather user is employee user
	$sql = "SELECT eid FROM employee WHERE mail='$mail' AND psw='$pwd' AND status=1";
	$result_emp = $conn->query($sql);

	//cheking weather user is company user
	$sql = "SELECT cid FROM company WHERE mail='$mail' AND psw='$pwd' AND status=1";
	$result_com = $conn->query($sql);

	if ($result_emp->num_rows>0) {
		$row = $result_emp->fetch_assoc();

		session_start();
		$_SESSION['emp'] = $row['eid'];

		header("location:../userProfile/userProfile.php");

	}elseif($result_com->num_rows>0){
		$row = $result_com->fetch_assoc();

		session_start();
		$_SESSION['com'] = $row['cid'];

		header("location:../companyDash/companyDash.php");

	}elseif($mail == 'admin@gmail.com' AND $pwd == 'e10adc3949ba59abbe56e057f20f883e'){
		session_start();
		$_SESSION['admin'] = 'admin';

		header("location:../admin/admin.php");
	}else{
		$msg = "Invalid Details!";
	}
}

?>
<!DOCTYPE html>   
<html>   
<head>  

<title> Login Page </title> 

	<meta charset="utf-8">  
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="../../css/basic.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="../../css/style.css">  	
	<script src="../../js/myscript.js"></script>

</head>    
   
<body> 

    <div class="nav">


		<a href="index.html"><img src="../../images/logo.png"></a>
			
			<ul class="links">
				
				
				<li><a href="../">Home</a></li>
				
				<li><a href="../about/about.html">About</a></li>
				
				<li class="gbutton"><a href="../register/register.html">Register</a></li>
				
				<li class="gbutton"><a href="../login/login.php">Login</a></li>
				
			</ul>
	</div>

	
	<div class="content">
		   
        <center> 
		<h1> Login To Your Account </h1>
        <h3> Enter Your Details To Login</h3>
        <h4><?php echo $msg;?></h4> 
		</center> 
    

    <center>	
    
	    <form target="_self"  method="post" onsubmit="return checkpassword()"><br><br>
       
            EMAIL ADDRESS: <br>
		    <input type="email" id="emailAdd" name="email" placeholder="Enter your email address"  pattern= "[a-zA-Z0-9._%+-]+@[a-z0-9]+\.[a-z]{2,3}" required><br><br>
            
            PASSWORD : <br>
           	<input type="password"  id="pwd" name="pwd" placeholder="Enter password"  pattern= "[a-z0-9]{5,8}" required><br><br>
            
			Re-enter PASSWORD : <br>
            <input type="password"  id="rpwd" name="rpwd" placeholder="Enter password"  pattern=  "[a-z0-9]{5,8}" required><br> <br>    

            Accept Terms and conditions
		    <input type="checkbox" id="terms" name="terms" required onclick="enablebutton()"><br><br>
             
             
		    <input type="submit" id="button" name="button" value="Login">
				
            <br><br>            
            Forgot <a href="#"> password? </a> <br><br>
            Not a member? <a href="#"> Register Here </a><br><br>
             
    
		
        </form>   
    </center>
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
