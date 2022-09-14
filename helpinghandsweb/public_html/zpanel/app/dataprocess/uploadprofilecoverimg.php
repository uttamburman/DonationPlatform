<?php
ini_set("display_errors",1);
$eid="";
	 session_start();
		if (isset($_SESSION["eid"])) {
			$eid=$_SESSION["eid"];
		}	
include ('data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
if(isset($_POST))
{
	
    $Destination = "/home/helpinen/public_html/members/users/".$eid."/cover";
	if (!file_exists($Destination)) {
	  mkdir($Destination, 0777, true);
	}
    if(!isset($_FILES['ProfileCoverImageFile']) || !is_uploaded_file($_FILES['ProfileCoverImageFile']['tmp_name']))
    {
        die('Something went wrong with Upload!');
    }

    //$RandomNum   = rand(0, 9999999999);
	function generateRandomString($length = 20) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
   }
    
    $ImageName      = str_replace(' ','-',strtolower($_FILES['ProfileCoverImageFile']['name']));
    $ImageType      = $_FILES['ProfileCoverImageFile']['type']; //"image/png", image/jpeg etc.

    $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
    $ImageExt = str_replace('.','',$ImageExt);

    //$ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);

    //Create new image name (with random number added).
    $NewImageName = generateRandomString().'.'.$ImageExt;
    
	
	$stringname = $_FILES['ProfileCoverImageFile']['tmp_name'];
	$fsize= filesize($stringname);
	echo "File Size:- ".$fsize;
	if($fsize<205000){
    move_uploaded_file($_FILES['ProfileCoverImageFile']['tmp_name'], "$Destination/$NewImageName");
	
	$dte=date("d-m-Y");
	
		
		$sql="update membersdata set profcov='".$NewImageName."' where id='".$eid."';";
	  

	  $result=$connection->db_query($sql);	  
	}
	else{
		echo 'Too Big';
	}
	//echo '<div class="storymediadesc" id="'.$eid.'"></div>';
    //echo '<table width="100%" border="0" cellpadding="4" cellspacing="0">';
//    echo '<tr>ID :-'.$aid;
//    echo '<td align="center"><img src="app/users/'.$aid.'/'.$NewImageName.'"></td>';
//    echo '</tr>Random String:- '.generateRandomString();
//    echo '</table>';
}