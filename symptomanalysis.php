<?php

require "connect.php";

require "C:/xampp/htdocs/myfiles/PHPMailer/src/PHPMailer.php";
require "C:/xampp/htdocs/myfiles/PHPMailer/src/Exception.php";
require "C:/xampp/htdocs/myfiles/PHPMailer/src/OAuth.php";
require "C:/xampp/htdocs/myfiles/PHPMailer/src/SMTP.php";

session_start();
error_reporting(E_ERROR | E_PARSE);
	$history=$_POST['history'];
	$urination=$_POST['name'];
	$thirsthunger=$_POST['thirsthunger'];
	$tinglingnumbness=$_POST['tinglingnumbness'];
	$age=$_POST['age'];
	$fatigue=$_POST['fatigue'];
	$weightloss=$_POST['weightloss'];
	$bp=$_POST['bp'];
	$weightgain=$_POST['weightgain'];
	$pregnant=$_POST['pregnant'];
	$infection=$_POST['infection'];
	
	$disease='';

if(isset($_POST['submit']) && $_POST['submit']=='submit')	{
	
echo "Hii!";

if(($pregnant == 'Yes' and $infection == 'Yes' and $urination == 'Yes' and $thirsthunger == 'Yes') or ($pregnant == 'Yes' and $infection == 'Yes' and $tinglingnumbness == 'Yes' and $thirsthunger == 'Yes') or ($pregnant == 'Yes' and $infection == 'Yes' and $urination == 'Yes' and $tinglingnumbness == 'Yes'))
{
		$disease = 'Gestational';
}
elseif(($urination == 'Yes' and $thirsthunger == 'Yes' and $age == 'Below18') or ($thirsthunger == 'Yes' and $tinglingnumbness == 'Yes' and $age == 'Below18') or ($urination == 'Yes' and $tinglingnumbness == 'Yes' and $age == 'Below18'))
{
	  if($weightloss == 'Yes')
			$disease = 'Type1&Nutrition';
	  else
			$disease = 'Type1';
}
elseif(($urination == 'Yes' and $thirsthunger == 'Yes' and $age == 'Above18') or ($thirsthunger == 'Yes' and $tinglingnumbness == 'Yes' and $age == 'Above18') or ($urination == 'Yes' and $tinglingnumbness == 'Yes' and $age == 'Above18'))
{
		if($weightgain == 'Yes')
			$disease = 'Type2&Nutrition';
		else
			$disease = 'Type2';
}
elseif($age == 'Below18' && $fatigue == 'Yes' && $weightloss == 'Yes')
{
		$disease = 'Type1&Nutrition';
}
elseif($age == 'Above18' and $bp == 'Yes' and $weightgain == 'Yes')
{
		$disease = 'Type2&Nutrition';
}
elseif($pregnant == 'Yes' and $infection == 'Yes' )
{
	$disease = 'Gestational';
}
elseif($weightgain == 'Yes' or $weightloss == 'Yes')
{
		$disease = 'Nutritionist';
}
else
	$disease = 'None';
	
$_SESSION['disease']=$disease;

header('Location:symptomanalysisresult.php');
	
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
<div class="banner_inner_content_agile_w3l">
	
</div>
	<!--//banner -->
	<div class="w3ls-banner">
	<div class="heading">
		<h1>SYMPTOM ANALYSIS</h1>
	</div>
		<div class="container_1">
			<div class="heading">
				<h2>Please Enter Your Symptoms Below</h2>
				
			</div>
			<div class="agile-form">
				<form action="symptomanalysis.php" method="post">
					<ul class="field-list">	
						<li class="last-type"> 
							<label class="form-label1">
								Do you have family history of diabetes?
								<span class="form-required"> * </span>
							</label>
							<div class="form-input">
								<select class="form-dropdown" name="history" id="history" required>
									<option value="">&nbsp;</option>
									<option value="Yes"> Yes </option>
									<option value="No"> No </option>
								</select>
							</div>
						</li>	
						<li class="last-type"> 
							<label class="form-label1">
								Are you experiencing frequent urination?
								<span class="form-required"> * </span>
							</label>
							<div class="form-input">
								<select class="form-dropdown" name="urination" id="urination" required>
									<option value="">&nbsp;</option>
									<option value="Yes"> Yes </option>
									<option value="No"> No </option>
								</select>
							</div>
						</li>					
						<li class="last-type"> 
							<label class="form-label1">
								Are you experiencing excessive thirst and hunger?
								<span class="form-required"> * </span>
							</label>
							<div class="form-input">
								<select class="form-dropdown" name="thirsthunger" id="thirsthunger" required>
									<option value="">&nbsp;</option>
									<option value="Yes"> Yes </option>
									<option value="No"> No </option>
								</select>
							</div>
						</li>					
						<li class="last-type"> 
							<label class="form-label1">
								Are you experiencing tingling and numbness in feet?
								<span class="form-required"> * </span>
							</label>
							<div class="form-input">
								<select class="form-dropdown" name="tinglingnumbness" id="tinglingnumbness" required>
									<option value="">&nbsp;</option>
									<option value="Yes"> Yes </option>
									<option value="No"> No </option>
								</select>
							</div>
						</li>											
						<li class="last-type"> 
							<label class="form-label1">
								Select your age range below
								<span class="form-required"> * </span>
							</label>
							<div class="form-input">
								<select class="form-dropdown" name="age" id="age" required>
									<option value="">&nbsp;</option>
									<option value="Below18"> Below 18 </option>
									<option value="Above18"> Above 18 </option>
								</select>
							</div>
						</li>

						<li class="last-type"> 
							<label class="form-label1">
								If you are below 18 years, have you experienced fatigue and weakness?
								<span class="form-required"> * </span>
							</label>
							<div class="form-input">
								<select class="form-dropdown" name="fatigue" id="fatigue" >
									<option value="">&nbsp;</option>
									<option value="Yes"> Yes </option>
									<option value="No"> No </option>
								</select>
							</div>
						</li>
						<li class="last-type"> 
							<label class="form-label1">
								If you are below 18 years, have you noticed sudden weight loss?
								<span class="form-required"> * </span>
							</label>
							<div class="form-input">
								<select class="form-dropdown" name="weightloss" id="weightloss" >
									<option value="">&nbsp;</option>
									<option value="Yes"> Yes </option>
									<option value="No"> No </option>
								</select>
							</div>
						</li>
						<li class="last-type"> 
							<label class="form-label1">
								If you are above 18 years, have you experineced frequent rise in bp?
								<span class="form-required"> * </span>
							</label>
							<div class="form-input">
								<select class="form-dropdown" name="bp" id="bp" >
									<option value="">&nbsp;</option>
									<option value="Yes"> Yes </option>
									<option value="No"> No </option>
								</select>
							</div>
						</li>
						<li class="last-type"> 
							<label class="form-label1">
								If you are above 18 years, have you noticed sudden weight gain?
								<span class="form-required"> * </span>
							</label>
							<div class="form-input">
								<select class="form-dropdown" name="weightgain" id="weightgain" >
									<option value="">&nbsp;</option>
									<option value="Yes"> Yes </option>
									<option value="No"> No </option>
								</select>
							</div>
						</li>
						<li class="last-type"> 
							<label class="form-label1">
								Are you pregnant?
								<span class="form-required"> * </span>
							</label>
							<div class="form-input">
								<select class="form-dropdown" name="pregnant" id="pregnant" required>
									<option value="">&nbsp;</option>
									<option value="Yes"> Yes </option>
									<option value="No"> No </option>
								</select>
							</div>
						</li>
												<li class="last-type"> 
							<label class="form-label1">
								If you are pregnant, do you experience frequent vaginal and bladder infection?
								<span class="form-required"> * </span>
							</label>
							<div class="form-input">
								<select class="form-dropdown" name="infection" id="infection">
									<option value="">&nbsp;</option>
									<option value="Yes"> Yes </option>
									<option value="No"> No </option>
								</select>
							</div>
						</li>
						</br>						
					</ul>
					<h4>This process analyzes your symptoms to only predict the type of diabetes you may have.
				Kindly book an appointment with the doctor to get the same tested.</h4>
					<input type="submit" value="submit" id="submit" name="submit">
				</form>	
			</div>
		</div>
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
