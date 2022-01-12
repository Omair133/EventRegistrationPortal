<?php include_once('connection.php');

session_start();
$email=$_SESSION['email'];
$password=$_SESSION['password'];

 $sql = "SELECT gid,name, email, phno, year, dept FROM mrd WHERE email='$email'";
                $query  = $pdoconn->prepare($sql);
                $query->execute();
                $arr_trade = $query->fetchAll(PDO::FETCH_ASSOC);
                $slno=1;

                if($arr_trade){
                	foreach($arr_trade as $val)
                	{
						$user_gid = $val['gid'];
						$name = $val['name'];
					}
                }

                // $array[] = array();
                // global $success;
                // $queryList=mysqli->query($success, "SELECT gid,tid FROM rd WHERE gid='$user_gid'");
                // $row = mysqli_num_rows($queryList);
				// while($row=mysql_fetch_assoc($queryList)){
			 //   		$array[]=$row['tid'];
				// }
				//echo $array;

				$a=array();
				

$sql_rd = "SELECT gid,tid FROM rd WHERE gid='$user_gid'";
                $query_rd  = $pdoconn->prepare($sql_rd);
                $query_rd->execute();
                $arr_tr = $query_rd->fetchAll(PDO::FETCH_ASSOC);
            

                if($arr_tr){
                	foreach($arr_tr as $val_rd)
                	{
                		array_push($a,$val_rd['tid']);
                	//$user_tid = $val_rd['tid'];
                	}
                	
                }

                


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
	<section>
		<body class="dashboard-page">

			<div>
				<ul class="usermenu">
					<li><p class="text-logo">Technovert</p></li>
					<li><h5 class="username">Welcome, <?php echo $name?><br></h5></li>
					<li class="profile-icon">
						<img src="images/user.webp">
						<ul class="logout-section">
							<li><a href="login.php">Logout</a></li>
						</ul>
					</li>
				</ul>	
			</div>
			<h1 style="margin:2rem auto 4rem">Participant Dashboard</h1>
			<div class="tab-button-section">
				<button type="button" class="user-info-btn active-tab">User Information</button>
				<button type="button" class="contact-us-btn">Contact Us</button>
			</div>

			<div class="profile">
				<!-- <div class="buttn1"><input type="button" id="btn" class="buttn2" value="submit" onclick="show_user_data(), show_user_team(), show_team_members()" style= "cursor:pointer"></div> -->
				<div class="user_data_heading"><h1>Personal Information</h1></div>
				<div class="user_data"></div>

				<div class="user_events_heading"><h1>Participated Events</h1></div>
				<div class="user_events"></div>

				<div class="other_participants_heading"><h1>Your team members</h1></div>
				<div class="other_participants"></div>
			</div>

			<div class="contact-form deactivate">
				<h2>Write to us if you have any query, you will receive a response within 24 hours.</h2>
				<form method="POST" class="participant-login-panel" action="https://formspree.io/f/xvodbgky" id="contact-form">
					<div>
						<input type="text" name="name2" class="name2" autocomplete="off" required readonly>
						<!-- <span class="floating-label">Your name</span> -->
					</div>
					<div>
						<input type="text" name="email2" class="email2" autocomplete="off" required readonly>
						<!-- <span class="floating-label">Your email address</span> -->
					</div>
					<div>
						<textarea name="message" id="message" cols="30" rows="10" required></textarea>
						<span class="floating-label">Enter your message</span>
					</div>
					<input type="submit" name="login" value="Submit">
				</form>
				<div id="status"></div>
			</div>
		</body>
	</section>
</html>

<script src="jquery-3.4.1.min.js"></script>
<script>
	
	$(document).ready(function(){
		show_user_data();
		show_user_team();
		show_team_members();

		$('.user-info-btn').click(function(){
			console.log('clicked');
			$('.profile').removeClass("deactivate");
			$('.profile').addClass("activate");
			$('.contact-form').addClass("deactivate");

			$(this).addClass('active-tab');
			$('.contact-us-btn').removeClass('active-tab');
		});

		$('.contact-us-btn').click(function(){
			console.log('clicked');
			$('.contact-form').removeClass("deactivate");
			$('.profile').addClass("deactivate");
			$('.contact-form').addClass("activate");

			$(this).addClass('active-tab');
			$('.user-info-btn').removeClass('active-tab');
		});

		// Assigning value on contact page
		var email = '<?php echo $email; ?>';
		var name = '<?php echo $name; ?>';
		
		$('.name2').val(name);
		$('.email2').val(email);

	});
	function show_user_data()
    				{
    		var email = '<?php echo $email; ?>';
            $.ajax({
            url :'mrd_db.php',
            type:'POST',
            dataType:'html',
            data :{'action':'showUserGid',
        			'email':email
        		},
            // beforeSend:function(){
            //     $('.user_data').html('');
            // },
            success  :function(data){
                $('.user_data').html(data);
               }
        });
        }

        function show_user_team()
    				{
    		var user_gid = '<?php echo $user_gid; ?>';
            $.ajax({
            url :'mrd_db.php',
            type:'POST',
            dataType:'html',
            data :{'action':'viewEvents',
        			'gid':user_gid
        		},
            // beforeSend:function(){
            //     $('.user_data').html('');
            // },
            success  :function(data){
                $('.user_events').html(data);
               }
        });
        }


        function show_team_members()
    				{
    		var tempArray = <?php echo json_encode($a); ?>;
 			var s=JSON.stringify(tempArray);
    		console.log("Hello"+tempArray);
    		var user_gid = '<?php echo $user_gid; ?>';

    		//for (let i = 0; i < tempArray.length; i++) {
    				//var tid = tempArray[i];
    				//console.log(tid);
    				 $.ajax({
			            url :'mrd_db.php',
			            type:'POST',
			            dataType:'html',
			            data :{'action':'viewParticipants',
			        			'gid':user_gid,
			        			'tid':s
			        		},
			            // beforeSend:function(){
			            //     $('.user_data').html('');
			            // },
			            success  :function(data){
			                $('.other_participants').html(data);
			               }
			        });
				}
      //  }

</script>
<script src="jquery-3.4.1.min.js"></script>
	<script src="script.js"></script>