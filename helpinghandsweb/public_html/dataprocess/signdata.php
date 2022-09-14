<?php
include ('data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
	  $data = json_decode(file_get_contents("php://input"));
	  $name = $data->name;
	  $usrname = $data->username;
	  $passwrd = $data->password;
	  $contact = $data->contact;
	  $email = $data->email;	
	  $dte=date("d-m-Y");
	  $sno = 1001;
	  $resx1=$connection->selectTable("SELECT id from membersdata order by id desc limit 1;");
	  
	  if ($resx1->num_rows > 0) {
    	while($featrow = $resx1->fetch_assoc()) {
			
			//echo"serial ".$featrow["count"]." - found";
			$sno=$featrow["id"]+1;
			//echo"serial ".$sno." - generated";
		}
	  }
	  $sql = "insert into membersdata values('".$sno."','".$name."','".$usrname."','".$passwrd."','".$contact."','".$email."','','','hg".$sno."0307ut20b94','".$dte."','unverified','member','unverified','','','Red','','','','','','','','','','','',' ');";
	  $result=$connection->db_query($sql);
if($result==1){
		
		// store session data
		$mailto=$email;  //Enter recipient email address here

        $subject = "Email Verification Link";

        $from="helpinghands@helpinghandsgroup.in";          //Your valid email address here
		$headers  = "From: $from\r\n"; 
    	$headers .= "Content-type: text/html\r\n";


        $message_body = "
<html> 
<head>
<link href='https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
</head>
  <body> 

    <div style=\"display:block;position:relative;text-align:center;height:500px;width:600px;background-color:whitesmoke;border:0px solid #456;border-radius:3px;padding:10px;\">
	    <img src=\"http://helpinghandsgroup.in/images/brandinga.png\" style=\"display:block;position:relative;width:120px;height:120px; margin-left:auto;margin-right:auto;\">
        <p style=\"font-family:'Raleway';font-size:36px;width:100%;font-weight:700;color:#E54447;\">HELPING HANDS GROUP</p>
	<b>Confirm Your Email</b>
  	<b><br>Please Login and copy-paste the code provided</b>
	    <p style=\"font-size:16px; font-weight:500;color:black;width:100%;text-align:center;\">hg".$sno."0307ut20b94</p>
        <br/><a style=\"display:block; width:400px; height:40px;
		color:white;background:#E54447;border-style:none;margin-left:auto;
		margin-right:auto;text-decoration:none;padding-top:20px;font-size:16px; font-weight:500;\" href=\"www.helpinghandsgroup.in/members\">http://www.helpinghandsgroup.in/members</a></br>
		
    </div>
  </body>
</html>
";

        mail($mailto,$subject,$message_body,$headers);
		echo'created';
}


?>