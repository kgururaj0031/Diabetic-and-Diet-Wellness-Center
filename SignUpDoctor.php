<?php

require "connect.php";

require "C:/xampp/htdocs/myfiles/PHPMailer/src/PHPMailer.php";
require "C:/xampp/htdocs/myfiles/PHPMailer/src/Exception.php";
require "C:/xampp/htdocs/myfiles/PHPMailer/src/OAuth.php";
require "C:/xampp/htdocs/myfiles/PHPMailer/src/SMTP.php";

session_start();
error_reporting(E_ERROR | E_PARSE);
	$username=$_POST['username'];
	$name=$_POST['name'];
	$gender=$_POST['gender'];
	$dateOfBirth=$_POST['dateOfBirth'];
	$phoneNumber=$_POST['phoneNumber'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$streetAddress=$_POST['streetAddress'];
	$streetLine2=$_POST['streetLine2'];
	$city=$_POST['city'];
	$state=$_POST['state'];
	$zipCode=$_POST['zipCode'];
	$country=$_POST['country'];
	$specialization=$_POST['specialization'];
	$qualification=$_POST['qualification'];
	
	$completeError=array();


if(isset($_POST['submit']) && $_POST['submit']=='submit')	{
	
  	$query="select username from login_doctor where username='$username'";
	$result=mysqli_query($conn,$query) or die(mysqli_error());
	$rows=mysqli_fetch_row($result);

	$numberOfRows=mysqli_num_rows($result);

	if($numberOfRows>1)  {
		$completeError[]='Username already exists!';
	}
		
  if(count($completeError)>0) {?>
		<html><body><div class="container errorbox"><p style="background:yellow">Please fix the following errors:
	 <?php
	foreach($completeError as $displayError)	{
		echo '<li><p style="background:yellow">'.$displayError.'</p></li>';
	}
	echo '</p></ul></div></body></html>';	
	
  }
  else{	
  
	$_SESSION['username']=$username;
	$_SESSION['sessionStartTime']=time();
	
	$dbName="d&d";
	$query="insert into doctor_info(name,gender,date_of_birth,phone_number,email,qualification,specialization,password,username,StreetAddress,StreetLine2,City,State,Zip_Code,Country) values ('$name','$gender','$dateOfBirth','$phoneNumber','$email','$qualification','$specialization','$password','$username','$streetAddress','$streetLine2','$city','$state','$zipCode','$country')";
	$result=mysqli_query($conn,$query) or die(mysqli_error());
	$query="insert into login_doctor(username,password) values('$username','$password')";
	$result=mysqli_query($conn,$query) or die(mysqli_error());
	$_SESSION['username']=$username;
	
	header('Location:index.html');

  }
}	
?>

<!DOCTYPE html>
<html>

<head>
	<title>D&D</title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="New Clinic Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--//tags -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/appointment_style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- //for bootstrap working -->
	<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,600i,700" rel="stylesheet">
</head>

<body>
	<!-- header -->
	<div class="header" id="home">
		<div class="top_menu_w3layouts">
<div class="container">
			<div class="header_left">
				<ul>
					<li><i class="fa fa-map-marker" aria-hidden="true"></i>Thunder Bay,Canada </li>
					<li><i class="fa fa-phone" aria-hidden="true"></i>+1 807 001 1234</li>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:info@example.com">contact@dd.com</a></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
			</div>
		</div>

		<div class="content white">
			<nav class="navbar navbar-default" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
						<a class="navbar-brand" href="index.html">
							<h1><span class="fa fa-stethoscope" aria-hidden="true"></span>D&D </h1>
						</a>
					</div>
					<!--/.navbar-header-->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<nav>
							<ul class="nav navbar-nav">
								<li><a href="index.html" >Home</a></li>
								<li><a href="about.html" class="active">About</a></li>	
								<li><a href="faq.html" class="active">FAQs</a></li>		
								<li><a href="mail.html">Mail Us</a></li>
								<li><a href="doctor.html">Doctor</a></li>								
									</ul>
								
						</nav>
					</div>
					<!--/.navbar-collapse-->
					<!--/.navbar-->
				</div>
			</nav>
		</div>
	</div>
		<!--//banner -->
	<div class="w3ls-banner">
	<div class="heading">
		<h1>Sign Up for Doctors</h1>
	</div>
		<div class="container_1">
			<div class="heading">
				<h2>Please Enter Doctors Details</h2>
			</div>		
			<div class="agile-form">
				<form action="SignUpDoctor.php" method="post">
					<ul class="field-list">
					<li>
							<label class="form-label"> 
								Username 
								<span class="form-required"> * </span>
							</label>
							<div class="form-input">
								<input type="text" name="username" id="username" placeholder="Username" required >
							</div>
						</li>
						<li>
							<label class="form-label"> 
								Password 
								<span class="form-required"> * </span>
							</label>
							<div class="form-input">
								<input type="password" name="password" id="password" placeholder="Password" required >
							</div>
						</li>
						<li>
							<label class="form-label"> 
								Name 
								<span class="form-required"> * </span>
							</label>
							<div class="form-input">
								<input type="text" name="name" id="name" placeholder="Enter Patients Name" required >
							</div>
						</li>
						<li>
							<label class="form-label">
							   Gender
							   <span class="form-required"> * </span>
							</label>
							<div class="form-input">
								<select class="form-dropdown" name="gender" id="gender" required>
									<option value="">&nbsp;</option>
									<option value="Male"> Male </option>
									<option value="Female"> Female </option>
								</select>
							</div>
						</li>
						<li>
							<label class="form-label">
							   Date of Birth
							   <span class="form-required"> * </span>
							</label>
							<div class="form-input">
								<input type="date" name="dateOfBirth" id = "dateOfBirth" placeholder="01-01-1994" required>
							</div>
						</li>
						<li> 
							<label class="form-label">
							   Address
							   <span class="form-required"> * </span>
							</label>
							<div class="form-input add">
								<span class="form-sub-label">
									<input type="text" name="streetAddress" id="streetAddress" placeholder=" " required>
									<label class="form-sub-label1"> Street Address </label>
								</span>
								<span class="form-sub-label">
									<input type="text" name="streetLine2" id="streetLine2" placeholder=" " required>
									<label class="form-sub-label1"> Street Line 2 </label>
								</span>
								<span class="form-sub-label">
									<input type="text" name="city" id="city" placeholder=" " required>
									<label class="form-sub-label1"> City </label>
								</span>
								<span class="form-sub-label">
									<input type="text" name="state" id="state" placeholder=" " required>
									<label class="form-sub-label1"> State / Province </label>
								</span>
								<span class="form-sub-label">
									<input type="text" name="zipCode" id="zipCode" placeholder=" " required>
									<label class="form-sub-label1"> Postal / Zip Code </label>
								</span>
								<span class="form-sub-label">
									<input type="text" name="country" id="country" placeholder=" " required>
									<label class="form-sub-label1"> Country </label>
								</span>
							</div>
						</li>
						<li> 
							<label class="form-label">
							   Phone Number
							   <span class="form-required"> * </span>
							</label>
							<div class="form-input">
								<input type="text" name="phoneNumber" id="phoneNumber" placeholder="Mobile Number" required >
							</div>
						</li>
						<li> 
							<label class="form-label">
							   E-Mail Address
							   <span class="form-required"> * </span>
							</label>
							<div class="form-input">
								<input type="email" name="email" id="email" placeholder="myname@example.com" required>
							</div>
						</li>
						<li> 
							<label class="form-label">
							   Qualification
							   <span class="form-required"> * </span>
							</label>
							<div class="form-input">
								<input type="text" name="qualification" id="qualification" placeholder="degrees" required>
							</div>
						</li>
												<li> 
							<label class="form-label">
							   Specialization
							   <span class="form-required"> * </span>
							</label>
							<div class="form-input">
								<select class="form-dropdown" name="specialization" id="specialization" required>
									<option value="">&nbsp;</option>
									<option value="Endocrinologist"> Endocrinologist </option>
									<option value="Dietician"> Dietician </option>
									<option value="Pediatrician"> Pediatrician </option>
									<option value="Obstetrician/Gynecologist"> Obstetrician/Gynecologist </option>
									<option value="General Physician"> General Physician </option>
								</select>
							</div>
						</li>

						<p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
						
						
					</ul>
					<input type="submit" value="submit" name = "submit" id = "submit">
				</form>	
			</div>
		</div>
</div>
        
      <button type="submit">SignUp</button>
    </div>

  </form>
</div>
<!-- //about -->
<!-- emergency -->
<div class="emergency_cases_w3ls">
<div class="emergency_cases_bt">
	<div class="container">
	<div class="emergency_cases_top">
		<div class="col-md-6 emergency_cases_w3ls_left">
			<h4>Customer Care Hours</h4>
			<h6>Monday - Friday&nbsp;<span class="eme">09.00 - 18.00</span></h6>
			<h6>Weekends &nbsp;<span class="eme">10.00 - 17.00</span></h6>
		</div>
		<div class="col-md-6 emergency_cases_w3ls_right">
			<h4>Consult a Doctor</h4>
			<h5><i class="fa fa-phone" aria-hidden="true"></i>+1 807 001 1234 </h5>
			<p>Clear all your queries about the donation process,with our set of qualified doctors.</p>
		</div>
		
		<div class="clearfix"></div>
		</div>
	</div>
	</div>
</div>
<!-- //emergency -->

	<div class="footer_wthree_agile">
		<p>© 2019 D&D. All rights reserved </p>

	</div>
<!-- //footer -->

<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script>
		$('ul.dropdown-menu li').hover(function () {
			$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
		}, function () {
			$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
		});
	</script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>
