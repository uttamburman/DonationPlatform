<?php
	  $mysqli = new mysqli('www.helpinghandsgroup.in', 'helpinen_hdbase', 'Utt@m7828686674', 'helpinen_hdbase');

	  $data = json_decode(file_get_contents("php://input"));
	  $eid="";
	  $intro="";
	  $intro = $data->intro;
	  $dte=date("d-m-Y");
	  if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
	  session_start();
	  if (isset($_SESSION["eid"])) 
	    {
			$eid=$_SESSION["eid"];
			$stmt = $mysqli->prepare("update membersdata set introd=?, moddt=? where id=?;");
    		$stmt->bind_param('sss', $intro , $dte , $eid);
			$stmt->execute();
			echo "success";
		}
?>