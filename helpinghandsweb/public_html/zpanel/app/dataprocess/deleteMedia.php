<?php
 $mysqli = new mysqli('www.helpinghandsgroup.in', 'helpinen_hdbase', 'Utt@m7828686674', 'helpinen_hdbase');

$data = json_decode(file_get_contents("php://input"));
	  $eid="";
	  $capt="";
	  $mid="";
	  $mid = $data->rcid;
	  $aid =$data->aid;
    /* check connection */
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
     session_start();
		if (isset($_SESSION["eid"])) {
			$eid=$_SESSION["eid"];
			$stmt = $mysqli->prepare("delete from story_content where recid=?;");
    		$stmt->bind_param('s',  $mid);
			$stmt->execute();
			echo $mid;
		}
    

?>