<?php
	include_once('connection.php');
?>
<!DOCTYPE html>
<head>
	<title>RD | Tech-X-Tra</title>
	<link href="style.css" rel="stylesheet"></link>
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
	<div class="section-content">
		<h1>Registration Desk - RD</h1>
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
			
			<div class="mrd-gid">
				<input type="text" value="TXTRA" disabled>
				<input type="text" id="gid1" placeholder="Enter GID 1" onkeypress="return numbersonly(event)">
			</div>
			<div class="mrd-gid">
				<input type="text" value="TXTRA" disabled>
				<input type="text" id="gid2" placeholder="Enter GID 2" onkeypress="return numbersonly(event)">
			</div>
			<div class="mrd-gid">
				<input type="text" value="TXTRA" disabled>
				<input type="text" id="gid3" placeholder="Enter GID 3" onkeypress="return numbersonly(event)">
			</div>
			<div class="mrd-gid">
				<input type="text" value="TXTRA" disabled>
				<input type="text" id="gid4" placeholder="Enter GID 4" onkeypress="return numbersonly(event)">
			</div>
			<div class="mrd-gid">
				<input type="text" value="TXTRA" disabled>
				<input type="text" id="gid5" placeholder="Enter GID 5" onkeypress="return numbersonly(event)">
			</div>
			
			<input type="button" value="Check GID's" onclick="checkgid()">
		</form>
	</div>
	<div class="rd-content">
		<form id="rd-form" class="rd-form">
			<select class="evnt" id="evnt">
				<div class="evnt-dropdown">
					<!-- <option selected disabled>Select Event</option>
					<option>Code Novice</option>
					<option>Web-O-Philia</option>
					<option>Robot Race</option>
					<option>Photography</option> -->	
				</div>
			</select>
			<input type="text" id="tname" placeholder="Enter Team Name">
			<div class="mrd-gid">
				<input type="text" value="₹" disabled>
				<input type="text" id="amount" placeholder="Enter Amount" readonly>
			</div>
			
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
<script>
	function checkgid(){
		var domain = $('#domain').val();
		var gid1 = $("#gid1").val();
		var gid2 = $("#gid2").val();
		var gid3 = $("#gid3").val();
		var gid4 = $("#gid4").val();
		var gid5 = $("#gid5").val();
		if(!domain)
			alert("Please Select Domain");
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
							alert("GID's checked succesfully. Click OK to proceed with further details.");
							$('#rd-form').css('display','block');
						}
						else
							alert(data);
					}
				});
				
				if(domain == 'Coding')
				{
					console.log('true');
					$('.evnt').html("<option selected disabled>Select Event</option><option>Code Novice</option><option>Code Virtuso</option><option>Web O Mania</option><option>Code Rumble</option><option>Coding Combo</option>");
				}	
				else if(domain == 'Robotics')
				{
					$('.evnt').html("<option selected disabled>Select Event</option><option>Prisoner of Azkaban</option><option>Knights Watch</option><option>Final Destination</option><option>El Clasico</option><option>Fast and Furious</option><option>Robotics Combo</option>");
				}
				else if(domain == 'Electrical')
				{
					$('.evnt').html("<option selected disabled>Select Event</option><option>Electro Battleground</option><option>Wire O Mania</option>");
				}
				else if(domain == 'Gaming')
				{
					$('.evnt').html("<option selected disabled>Select Event</option><option>PUBG MOBILE (Classic)</option><option>PUBG MOBILE (Onspot)</option><option>NFS</option><option>FIFA 11</option><option>CS 1.6</option><option>PES 19 (Onspot)</option><option>Gaming Combo</option>");
				}
				else if(domain == 'Civil')
				{
					$('.evnt').html("<option selected disabled>Select Event</option><option>Setu Bandhan</option><option>Track O Treasure</option><option>Mega Arch</option><option>Civil Combo</option>");
				}
				else if(domain == 'General')
				{
					$('.evnt').html("<option selected disabled>Select Event</option><option>Carrom</option><option>Chess</option><option>Table Tennis</option><option>Darts</option><option>Photography</option><option>Videography</option><option>B-Plan</option><option>Innovation Challenge</option><option>General Combo</option>");
				}
			} //else close
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
		if(!tname || !evnt || !amount)
			alert("All fields are mandatory");
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
				}
			});
		}
	}


</script>
<script src="jquery-3.4.1.min.js"></script>
<script src="script.js"></script>