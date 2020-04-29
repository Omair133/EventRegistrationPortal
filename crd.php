<?php
	include_once('connection.php');
?>
<html>
	<head>
		<title>CRD | Tech-X-Tra</title>
		<link href="style.css" rel="stylesheet"></link>
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	</head>
	<body>
		<h1>Coordinator Desk - CRD</h1>
		<form>
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
			$('.crd-evnt').html("<option selected disabled>Select Event</option><option>Code Novice</option><option>Code Virtuso</option><option>Web O Mania</option><option>Code Rumble</option><option>Coding Combo</option>");
		}	
		else if(crdDomain == 'Robotics')
		{
			$('.crd-evnt').html("<option selected disabled>Select Event</option><option>Prisoner of Azkaban</option><option>Knights Watch</option><option>Final Destination</option><option>El Clasico</option><option>Fast and Furious</option><option>Robotics Combo</option>");
		}
		else if(crdDomain == 'Electrical')
		{
			$('.crd-evnt').html("<option selected disabled>Select Event</option><option>Electro Battleground</option><option>Wire O Mania</option>");
		}
		else if(crdDomain == 'Gaming')
		{
			$('.crd-evnt').html("<option selected disabled>Select Event</option><option>PUBG MOBILE (Classic)</option><option>PUBG MOBILE (Onspot)</option><option>NFS</option><option>FIFA 11</option><option>CS 1.6</option><option>PES 19 (Onspot)</option><option>Gaming Combo</option>");
		}
		else if(crdDomain == 'Civil')
		{
			$('.crd-evnt').html("<option selected disabled>Select Event</option><option>Setu Bandhan</option><option>Track O Treasure</option><option>Mega Arch</option><option>Civil Combo</option>");
		}
		else if(crdDomain == 'General')
		{
			$('.crd-evnt').html("<option selected disabled>Select Event</option><option>Carrom</option><option>Chess</option><option>Table Tennis</option><option>Darts</option><option>Photography</option><option>Videography</option><option>B-Plan</option><option>Innovation Challenge</option><option>General Combo</option>");
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