<?php
 $mysqli = new mysqli('www.helpinghandsgroup.in', 'helpinen_hdbase', 'Utt@m7828686674', 'helpinen_hdbase');

$data = json_decode(file_get_contents("php://input"));
	  $eid="";
	  $descrpt="";
	  $descrpt = $data->descrpt;
	  $aid =$data->aid;
    /* check connection */
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
     session_start();
		if (isset($_SESSION["eid"])) {
			$eid=$_SESSION["eid"];
			$stmt = $mysqli->prepare("update story_meta set storydesc=? where arid=? && eid=?;");
    		$stmt->bind_param('sss', $descrpt , $aid, $eid);
			$stmt->execute();
			echo $descrpt;
		}
    

?>