<?php
ini_set("display_errors",1);
	include ('data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
	  $data = json_decode(file_get_contents("php://input"));
	  $rid="";
	  $eid="";
	  $imgcap="";
	  $url="";
	  $imgcap = $data->imgcap;
	  $url = $data->url;
	  $aid =$data->id;
	  $dte=date("d-m-Y");
	  session_start();
	   if (isset($_SESSION["eid"])) {
			$eid=$_SESSION["eid"];
			$resx1=$connection->selectTable("SELECT recid from story_content order by recid desc limit 1;");
	    	if ($resx1->num_rows > 0) {
    			while($featrow = $resx1->fetch_assoc()) {
				$rid=$featrow["recid"]+1;
			}	
		}
		$sql="insert into story_content values('".$rid."','".$aid."','".$imgcap."','','','','video','".$dte."','".$url."');"; 
	    $result=$connection->db_query($sql);
	    $resx2=$connection->selectTable("SELECT count(recid) as count from story_content where arid='".$aid."';");
	    if ($resx2->num_rows > 0) {
    		while($featrow1 = $resx2->fetch_assoc()) {
				$cont=$featrow1["count"];
				$sql1="update story_meta set mediacount='".$cont."', storytype='video' where arid='".$aid."';";
	        	$result2=$connection->db_query($sql1);
			}		
				echo '<div class="storymediadesc" id="'.$rid.'_desc"></div>';
		}
	}	
		