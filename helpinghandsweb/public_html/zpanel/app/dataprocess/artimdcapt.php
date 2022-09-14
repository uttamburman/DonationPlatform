<?php
 $mysqli = new mysqli('www.helpinghandsgroup.in', 'helpinen_hdbase', 'Utt@m7828686674', 'helpinen_hdbase');

$data = json_decode(file_get_contents("php://input"));
	  $eid="";
	  $capt="";
	  $mid="";
	  $capt = $data->capt;
	  $mid = $data->mid;
	  $aid =$data->aid;
    /* check connection */
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
     session_start();
		if (isset($_SESSION["eid"])) {
			$eid=$_SESSION["eid"];
			$stmt = $mysqli->prepare("update story_content set medcapt=? where recid=?;");
    		$stmt->bind_param('ss', $capt , $mid);
			$stmt->execute();
			echo $capt;
		}
    

?>