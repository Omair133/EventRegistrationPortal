<?php
	include_once('connection.php');
?>
<!DOCTYPE html>
	<head>
		<meta charset="UTF-8">
		<title>Dashboard | MSIT</title>
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
<body class="admin-desk">
	<!-- <a href="index.php" class = backButton>logout</a> -->
	<div>
		<ul class="usermenu">
			<li><p class="text-logo">Technovert</p></li>
			<li><h5 class="username">Welcome, Admin<br></h5></li>
			<li class="profile-icon">
				<img src="images/user.webp">
				<ul class="logout-section">
					<li><a href="admin-login.php">Logout</a></li>
				</ul>
			</li>
		</ul>	
	</div>
	<div class="summary"></div>
	<div class="section-content">
		<h1>Event Registration - Admin Desk</h1>
		<div class="instruction">INSTRUCTION: Select domain, event and enter General ID (GID) of the participants and then click on the "Check GID" button. This button validates the entered GID. After succesful validation,
			enter the team name of the particpant (optional) and click on "Submit". After successful submission, a Team ID (TID) is generated. The participants can view the team ID in their dashboards for future reference.  
		</div>
		<form id="gid-form">
			<select class="domain" id="domain">
				<option selected disabled>Select Domain</option>
				<option>Coding</option>
				<option>Civil</option>
				<option>Gaming</option>
				<option>General</option>
				<option>Electrical</option>
				<option>Robotics</option>
			</select>
			<select class="evnt rd-events" id="evnt">
				<div class="evnt-dropdown">
					<option selected disabled>Select Event</option>
					<!-- <option>Code Novice</option>
					<option>Code Virtuso</option>
					<option>Web O Mania</option>
					<option>Prisoner of Azkaban</option>
					<option>Knights Watch</option>
					<option>Final Destination</option>
					<option>El Clasico</option>
					<option>Electro Battleground</option>
					<option>PUBG MOBILE (Classic)</option>
					<option>NFS</option>
					<option>FIFA 11</option>
					<option>CS 1.6</option>
					<option>Setu Bandhan</option>
					<option>Track O Treasure</option>
					<option>Mega Arch</option>
					<option>Carrom</option>
					<option>Chess</option>
					<option>Table Tennis</option>
					<option>Darts</option>
					<option>Photography</option>
					<option>Videography</option>
					<option>B-Plan</option>
					<option>Innovation Challenge</option> -->
				</div>
			</select>
			<div class="mrd-gid">
				<input type="text" value="TVT" disabled>
				<input type="text" id="gid1" placeholder="Enter GID 1" onkeypress="return numbersonly(event)">
			</div>
			<div class="mrd-gid">
				<input type="text" value="TVT" disabled>
				<input type="text" id="gid2" placeholder="Enter GID 2" onkeypress="return numbersonly(event)">
			</div>
			<div class="mrd-gid">
				<input type="text" value="TVT" disabled>
				<input type="text" id="gid3" placeholder="Enter GID 3" onkeypress="return numbersonly(event)">
			</div>
			<div class="mrd-gid">
				<input type="text" value="TVT" disabled>
				<input type="text" id="gid4" placeholder="Enter GID 4" onkeypress="return numbersonly(event)">
			</div>
			<div class="mrd-gid">
				<input type="text" value="TVT" disabled>
				<input type="text" id="gid5" placeholder="Enter GID 5" onkeypress="return numbersonly(event)">
			</div>
			
			<input type="button" value="Check GID's" onclick="checkgid()">
		</form>
	</div>
	<div class="rd-content">
		<form id="rd-form" class="rd-form">
			
			<input type="text" id="tname" placeholder="Enter Team Name">
			<div class="rd-input">
				<input type="text" value="₹" disabled>
				<input type="text" id="amount" placeholder="Enter Amount" readonly>
			</div>
			<div class="instruction">Note: Please collect the above amount from the Team before clicking Submit.</div>
			<input type="button" value="Submit" onclick="enroll()">
		</form>
	</div>

	<div id="form_msg_modal" class="form_msg_modal">
		<div class="modal-content" id="modal-content">
			<span class="close-modal">X</span>
			<div id="form-msg" class="form-msg">
				<p>Hello</p>
			</div>
		</div>
	</div>
</body>

<script src="jquery-3.4.1.min.js"></script>
<script>
		$(document).ready(function(){
			generateSummary();
		});
	
		$("#domain").on("change",function(){
			var rdDomain = $(this).val();
			console.log(rdDomain);
			if(rdDomain == 'Coding')
			$('.rd-events').html("<option selected disabled>Select Event</option><option>Code Novice</option><option>Code Virtuso</option><option>Web O Mania</option>");
			else if(rdDomain == 'Civil')
			$('.rd-events').html("<option selected disabled>Select Event</option><option>Setu Bandhan</option><option>Track O Treasure</option><option>Mega Arch</option>");
			else if(rdDomain == 'Gaming')
			$('.rd-events').html("<option selected disabled>Select Event</option><option>PUBG MOBILE (Classic)</option><option>NFS</option><option>FIFA 11</option><option>CS 1.6</option>");
			else if(rdDomain == 'General')
			$('.rd-events').html("<option selected disabled>Select Event</option><option>Carrom</option><option>Chess</option><option>Table Tennis</option><option>Darts</option><option>Photography</option><option>Videography</option><option>B-Plan</option><option>Innovation Challenge</option>");
			else if(rdDomain == 'Electrical')
			$('.rd-events').html("<option selected disabled>Select Event</option><option>Electro Battleground</option>");
			else if(rdDomain == 'Robotics')
			$('.rd-events').html("<option selected disabled>Select Event</option><option>Prisoner of Azkaban</option><option>Knights Watch</option><option>El Clasico</option>");
		});

	function checkgid(){
		var domain = $('#domain').val();
		var gid1 = $("#gid1").val();
		var gid2 = $("#gid2").val();
		var gid3 = $("#gid3").val();
		var gid4 = $("#gid4").val();
		var gid5 = $("#gid5").val();
		var evnt = $('#evnt').val();
		if(!domain)
			alert("Please Select Domain");
		else if(!evnt)
			alert("Please select an Event");
		else
		{
			if(!gid1 && !gid2 && !gid3 && !gid4 && !gid5)
				alert("Enter atleast one GID");
			else
			{
				$.ajax({
					url:'mrd_db.php',
					dataType:'html',
					type: 'POST',
					data:{
						'action':'checkgid',
						'domain':domain,
						'gid1':gid1,
						'gid2':gid2,
						'gid3':gid3,
						'gid4':gid4,
						'gid5':gid5,
						'evnt':evnt
					},
					success:function(data){
						if(data == '1')
						{
							$('#gid1').prop('readonly', true);
							$('#gid2').prop('readonly', true);
							$('#gid3').prop('readonly', true);
							$('#gid4').prop('readonly', true);
							$('#gid5').prop('readonly', true);
							// $('#domain').prop('disabled', true);
							$('#domain').css('pointer-events','none');
							$('.rd-events').css('pointer-events','none');
							alert("GID's checked succesfully. Click OK to proceed with further details.");
							$('#rd-form').css('display','block');
						}
						else
							alert(data);
					}
				});
				
				
			}
		}
	}

	function enroll(){
		var domain = $('#domain').val();
		var gid1 = $("#gid1").val();
		var gid2 = $("#gid2").val();
		var gid3 = $("#gid3").val();
		var gid4 = $("#gid4").val();
		var gid5 = $("#gid5").val();
		var evnt = $("#evnt").val();
		var tname = $("#tname").val();
		var amount = $("#amount").val();
		var tid = Math.floor(Math.random()*90000) + 10000;
		tid = "TID".concat(tid);
		if(!evnt)
			alert("Select Event");
		else
		{
			$.ajax({
				url:'mrd_db.php',
				dataType:'html',
				type:'POST',
				data:{
					'action':'enroll',
					'domain':domain,
					'gid1':gid1,
					'gid2':gid2,
					'gid3':gid3,
					'gid4':gid4,
					'gid5':gid5,
					'evnt':evnt,
					'tname':tname,
					'amount':amount,
					'tid':tid
				},
				success:function(data){

					$('.form_msg_modal').toggleClass('unhide');
					$('#form-msg').html(data);

					$('#rd-form')[0].reset();
					$('#gid-form')[0].reset();
					$('#gid1').prop('readonly', false);
					$('#gid2').prop('readonly', false);
					$('#gid3').prop('readonly', false);
					$('#gid4').prop('readonly', false);
					$('#gid5').prop('readonly', false);
					$('#domain').css('pointer-events','auto');
					$('#rd-form').css('display','none');
					generateSummary();
				}
			});
		}
	}
	function generateSummary(){
		$.ajax({
			url:'mrd_db.php',
			dataType:'html',
			type:'POST',
			data:{
				'action':'generateSummary'
			},
			success:function(data){
				$('.summary').html(data);
			}
		});
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