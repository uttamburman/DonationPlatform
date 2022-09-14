<?php
 $mysqli = new mysqli('www.helpinghandsgroup.in', 'helpinen_hdbase', 'Utt@m7828686674', 'helpinen_hdbase');

$data = json_decode(file_get_contents("php://input"));
	  $eid="";
	  $desc="";
	  $mid="";
	  $desc = $data->desc;
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
			$stmt = $mysqli->prepare("update story_content set meddesc=? where recid=?;");
    		$stmt->bind_param('ss', $desc , $mid);
			$stmt->execute();
			echo $desc;
		}
    

?>