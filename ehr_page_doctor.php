<?php
	require "connect.php";

	require "C:/xampp/htdocs/myfiles/PHPMailer/src/PHPMailer.php";
	require "C:/xampp/htdocs/myfiles/PHPMailer/src/Exception.php";
	require "C:/xampp/htdocs/myfiles/PHPMailer/src/OAuth.php";
	require "C:/xampp/htdocs/myfiles/PHPMailer/src/SMTP.php";

	session_start();
	error_reporting(E_ERROR | E_PARSE);

	$streetAddress='';
	$streetLine2='';
	$city='';
	$state='';
	$zipCode='';
	$country='';
	$name='';
	$gender='';
	$dateOfBirth='';
	$phoneNumber='';
	$email='';
	$height='';
	$weight='';
	$bp='';
	$glucose='';
	$typeOfDisease='';
	$history='';
	$medication='';
	$doctor='';
	$medications='';
	$medication_status='';
	
	$username = $_SESSION['username'];

	$_SESSION['sessionStartTime']=time();
	
	$dbName="d&d";
	$query="select name,gender,date_of_birth,phone_number,email,height,weight,StreetAddress,StreetLine2,City,State,Zip_Code,Country,BP,Glucose,doctor,family_history,under_medication,type_of_disease,medication_details,medication_status from patient_info where username='$username'";
	$result=mysqli_query($conn,$query) or die(mysqli_error());

	if ($result = $conn->query($query)) 
	{
		if ($row = $result->fetch_assoc()) 
		{
			$name = $row["name"];
			$gender = $row["gender"];
			$dateOfBirth = $row["date_of_birth"];
			$phoneNumber = $row["phone_number"];
			$email = $row["email"];
			$height = $row["height"];
			$weight = $row["weight"];
			$streetAddress = $row["StreetAddress"];
			$streetLine2 = $row["StreetLine2"];
			$city = $row["City"];
			$state = $row["State"];
			$zipCode = $row["Zip_Code"];
			$country = $row["Country"];
			$bp = $row["BP"];
			$glucose = $row["Glucose"];
			$doctor = $row["doctor"];
			$history = $row["family_history"];
			$medication = $row["under_medication"];
			$typeOfDisease = $row["type_of_disease"];
			$medications = $row["medication_details"];
			$medication_status = $row["medication_status"];
		}
	}

?>


<!DOCTYPE html>
<html>

<head>
	<style>
	#myTable {
	border-collapse: collapse;
	width: 150%;
	 margin-left:auto; 
    margin-right:auto;
	border: 1px solid #ddd;
	font-size: 18px;
	}
	.container_2{
	width: 800px;
	margin: auto;
	padding: 30px 30px 30px;
    box-sizing: border-box;
	
	}
	</style>
	<title>D&D : EHR Page</title>
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
			<div class="header_right">
				<ul class="forms_right">					
					
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

	<!-- banner -->
<div class="banner_inner_content_agile_w3l">
	
</div>
<div class="w3ls-banner">
<div class="heading">
		<h1>ELECTRONIC HEALTH RECORD</h1>
</div>
	<div class="container_2">
	
	<form action="doctormain.html" method="post">
		<table id="myTable">
			<img src="images/logo2.png" alt=" " class="img-responsive" />
			
			<br>
			
			<tr>
				<td><label>Username</label></td>
				<td>
				<?php echo "<p>".$username."</p>";?> 
				</td>
				<td><label>Name</label></td>
				<td>
				<?php echo "<p>".$name."</p>";?> 
				</td>
			</tr>
			<tr>
				<td><label>Gender</label></td>
				<td>
				<?php echo "<p>".$gender."</p>";?> 
				</td>
				<td><label> Date Of Birth</label></td>
				<td>
				<?php echo "<p>".$dateOfBirth."</p>";?> 
				</td>
			</tr>
			<tr>
				<td><label> Phone Number</label></td>
				<td>
				<?php echo "<p>".$phoneNumber."</p>";?> 
				</td>
				<td><label>E-mail</label></td>
				<td>
				<?php echo "<p>".$email."</p>";?> 
				</td>
			</tr>
			<tr>
				<td><label>Street Address</label></td>
				<td><?php echo "<p>".$streetAddress."</p>";?> </td>
				<td><label>Street Line 2</label></td>
				<td>
				<?php echo "<p>".$streetLine2."</p>";?> 
				</td>
			</tr>
			<tr>
				<td><label>City</label></td>
				<td>
				<?php echo "<p>".$city."</p>";?> 
				</td>
				<td><label>State</label></td>
				<td>
				<?php echo "<p>".$state."</p>";?> 
				</td>
			</tr>
			<tr>
				<td><label>Zip Code</label></td>
				<td>
				<?php echo "<p>".$zipCode."</p>";?> 
				</td>
				<td><label>Country</label></td>
				<td>
				<?php echo "<p>".$country."</p>";?> 
				</td>
			</tr>
			<tr>
				<td><label>Height</label></td>
				<td><?php echo "<p>".$height."</p>";?></td>
				<td><label>Weight</label></td>
				<td><?php echo "<p>".$weight."</p>";?></td>
			</tr>
			<tr>
				<td><label>Blood Pressure</label></td>
				<td><?php echo "<p>".$bp."</p>";?></td>
				<td><label>Glucose</label></td>
				<td>
				<?php echo "<p>".$glucose."</p>";?> 
				</td>
			</tr>
			<tr>
				<td><label>Doctor</label></td>
				<td>
				<?php echo "<p>".$doctor."</p>";?> 
				</td>
				<td><label>Family History</label></td>
				<td><?php echo "<p>".$history."</p>";?>
				</td>
			</tr>
			<tr>
				<td><label>Under Medication</label></td>
				<td>
					<?php echo "<p>".$medication."</p>";?>
				</td>
				<td><label>Doctors Consulted</label></td>
				<td>
					<?php echo "<p>".$doctor."</p>";?>
				</td>
			</tr>
			<tr>
				<td><label>Medication Received</label></td>
				<td>
					<?php echo "<p>".$medications."</p>";?>
				</td>
				<td><label>Medication Status</label></td>
				<td>
					<?php echo "<p>".$medication_status."</p>";?>
				</td>
			</tr>
		</table>
		<input type="submit" value="Back to dashboard">
	</form>
	</div>
</div>
<div class="footer_top_agile_w3ls">
		<div class="container">
			<div class="col-md-4 footer_grid">
				<h3>About Us</h3>
				<p>We are a Non Profit Organization,Working towards the welfare of the human race.</p>				
			</div>
			<!--div class="col-md-3 footer_grid">
				<h3>Latest News</h3>
				<ul class="footer_grid_list">
					<li><i class="fa fa-angle-right" aria-hidden="true"></i>
						<a href="#" data-toggle="modal" data-target="#myModal">Lorem ipsum neque vulputate </a>
					</li>
					<li><i class="fa fa-angle-right" aria-hidden="true"></i>
						<a href="#" data-toggle="modal" data-target="#myModal">Dolor amet sed quam vitae</a>
					</li>
					<li><i class="fa fa-angle-right" aria-hidden="true"></i>
						<a href="#" data-toggle="modal" data-target="#myModal">Lorem ipsum neque, vulputate </a>
					</li>
				</ul>
			</div-->
			<div class="col-md-4 footer_grid">
				<h3>Contact Info</h3>
				<ul class="address">
					<li><i class="fa fa-map-marker" aria-hidden="true"></i>Thunder Bay,Canada </li>
					<li><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:customer.care@d2r.com">customer.care@r2r.com</a></li>
					<li><i class="fa fa-phone" aria-hidden="true"></i>+1 807 123 1234</li>
				</ul>
			</div>
			<div class="col-md-4 footer_grid ">
				<h3>Sign up for our Newsletter</h3>
				<p>Get Started For Free</p>
				<div class="footer_grid_right">

					<form action="#" method="post">
						<input type="email" name="Email" placeholder="Email Address..." required="">
						<input type="submit" value="Submit">
					</form>
				</div>
			</div>
			<div class="clearfix"> </div>

		</div>
	</div>
	<div class="footer_wthree_agile">
		<p>© 2018 Road2Recovery. All rights reserved </p>
	</div>
	<!-- //footer -->
	<!-- bootstrap-modal-pop-up -->
	<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					New Clinic
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
					<div class="modal-body">
						<img src="images/g7.jpg" alt=" " class="img-responsive" />
						<p>Ut enim ad minima veniam, quis nostrum 
							exercitationem ullam corporis suscipit laboriosam, 
							nisi ut aliquid ex ea commodi consequatur? Quis autem 
							vel eum iure reprehenderit qui in ea voluptate velit 
							esse quam nihil molestiae consequatur, vel illum qui 
							dolorem eum fugiat quo voluptas nulla pariatur.
							<i>" Quis autem vel eum iure reprehenderit qui in ea voluptate velit 
								esse quam nihil molestiae consequatur.</i></p>
					</div>
			</div>
		</div>
	</div>
<!-- //bootstrap-modal-pop-up --> 
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