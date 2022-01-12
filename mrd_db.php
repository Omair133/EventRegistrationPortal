<?php
	include_once('connection.php');
	session_start();
	$action = $_REQUEST['action'];
	switch($action){
		case 'save':

			$pname = $_REQUEST['pname'];
			$pemail = $_REQUEST['pemail'];
			$pwd = $_REQUEST['pwd'];
			$pphno = $_REQUEST['pphno'];
			$year = $_REQUEST['year'];
			$roll = $_REQUEST['roll'];
			$dept = $_REQUEST['dept'];
			//AND password = '$pwd' AND phno = '$pphno' AND year = '$year'
				$sql = "SELECT gid FROM mrd WHERE email = '$pemail'";
				$query = $pdoconn->prepare($sql);
				$query->execute();
				$arr_enrollments = $query->fetchAll(PDO::FETCH_ASSOC);
				if(count($arr_enrollments) > 0)
				{
					echo '<img src="images/error.png"> <br>Account already exists with this email ID. <br> Please enter new details or <a href=\"login.php\"> LOGIN </a> to your account.';
					break;
				}
			$sql = "INSERT INTO mrd(name, email, password, phno, year, dept, roll) VALUE('$pname', '$pemail', '$pwd', '$pphno', '$year', '$dept', '$roll')";
				$query = $pdoconn->prepare($sql);
				$query->execute();
				

				$sql = "SELECT gid FROM mrd WHERE name = '$pname' AND email = '$pemail' AND password = '$pwd' AND phno = '$pphno' AND year = '$year'";
				$query = $pdoconn->prepare($sql);
				$query->execute();
				$arr_enrollments = $query->fetchAll(PDO::FETCH_ASSOC);
				foreach ($arr_enrollments as $val){
					$gid = $val['gid'];
				}
				echo '<img src="images/okay.png"> <p> Participant Enrolled Successfully</p><br><p>Please note your general registration ID. You can <a href=\'login.php\' target=\'_blank\'> LOGIN </a> to your account to view more details</p><strong>General ID:</strong><h3 class="gid">TVT'.$gid.'</h3>';
			
			break;

		case 'checkgid':

			$gid1 = $_REQUEST['gid1'];
			$gid2 = $_REQUEST['gid2'];
			$gid3 = $_REQUEST['gid3'];
			$gid4 = $_REQUEST['gid4'];
			$gid5 = $_REQUEST['gid5'];
			$domain = $_REQUEST['domain'];
			$evnt = $_REQUEST['evnt'];

			if($gid1)
			{
				$sql = "SELECT gid FROM mrd WHERE gid = '$gid1'";
				$query = $pdoconn->prepare($sql);
				$query->execute();
				$arr_enrollments = $query->fetchAll(PDO::FETCH_ASSOC);
				if(count($arr_enrollments) == 0)
				{
					echo 'GID: TVT'.$gid1.' Not Found';
					break;
				}
			}

			if($gid2)
			{
				$sql = "SELECT gid FROM mrd WHERE gid = '$gid2'";
				$query = $pdoconn->prepare($sql);
				$query->execute();
				$arr_enrollments = $query->fetchAll(PDO::FETCH_ASSOC);
				if(count($arr_enrollments) == 0)
				{
					echo 'GID: TVT'.$gid2.' Not Found';
					break;
				}
			}

			if($gid3)
			{
				$sql = "SELECT gid FROM mrd WHERE gid = '$gid3'";
				$query = $pdoconn->prepare($sql);
				$query->execute();
				$arr_enrollments = $query->fetchAll(PDO::FETCH_ASSOC);
				if(count($arr_enrollments) == 0)
				{
					echo 'GID: TVT'.$gid3.' Not Found';
					break;
				}
			}

			if($gid4)
			{
				$sql = "SELECT gid FROM mrd WHERE gid = '$gid4'";
				$query = $pdoconn->prepare($sql);
				$query->execute();
				$arr_enrollments = $query->fetchAll(PDO::FETCH_ASSOC);
				if(count($arr_enrollments) == 0)
				{
					echo 'GID: TVT'.$gid4.' Not Found';
					break;
				}
			}

			if($gid5)
			{
				$sql = "SELECT gid FROM mrd WHERE gid = '$gid5'";
				$query = $pdoconn->prepare($sql);
				$query->execute();
				$arr_enrollments = $query->fetchAll(PDO::FETCH_ASSOC);
				if(count($arr_enrollments) == 0)
				{
					echo 'GID: TVT'.$gid5.' Not Found';
					break;
				}
			}

			$flag = 0;
			$sql = "SELECT gid FROM rd WHERE domain = '$domain' AND evnt = '$evnt'";
			$query = $pdoconn->prepare($sql);
			$query->execute();
			$arr = $query->fetchAll(PDO::FETCH_ASSOC);
			foreach ($arr as $val){
				if($gid1 == $val['gid'] || $gid2 == $val['gid'] || $gid3 == $val['gid'] || $gid4 == $val['gid'] || $gid5 == $val['gid'])
				{
					$flag = 1;
					$invalid_gid = $val['gid'];
					break;
				}
			}
			if($flag == 1)
			{
				echo 'GID: TVT'.$invalid_gid.' already played in '.$domain.' domain';
				break;
			}

			echo '1';

			break;
		}

	switch($action){	
		case 'enroll':

			$gid1 = $_REQUEST['gid1'];
			$gid2 = $_REQUEST['gid2'];
			$gid3 = $_REQUEST['gid3'];
			$gid4 = $_REQUEST['gid4'];
			$gid5 = $_REQUEST['gid5'];
			$domain = $_REQUEST['domain'];
			$evnt = $_REQUEST['evnt'];
			$tname = $_REQUEST['tname'];
			$amount = $_REQUEST['amount'];
			$tid = $_REQUEST['tid'];

			$cevents = array("Code Novice", "Code Virtuso", "Web O Mania","Prisoner of Azkaban", "Knights Watch", "El Clasico", "NFS","FIFA 11", "Setu Bandhan", "Track O Treasure", "Photography", "Videography");
			$start = 0; 
			$end = 0;
			if($evnt == "Coding Combo")
			{
				$start = 0;
				$end = 2;
			}
			else if($evnt == "Robotics Combo")
			{
				$start = 3;
				$end = 5;
			}
			else if($evnt == "Gaming Combo")
			{
				$start = 6;
				$end = 7;
			}
			else if($evnt == "Civil Combo")
			{
				$start = 8;
				$end = 9;
			}
			else if($evnt == "General Combo")
			{
				$start = 10;
				$end = 11;
			}
			

			if($end == 0)
			{
				if($gid1)
				{
					$sql = "INSERT INTO rd(gid, domain, evnt, tid, tname) VALUE('$gid1','$domain','$evnt','$tid','$tname')";
					$query = $pdoconn->prepare($sql);
					$query->execute();
				}
				if($gid2)
				{
					$sql = "INSERT INTO rd(gid, domain, evnt, tid, tname) VALUE('$gid2','$domain','$evnt','$tid','$tname')";
					$query = $pdoconn->prepare($sql);
					$query->execute();
				}

				if($gid3)
				{
					$sql = "INSERT INTO rd(gid, domain, evnt, tid, tname) VALUE('$gid3','$domain','$evnt','$tid','$tname')";
					$query = $pdoconn->prepare($sql);
					$query->execute();
				}

				if($gid4)
				{	
					$sql = "INSERT INTO rd(gid, domain, evnt, tid, tname) VALUE('$gid4','$domain','$evnt','$tid','$tname')";
					$query = $pdoconn->prepare($sql);
					$query->execute();
				}

				if($gid5)
				{
					$sql = "INSERT INTO rd(gid, domain, evnt, tid, tname) VALUE('$gid5','$domain','$evnt','$tid','$tname')";
					$query = $pdoconn->prepare($sql);
					$query->execute();
				}

				$sql = "INSERT INTO teams(tid, evnt, amount, tname) VALUE('$tid', '$evnt', '$amount','$tname')";
				$query = $pdoconn->prepare($sql);
				$query->execute();	
			}
			else
			{
				for($i = $start; $i<=$end; $i++)
				{
					if($gid1)
					{
						$sql = "INSERT INTO rd(gid, domain, evnt, tid, tname) VALUE('$gid1','$domain','$cevents[$i]','$tid','$tname')";
						$query = $pdoconn->prepare($sql);
						$query->execute();
					}
					if($gid2)
					{
						$sql = "INSERT INTO rd(gid, domain, evnt, tid, tname) VALUE('$gid2','$domain','$cevents[$i]','$tid','$tname')";
						$query = $pdoconn->prepare($sql);
						$query->execute();
					}

					if($gid3)
					{
						$sql = "INSERT INTO rd(gid, domain, evnt, tid, tname) VALUE('$gid3','$domain','$cevents[$i]','$tid','$tname')";
						$query = $pdoconn->prepare($sql);
						$query->execute();
					}

					if($gid4)
					{	
						$sql = "INSERT INTO rd(gid, domain, evnt, tid, tname) VALUE('$gid4','$domain','$cevents[$i]','$tid','$tname')";
						$query = $pdoconn->prepare($sql);
						$query->execute();
					}

					if($gid5)
					{
						$sql = "INSERT INTO rd(gid, domain, evnt, tid, tname) VALUE('$gid5','$domain','$cevents[$i]','$tid','$tname')";
						$query = $pdoconn->prepare($sql);
						$query->execute();
					}

					$sql = "INSERT INTO teams(tid, evnt, amount, tname) VALUE('$tid', '$cevents[$i]', '$amount','$tname')";
					$query = $pdoconn->prepare($sql);
					$query->execute();
				}
			}

			if($query)
				echo '<img src="images/okay.png"><p>Team Enrolled Successfully</p><strong>Team ID:</strong><h3 class="tid">'.$tid.'</h3>
				<p>'.$evnt.'</p>
				<p>'.$gid1.'</p>
				<p>'.$gid2.'</p>
				<p>'.$gid3.'</p>
				<p>'.$gid4.'</p>
				<p>'.$gid5.'</p>';
			else
				echo '<p>Insertion not done.</p>';

		break;	
	}

	switch($action){
		case 'show':

			$evnt = $_REQUEST['evnt'];
			$html = "<div class=\"instruction\">Note: Click on <strong>Played</strong> once the team has completed the event. Click on <strong>View GIDs</strong> to view the GID of the team members.</div>
						<table>
						<tr><th>Sl. No.</th>
							<th>Team ID </th>
							<th>Team Name</th>
							<th>Action</hr>
							<th>View GID's </th>
						</tr>";

			$sql="SELECT * FROM teams WHERE evnt = '$evnt' AND flag=0";
			$query  = $pdoconn->prepare($sql);
	        $query->execute();
	        $arr = $query->fetchAll(PDO::FETCH_ASSOC);
	        $slno=1;

	        if($arr)
	        {
	        	foreach($arr as $val)
	        	{
	        		$tid = $val['tid'];
	        		$tname = $val['tname'];

	        		$html.="<tr>
	        					<td>".$slno."</td>
	        					<td>".$tid."</td>
	        					<td>".$tname."</td>
	        					<td><input type = 'submit' class = 'played' value = 'Mark as played' onclick = 'delteam(\"".$tid."\",\"".$evnt."\")'>
	        					<td><input type = 'submit' class = 'view-gid' value = 'View GIDs' onclick = 'viewGid(\"".$tid."\")'>
	        				</tr>";
	        		$slno++;
	        	}
	        $html.="</table>";
	        echo $html;
	        }
	        else
	        {
	        	// echo "<div class=\"blank-msg\>No Teams have yet registered for this event.</div>";	
				echo "<div class=\"blank-msg\">No teams have yet participated in this event</div>";
	        }

	    break;

	    case 'viewGid':

	    	$tid = $_REQUEST['tid'];
	    	$sql = "SELECT gid from rd WHERE tid = '$tid'";
	    	$query  = $pdoconn->prepare($sql);
	        $query->execute();
	        $arr = $query->fetchAll(PDO::FETCH_ASSOC);
	        $gidlist="";
	        foreach($arr as $val)
	        {
	        	$gidlist.="TVT".$val['gid']." - ";
	        }
	        echo $gidlist;

	    break;

	    case 'delteam':

	    	$tid = $_REQUEST['tid'];
	    	$evnt = $_REQUEST['evnt'];
	    	$sql = "UPDATE teams SET flag = 1 WHERE tid = '$tid' AND evnt = '$evnt'";
	    	$query  = $pdoconn->prepare($sql);
	    	$query->execute();
		    if($query)
		        echo 'Team '.$tid.' Marked as played.';
		    else
		        echo 'ERROR WHILE MARKING...';
	    break;
		}




		//view participant details *************************************************************************************************************


		switch($action) {

	    case 'showUserGid':
	    $email = $_REQUEST['email'];
			$html="<table>
            <tr>
                <th>GID No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Year</th>
                <th>Department</th></tr>";

                $sql = "SELECT gid,name,email,phno,year,dept FROM mrd WHERE email='$email'";
                $query  = $pdoconn->prepare($sql);
                $query->execute();
                $arr_trade = $query->fetchAll(PDO::FETCH_ASSOC);
                $slno=1;

                if($arr_trade){
                	foreach($arr_trade as $val)
                	{
                	$gid = $val['gid'];
                    $name = $val['name'];
                    $email=$val['email'];
                     $phone=$val['phno'];
                      $year=$val['year'];
                      $dept=$val['dept'];

		           $html.="<tr>
		                <td>TVT". $gid."</td>
		                <td>".$name."</td>
		                <td>".$email."</td>
		                <td>".$phone."</td>
		                <td>".$year."</td>
		                <td>".$dept."</td>

		            </tr>";
		                }

				$html.="</table>";
				echo $html;
		        }
		        else {
					echo "No details Found";
		        }
                
        break; 
		

		 case 'viewEvents':

	    	$gid = $_REQUEST['gid'];
	    	$html="<table>
            <tr>
                <th>Events</th>
                <th>Team ID</th>
                <th>Team Name</th>
              	</tr>";
	    	$sql = "SELECT evnt,tid, tname from rd WHERE gid = '$gid'";
	    	$query  = $pdoconn->prepare($sql);
	        $query->execute();
	        $arr = $query->fetchAll(PDO::FETCH_ASSOC);
	        $gidlist="";
	        
	         if($arr){
                	foreach($arr as $val)
                	{
                	$event = $val['evnt'];
                    $tid = $val['tid'];
					$tname = $val['tname'];

		           $html.="<tr>
		                <td>". $event."</td>
		                <td>".$tid."</td>
		                <td>".$tname."</td>
		                </tr>";
		                }

				$html.="</table>";
				echo $html;
		        }
		        else {
					echo "<div class=\"blank-msg\">You have not participated in any event.</div>";
		        }

	    break;


	    case 'viewParticipants':

	    	$gid = $_REQUEST['gid'];
	    	$tid = $_REQUEST['tid'];

	    	$a=array();

				$sql_rd = "SELECT gid,tid FROM rd WHERE gid='$gid'";
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

                // print_r($a);
                $ids = implode(',', $a);

	    	$html="<table>
            <tr>
                <th>Other Participants Name</th>
                <th>Participant Gid Number</th>
              	</tr>";
	    	$sql = "SELECT gid,name FROM mrd WHERE gid IN(SELECT gid FROM rd WHERE tid IN (SELECT tid FROM rd WHERE gid='$gid')) AND gid != '$gid'";
	    	// print_r($sql);
	    	$query  = $pdoconn->prepare($sql);
	        $query->execute();
	        $arr = $query->fetchAll(PDO::FETCH_ASSOC);
	        $gidlist="";
	        
	         if($arr){
                	foreach($arr as $val)
                	{
                	$name = $val['name'];
                    $gid = $val['gid'];
                   

		           $html.="<tr>
		                <td>". $name."</td>
		                <td>".$gid."</td>
		                </tr>";
		                }

				$html.="</table>";
				echo $html;
		        }
		        else {
					echo "<div class=\"blank-msg\">You do not have any other team members.</div>";
		        }

	    break;

		case 'generateSummary':

				$sql = "SELECT COUNT(tid) as total_count, SUM(amount) as total_amount from teams";
                $query  = $pdoconn->prepare($sql);
                $query->execute();
                $arr = $query->fetchAll(PDO::FETCH_ASSOC);

				foreach($arr as $val){
					$n = $val['total_count'];
					$sum = $val['total_amount'];
				}

				echo "<div class=\"total-team\">Total Teams Registered: ".$n."</div>
					  <div class=\"total-amount\">Total Collection: ₹".$sum."</div>";
	}
?>
