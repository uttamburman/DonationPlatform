<?php
      include ('data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
	  $mysqli = new mysqli('www.helpinghandsgroup.in', 'helpinen_hdbase', 'Utt@m7828686674', 'helpinen_hdbase');

	  $data = json_decode(file_get_contents("php://input"));
	  
	  $aid =$data->aid;
	  $dte=date("Y-m-d");    /* check connection */
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
     session_start();
		if (isset($_SESSION["eid"])) {
			$eid=$_SESSION["eid"];
			
			$sno = 10000001;
	  		$sql="";
				$resx1=$connection->selectTable("SELECT sid from allsubmit order by arid desc limit 1;");
				if ($resx1->num_rows > 0) 
				{
						while($featrow = $resx1->fetch_assoc()) 
						{
							$sno=$featrow["sid"]+1;
						}
				}
				$sid=$sno;
				$resx2=$connection->selectTable("SELECT count(*) as count from tempsubmit where segment='legend';");
				if ($resx2->num_rows > 0) 
				{					
					while($row = $resx2->fetch_assoc()) 
						{
							$legendcount=$row["count"];
							if($legendcount<5){	
							$resx3=$connection->selectTable("SELECT count(*) as count from tempsubmit where segment='legend' && eid='".$eid."';");
							if ($resx3->num_rows > 0) 
							{					
								while($row1 = $resx3->fetch_assoc()) 
								{
									$submitcount=$row1["count"];
									if($submitcount<1){			
													$stmt = $mysqli->prepare("insert into tempsubmit values(?,?,?,?,'legend');");
													$stmt->bind_param('ssss', $sno , $aid , $eid , $dte);
													
													$stmt1=$mysqli->prepare("insert into allsubmit values(?,?,?,?,'legend','submitted');");
													$stmt1->bind_param('ssss', $sno , $aid , $eid , $dte);
													
													$stmt2 = $mysqli->prepare("update story_meta set submitted='s' where arid=?;");
													$stmt2->bind_param('s' , $aid );
													$stmt->execute();
													$stmt1->execute();
													$stmt2->execute();
													echo "done";
									}
									else{
										echo "already";
									}
								}
							}
							}
							else{
								echo "packed";
							}
						}
				}
				
				
		}
    

?>