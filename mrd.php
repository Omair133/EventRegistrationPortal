<?php
	include_once('connection.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Participant Register | MSIT</title>
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
                                <li><a href="login.php" class="hvr-underline-from-left">Student Login</a></li>
                                <li><a href="admin-login.php" class="hvr-underline-from-left">Admin Login</a></li>
                                <li><a href="#contact" class="hvr-underline-from-left">Co-ordinator Login</a></li>
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
	<section>
		<div class="section-content">
			<h1>Participant General Registration Form</h1>
			<p>Please register here to get a general registration ID. This ID will be mandatory for every participant.</p>
			<form id="participant-details">
				<div>
					<input type="text" name="pname" id="pname"  autocomplete="nofill" required>
					<span class="floating-label">Your name</span>
				</div>
				<div>
					<input type="text" name="pphno" id="pphno"  autocomplete="nofill" onkeypress="return phValidate(event,this,10)" required>
					<span class="floating-label">Your contact number</span>
				</div>
				<div>
					<input type="text" class="roll" id="roll" required>
					<span class="floating-label">Your roll number</span>
				</div>
				<div>
					<input type="text" name="pemail" id="pemail"  autocomplete="nofill" required>
					<span class="floating-label">Your email address</span>
				</div>
				<select class="year" id="year">
					<option>1st Year</option>
					<option>2nd Year</option>
					<option>3rd Year</option>
					<option>4th Year</option>
				</select>
				<select class="dept" id="dept">
					<option>IT</option>
					<option>CSE</option>
					<option>MECH</option>
					<option>CIVIL</option>
					<option>EEE</option>
					<option>ECE</option>
					<option>BCA</option>
					<option>MCA</option>
				</select>
				<div>
					<input type="password" name="pwd" id="pwd"  autocomplete="nofill" required>
					<span class="floating-label">Password</span>
				</div>
				<div>
					<input type="password" name="rpwd" id="rpwd" onBlur="return isPass()"  required>
					<span class="floating-label">Re-enter password</span>
				</div>
				<input type="button" value="Submit" onclick="saveData()" id="save-btn" required>
			</form>
		</div>
		<div id="form_msg_modal" class="form_msg_modal">
			<div class="modal-content" id="modal-content">
				<span class="close-modal">X</span>
				<div id="form-msg" class="form-msg">
					
				</div>
			</div>
		</div>
	</section>
	<footer></footer>
</body>

</html>

<script>
	function saveData(){
		var pname=$('#pname').val();
		var pemail=$('#pemail').val();
		var pphno=$('#pphno').val();
		var roll=$('#roll').val();
		var dept=$('#dept').val();
		var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		var year = $('#year').val();
		var pwd = $('#pwd').val();
		var rpwd = $('#rpwd').val();
		pwd=pwd.trim();
		rpwd=rpwd.trim();

		if(!pname || !pemail || !pphno || !year || !pwd || !rpwd)
			alert("All Fields are mandatory.");
		else if(!emailPattern.test(pemail))
		{
			alert("Invalid Email Id");
		}
		else if(pphno.length < 10)
		{
			alert("Invalid Contact Number");
		}
    	else if(pwd==""){
    		alert("Password is must ");
        	return false;
    	}
    	else if(rpwd==""){
    		alert("Re-Password is must ");
        	return false;
    	}
		else
		{
			$.ajax({
				url:'mrd_db.php',
				type: 'POST',
				dataType:'html',
				data:{
					'action':'save',
					'pname':pname,
					'pemail':pemail,
					'pphno':pphno,
					'year':year,
					'roll':roll,
					'dept':dept,
					'pwd':pwd
				},
				success:function(data){
					$('.form_msg_modal').toggleClass('unhide');
					$('#form-msg').html(data);
					$('#participant-details')[0].reset();
				}
			});
		}

	}

	function removeMsg(){
		$('#form_msg').css({
			'opacity':'0'
		});
	}

	function isAlphaKey(evt){		
    	var charCode = evt.which || event.charCode || event.char;
        if ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122)){
        	   	alert("Name should not have numbers")
        	    return false;
        }
    	return true;
      }

		//Password checking
	function isPass(){	
		var pwd = $('#pwd').val();
		var rpwd = $('#rpwd').val();	
        if(pwd==rpwd){  
			return true;
		}  
		else{  
			alert("password must be same!");  
			 $('#pwd').val()="";
			 $('#rpwd').val()="";
			return false;  
		} 
	}

</script>
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