<?php
	include_once('connection.php');
?>
<html>
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
	<body class="crd-desk">
		<div>
			<ul class="usermenu">
				<li><p class="text-logo">Technovert</p></li>
				<li><h5 class="username">Welcome, Event Co-ordinator<br></h5></li>
				<li class="profile-icon">
					<img src="images/user.webp">
					<ul class="logout-section">
						<li><a href="crd-login.php">Logout</a></li>
					</ul>
				</li>
			</ul>	
		</div>
		<h1>Event Co-ordinator Desk - CRD</h1>
		<div class="instruction">Instruction: Select <strong>Domain</strong> and <strong>Event</strong> from the dropdown below to view the teams that have participated in the respective events.</div>
		<form id="crd-form">
			<select class="crd-domain">
				<option disabled selected>Select Domain</option>
				<option>Coding</option>
				<option>Electrical</option>
				<option>Civil</option>
				<option>Gaming</option>
				<option>General</option>
				<option>Robotics</option>
			</select>
			<input type="button" value="Find Events" onclick="genEvents()">
			<select class="crd-evnt"></select>
			<input type="button" value="Submit" onclick="showData()">
		</form>
		<div class="teams"></div>
	</body>
</html>
 <script>
	function genEvents()
	{
		var crdDomain = $('.crd-domain').val();
		if(crdDomain == 'Coding')
		{
			console.log('true');
			$('.crd-evnt').html("<option selected disabled>Select Event</option><option>Code Novice</option><option>Code Virtuso</option><option>Web O Mania</option>");
		}	
		else if(crdDomain == 'Robotics')
		{
			$('.crd-evnt').html("<option selected disabled>Select Event</option><option>Prisoner of Azkaban</option><option>Knights Watch</option><option>El Clasico</option>");
		}
		else if(crdDomain == 'Electrical')
		{
			$('.crd-evnt').html("<option selected disabled>Select Event</option><option>Electro Battleground</option>");
		}
		else if(crdDomain == 'Gaming')
		{
			$('.crd-evnt').html("<option selected disabled>Select Event</option><option>PUBG MOBILE (Classic)</option><option>NFS</option><option>FIFA 11</option><option>CS 1.6</option>");
		}
		else if(crdDomain == 'Civil')
		{
			$('.crd-evnt').html("<option selected disabled>Select Event</option><option>Setu Bandhan</option><option>Track O Treasure</option><option>Mega Arch</option>");
		}
		else if(crdDomain == 'General')
		{
			$('.crd-evnt').html("<option selected disabled>Select Event</option><option>Carrom</option><option>Chess</option><option>Table Tennis</option><option>Darts</option><option>Photography</option><option>Videography</option><option>B-Plan</option><option>Innovation Challenge</option>");
		}
	}
	function showData()
	{
		var evnt = $('.crd-evnt').val();
		$.ajax({
			url:'mrd_db.php',
			dataType:'html',
			type:'POST',
			data:{
				'action':'show',
				'evnt':evnt
			},
			success:function(data)
			{
				$('.teams').html(data);
			}
		});
	}
	function viewGid(tid)
	{
		$.ajax({
			url:'mrd_db.php',
			dataType:'html',
			type:'POST',
			data:{
				'tid':tid,
				'action':'viewGid'
			},
			success:function(data)
			{
				alert(data);
			}
		});
	}
	function delteam(tid,evnt)
	{
		console.log(tid);
		$.ajax({
			url:'mrd_db.php',
			dataType:'html',
			type:'POST',
			data:{
				'tid':tid,
				'action':'delteam',
				'evnt':evnt
			},
			success:function(data){
				showData();
				alert(data);
			}
		});
	}
</script>
<script src="jquery-3.4.1.min.js"></script>
<script src="script.js"></script>