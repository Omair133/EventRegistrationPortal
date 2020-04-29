<?php
	include_once('connection.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>MRD | Tech-X-Tra</title>
	<link href="style.css" rel="stylesheet"></link>
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
	<header></header>
	<section>
		<div class="section-content">
			<h1>Main Registration Desk - MRD</h1>
			<form id="participant-details">
				<input type="text" name="pname" id="pname" placeholder="Enter Full Name" autocomplete="nofill"><br>
				<input type="text" name="pemail" id="pemail" placeholder="Enter Email Address" autocomplete="nofill"><br>
				<input type="text" name="pphno" id="pphno" placeholder="Enter Contact Number" autocomplete="nofill" onkeypress="return phValidate(event,this,10)"><br>
				<select class="year" id="year">
					<option>1st Year</option>
					<option>2nd Year</option>
					<option>3rd Year</option>
					<option>4th Year</option>
				</select>
				<input type="button" value="Submit" onclick="saveData()" id="save-btn">
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
		var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		var year = $('#year').val();
		if(!pname || !pemail || !pphno || !year)
			alert("All Fields are mandatory.");
		else if(!emailPattern.test(pemail))
		{
			alert("Invalid Email Id");
		}
		else if(pphno.length < 10)
		{
			alert("Invalid Contact Number");
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
					'year':year
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
</script>
	<script src="jquery-3.4.1.min.js"></script>
	<script src="script.js"></script>