<?php
      include ('data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
	  $mysqli = new mysqli('www.helpinghandsgroup.in', 'helpinen_hdbase', 'Utt@m7828686674', 'helpinen_hdbase');

	  $data = json_decode(file_get_contents("php://input"));
	  $eid="";
	  $title="";
	  $slug="";
	  $title = $data->title;
	  $slug = $data->slug;
	  $aid =$data->aid;
	  $dte=date("d-m-Y");    /* check connection */
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
     session_start();
		if (isset($_SESSION["eid"])) {
			$eid=$_SESSION["eid"];
			
			$sno = 100001;
	  		$sql="";
			if($aid==="")
			{
				$resx1=$connection->selectTable("SELECT arid from story_meta order by arid desc limit 1;");
				if ($resx1->num_rows > 0) 
				{
						while($featrow = $resx1->fetch_assoc()) 
						{
							$sno=$featrow["arid"]+1;
						}
				}
				$aid=$sno;
				$stmt = $mysqli->prepare("insert into story_meta values(?,?,?,'','','','','people','','0','0',?,'0','','draft',?,'','',null ,'pending','','english','ns');");
				$stmt->bind_param('sssss', $aid , $eid , $title , $slug , $dte);
				$stmt->execute();
			}
			else{
				$stmt = $mysqli->prepare("update story_meta set title=?, slug=? where arid=? && eid=?;");
    		$stmt->bind_param('ssss' , $title , $slug , $aid , $eid);
			$stmt->execute();
			}
			echo $aid;
		}
    

?>