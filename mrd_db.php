<?php
	include_once('connection.php');
	$action = $_REQUEST['action'];
	switch($action){
		case 'save':

			$pname = $_REQUEST['pname'];
			$pemail = $_REQUEST['pemail'];
			$pphno = $_REQUEST['pphno'];
			$year = $_REQUEST['year'];
			
				$sql = "SELECT gid FROM mrd WHERE name = '$pname' AND email = '$pemail' AND phno = '$pphno' AND year = '$year'";
				$query = $pdoconn->prepare($sql);
				$query->execute();
				$arr_enrollments = $query->fetchAll(PDO::FETCH_ASSOC);
				if(count($arr_enrollments) > 0)
				{
					echo '<img src="images/error.png"> <br>Enrollment Exists. <br> Please enter new enrollment.';
					break;
				}
				$sql = "INSERT INTO mrd(name, email, phno, year) VALUE('$pname', '$pemail', '$pphno', '$year')";
				$query = $pdoconn->prepare($sql);
				$query->execute();
				

				$sql = "SELECT gid FROM mrd WHERE name = '$pname' AND email = '$pemail' AND phno = '$pphno' AND year = '$year'";
				$query = $pdoconn->prepare($sql);
				$query->execute();
				$arr_enrollments = $query->fetchAll(PDO::FETCH_ASSOC);
				foreach ($arr_enrollments as $val){
					$gid = $val['gid'];
				}
				echo '<img src="images/okay.png"> <p> Participant Enrolled Successfully</p><br><strong>GID:</strong><h3 class="gid">TXTRA'.$gid.'</h3>';
			
			
			break;

		case 'checkgid':

			$gid1 = $_REQUEST['gid1'];
			$gid2 = $_REQUEST['gid2'];
			$gid3 = $_REQUEST['gid3'];
			$gid4 = $_REQUEST['gid4'];
			$gid5 = $_REQUEST['gid5'];
			$domain = $_REQUEST['domain'];

			if($gid1)
			{
				$sql = "SELECT gid FROM mrd WHERE gid = '$gid1'";
				$query = $pdoconn->prepare($sql);
				$query->execute();
				$arr_enrollments = $query->fetchAll(PDO::FETCH_ASSOC);
				if(count($arr_enrollments) == 0)
				{
					echo 'GID: TXTRA'.$gid1.' Not Found';
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
					echo 'GID: TXTRA'.$gid2.' Not Found';
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
					echo 'GID: TXTRA'.$gid3.' Not Found';
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
					echo 'GID: TXTRA'.$gid4.' Not Found';
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
					echo 'GID: TXTRA'.$gid5.' Not Found';
					break;
				}
			}

			$flag = 0;
			$sql = "SELECT gid FROM rd WHERE domain = '$domain'";
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
				echo 'GID: TXTRA'.$invalid_gid.' already played in '.$domain.' domain';
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

			$cevents = array("Code Novice", "Code Virtuso", "Web O Mania","Prisoner of Azkaban", "Knights Watch", "Final Destination", "El Clasico", "NFS","FIFA 11", "Setu Bandhan", "Track O Treasure", "Photography", "Videography");
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
				$end = 6;
			}
			else if($evnt == "Gaming Combo")
			{
				$start = 7;
				$end = 8;
			}
			else if($evnt == "Civil Combo")
			{
				$start = 9;
				$end = 10;
			}
			else if($evnt == "General Combo")
			{
				$start = 11;
				$end = 12;
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

			$html = "<table>
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
	        					<td><input type = 'submit' class = 'played' value = 'Played' onclick = 'delteam(\"".$tid."\",\"".$evnt."\")'>
	        					<td><input type = 'submit' class = 'view-gid' value = 'View GIDs' onclick = 'viewGid(\"".$tid."\")'>
	        				</tr>";
	        		$slno++;
	        	}
	        $html.="</table>";
	        echo $html;
	        }
	        else
	        {
	        	echo "No Teams Found";	
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
	        	$gidlist.="TXTRA".$val['gid']." - ";
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
?>