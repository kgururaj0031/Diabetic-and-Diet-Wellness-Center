<?php

require "connect.php";

require "C:/xampp/htdocs/myfiles/PHPMailer/src/PHPMailer.php";
require "C:/xampp/htdocs/myfiles/PHPMailer/src/Exception.php";
require "C:/xampp/htdocs/myfiles/PHPMailer/src/OAuth.php";
require "C:/xampp/htdocs/myfiles/PHPMailer/src/SMTP.php";

session_start();

$signs = '';

if(isset($_SESSION['disease']))
{
	$signs = $_SESSION['disease'];
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
					<!--/.navbar-collapse-->
					<!--/.navbar-->
				</div>
			</nav>
		</div>
	</div>
	<!-- banner -->
<div class="banner_inner_content_agile_w3l">
	
</div>
		<!--//banner -->
	<div class="w3ls-banner">
	<div class="heading">
		<h1>Below is the result of your symptom analysis</h1>
	</div>
		<div class="container_1">
			<label class="form-label1">
								Symptom Analysis Result:
							</label>
							<div class="form-input2">
								<?php if($signs == 'Type1') 
										echo '<li><p>You are showing signs of having Type 1 diabetes!</p></li>'; 
									else if($signs == 'Type2')
										echo '<li><p>You are showing signs of having Type 2 diabetes!</p></li>';
									else if($signs == 'Type1&Nutrition')
										echo '<li><p>You are showing signs of having Type 1 diabetes and excessive weight loss!</p></li>';
									else if($signs == 'Type2&Nutrition')
										echo '<li><p>You are showing signs of having Type 1 diabetes and excessive weight gain!</p></li>';
									else if($signs == 'Gestational')
										echo '<li><p>You are showing signs of having Gestational diabetes!</p></li>';
									else if($signs == 'Nutritionist')
										echo '<li><p>It is suggested that you visit a Nutritionist for your diet!</p></li>';
									else if($signs == 'None')
										echo '<li><p>You do not show signs of diabetes. Please visit a physician! </p></li>';
								?>
							</div>
							</br>
							<h3> From the above analysis made, you could consider to visit the following doctor.
							</br>
            <label class="form-label1">
								Doctors you can consult:
							</label>
							<div class="form-input2">
							<?php if($signs == 'Type1')
							{

										require "connect.php";

										require "C:/xampp/htdocs/myfiles/PHPMailer/src/PHPMailer.php";
										require "C:/xampp/htdocs/myfiles/PHPMailer/src/Exception.php";
										require "C:/xampp/htdocs/myfiles/PHPMailer/src/OAuth.php";
										require "C:/xampp/htdocs/myfiles/PHPMailer/src/SMTP.php";

										session_start();
										error_reporting(E_ERROR | E_PARSE);
	
										$query="select name,specialization from doctor_info where specialization='Endocrinologist' or specialization='Pediatrician'";
										$result=mysqli_query($conn,$query) or die(mysqli_error());
										
										if ($result = $conn->query($query)) {

											echo "<table style='width:100%;' cellspacing=0 cellpading=0>
											<tr>
											<th>Doctor</th>
											<th>Specialization</th> 
											</tr>";
											while ($row = $result->fetch_assoc()) {

											
											echo "<tr><td><font color=green>".$row["name"]."</font></td><td><font color=green>".$row["specialization"]."</font></td></tr>";
											
										}
										echo "</table>";
									}
							}
							else if($signs == 'Type2')
							{
	
										$query="select name,specialization from doctor_info where specialization='Endocrinologist'";
										$result=mysqli_query($conn,$query) or die(mysqli_error());
										
										if ($result = $conn->query($query)) {

											echo "<table style='width:100%;' cellspacing=0 cellpading=0>
											<tr>
											<th>Doctor</th>
											<th>Specialization</th> 
											</tr>";
											while ($row = $result->fetch_assoc()) {

											
											echo "<tr><td><font color=green>".$row["name"]."</font></td><td><font color=green>".$row["specialization"]."</font></td></tr>";
											
										}
										echo "</table>";
									}
							}
							else if($signs == 'Type1&Nutrition')
							{
										$query="select name,specialization from doctor_info where specialization='Endocrinologist' or specialization = 'Dietician' or specialization = 'Pediatrician'";
										$result=mysqli_query($conn,$query) or die(mysqli_error());

										if ($result = $conn->query($query)) {

											echo "<table style='width:100%;' cellspacing=0 cellpading=0>
											<tr>
											<th>Doctor</th>
											<th>Specialization</th> 
											</tr>";
											while ($row = $result->fetch_assoc()) {

											
											echo "<tr><td><font color=green>".$row["name"]."</font></td><td><font color=green>".$row["specialization"]."</font></td></tr>";
											
										}
										echo "</table>";
									}
							}
							else if($signs == 'Type2&Nutrition')
							{
										$query="select name,specialization from doctor_info where specialization='Endocrinologist' or specialization = 'Dietician'";
										$result=mysqli_query($conn,$query) or die(mysqli_error());
										if ($result = $conn->query($query)) {

											echo "<table style='width:100%;' cellspacing=0 cellpading=0>
											<tr>
											<th>Doctor</th>
											<th>Specialization</th> 
											</tr>";
											while ($row = $result->fetch_assoc()) {

											
											echo "<tr><td><font color=green>".$row["name"]."</font></td><td><font color=green>".$row["specialization"]."</font></td></tr>";
											
										}
										echo "</table>";
									}								
							}

							else if($signs == 'Gestational')
							{
										$query="select name,specialization from doctor_info where specialization='Endocrinologist' or specialization = 'Obstetrician/Gynecologist'";
										$result=mysqli_query($conn,$query) or die(mysqli_error());
										if ($result = $conn->query($query)) {

											echo "<table style='width:100%;' cellspacing=0 cellpading=0>
											<tr>
											<th>Doctor</th>
											<th>Specialization</th> 
											</tr>";
											while ($row = $result->fetch_assoc()) {

											
											echo "<tr><td><font color=green>".$row["name"]."</font></td><td><font color=green>".$row["specialization"]."</font></td></tr>";
											
										}
										echo "</table>";
									}								
							}

							else if($signs == 'Nutritionist')
							{
										$query="select name,specialization from doctor_info where specialization='Nutrition' or specialization = 'General Physician'";
										$result=mysqli_query($conn,$query) or die(mysqli_error());

										if ($result = $conn->query($query)) {

											echo "<table style='width:100%;' cellspacing=0 cellpading=0>
											<tr>
											<th>Doctor</th>
											<th>Specialization</th> 
											</tr>";
											while ($row = $result->fetch_assoc()) {

											
											echo "<tr><td><font color=green>".$row["name"]."</font></td><td><font color=green>".$row["specialization"]."</font></td></tr>";
											
										}
										echo "</table>";
									}							
							}

							else if($signs == 'None')
							{
										
										$query="select name,specialization from doctor_info where specialization='General Physician'";
										$result=mysqli_query($conn,$query) or die(mysqli_error());

										if ($result = $conn->query($query)) {

											echo "<table style='width:100%;' cellspacing=0 cellpading=0>
											<tr>
											<th>Doctor</th>
											<th>Specialization</th> 
											</tr>";
											while ($row = $result->fetch_assoc()) {

											
											echo "<tr><td><font color=green>".$row["name"]."</font></td><td><font color=green>".$row["specialization"]."</font></td></tr>";
											
										}
										echo "</table>";
									}								
							}
							
							?>

							</div>								
			<div class="agile-form">
				<form action="book_appointment.php" method="post">
					<input type="submit" value="Book an appointment">
				</form>	
			</div>
		</div>
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