<?php
	include_once('connection.php');
session_start();

	// if(isset($_POST['login'])){
	// 	if(empty($_POST['username']) || empty($_POST['password'])){
	// 		$message="All fields are mandatory";
	// 	}
	// 	else{
	// 		if($_POST['username']=="mrd_msit" && $_POST['password']=="mrd_msit"){
	// 			header('location: mrd.php');
	// 		}
	// 		else if($_POST['username']=="rd_msit" && $_POST['password']=="rd_msit"){
	// 			header('location: rd.php');
	// 		}
	// 		else if($_POST['username']=="crd_msit" && $_POST['password']=="crd_msit"){
	// 			header('location: crd.php');
	// 		}
	// 		else{
	// 			$message="Invalid Username or Password";
	// 		}
	// 	}
	// }


	if(isset($_POST['login']))
{
	if(empty($_POST['email']) || empty($_POST['password']))
	{
		$message="ALL FIELDS ARE REQUIRED.";
	}
	else
	{
		$sql= "SELECT name,email,password FROM mrd WHERE email=:email AND password=:password";

		$query= $pdoconn->prepare($sql);
		$query->execute(

			array(
				 'email'=>$_POST["email"],
                'password'=>$_POST["password"]
			) 

		);
		 $count=$query->rowCount();
		 if($count>0)
		 {
		 	  $_SESSION['email']=$_POST['email'];
		 	  $_SESSION['password']=$_POST['password'];
            header('location: dashboard.php');
		 }
		 else{
		 	  $message='WRONG USERNAME OR PASSWORD.';
		 }
	}
}

$msg_error='';
if(isset($_REQUEST['msg']))
{
    $msg_error=$_REQUEST['msg'];
}

?>



<html>
	<head>
		<meta charset="UTF-8">
		<title>Participant Login | MSIT</title>
		<meta name="description" content="College Fest at the MSIT University Which is known as Technovert">

		<link rel="icon" type="image/png" href="images/logo.png" />

		<!--Custom CSS-->
		<link rel="stylesheet" href="style.css">

		<!--Font-->
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;500&display=swap" rel="stylesheet">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Awesome Font -->
		<link href="font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css"/>

		<!-- Loading CSS -->
		<link href="CSS/loading.css" rel="stylesheet" type="text/css"/>

		<!-- BootStrap CDN -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link href="CSS/countdown.css" rel="stylesheet" type="text/css"/>
		<link href="CSS/events.css" rel="stylesheet" type="text/css"/>
		<link href="Hover-master/css/hover.css" rel="stylesheet" type="text/css"/>
		<link href="CSS/index.css" rel="stylesheet" type="text/css"/>
		<link href="CSS/team.css" rel="stylesheet" type="text/css"/> 
		<link href="CSS/sponsers.css" rel="stylesheet" type="text/css"/>
		<link href="CSS/footer.css" rel="stylesheet" type="text/css"/>
		<link href="CSS/contact.css" rel="stylesheet" type="text/css"/>
		<link href="CSS/gallery.css" rel="stylesheet" type="text/css"/>
		<link href="CSS/topButton.css" rel="stylesheet" type="text/css"/>
	</head>

	<body>
	<header data-stellar-background-ratio="0.5" id="home">
        <div class="backgound2"></div>
		<nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Technovert 2021</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="index.html" class="hvr-underline-from-left">Home</a></li>
                        <li><a href="index.html" class="hvr-underline-from-left">Events</a></li>
                        <li><a href="index.html" class="hvr-underline-from-left">Sponsers</a></li>
                        <li><a href="index.html" class="hvr-underline-from-left">Gallery</a></li>
                        <li><a href="index.html" class="hvr-underline-from-left">Contact</a></li>
                        <li><a href="mrd.php" class="hvr-underline-from-left">Participant Register</a></li>
                        <li class="login-nav">
                            <a href="#contact" class="hvr-underline-from-left">Login</a>
                            <ul class=sub-login-nav>
                                <li><a href="login.php" class="hvr-underline-from-left">Participant Login</a></li>
                                <li><a href="admin-login.php" class="hvr-underline-from-left">Admin Login</a></li>
                                <li><a href="crd-login.php" class="hvr-underline-from-left">Co-ordinator Login</a></li>
                            </ul>
                        </li>
                    </ul>                   
                </div>
            </div>
        </nav>
        <!-- Header Page -->
        <div class="container-fluid introduction">
            <img src="images/logo.png" class="img-circle img-responsive text-center" style="background-color: #fff;" />
            <h2>Meghnad Saha Institute of Technology</h2>
            <h3>Persents</h3>
            <h1>Technovert 2021</h1>
            <div id="wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div id="countdown"></div>
                        </div>
                    </div>                   		
                </div>
            </div>          
        </div>
    </header>
		<section class="participant-login-section">
			<h1>Participant Login</h1>
			<p style="text-align:center">Registered participants can login to your dashboard to view your events and team details</p>
			<form method="POST" class="participant-login-panel">
				<div>
					<input type="text" name="email" autocomplete="off" required>
					<span class="floating-label">Your email address</span>
				</div>
				<div>
					<input type="password" name="password" required>
					<span class="floating-label">Enter password</span>
				</div>
				<input type="submit" name="login" value="Login">
			</form>
					<!-- <a href="index.php" class = backButton>back</a> -->
			<h1 class = loginError>
				<?php
				if(isset($message)){
					echo $message;
				}
			?>	
			</h1>
		</section>
	</body>
</html>

	<script src="jquery-3.4.1.min.js"></script>
	<script src="script.js"></script>
	<script src="stellar.js-master/libs/jquery/jquery-2.0.2.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="js/countdown.js"></script>
    <script src="stellar.js-master/jquery.stellar.js"></script>
    <script src="js/events.js"></script>
    <script src="js/loading.js" type="text/javascript"></script>
    <script src="js/scroll.js" type="text/javascript"></script>
    <script src="js/topButton.js" type="text/javascript"></script>