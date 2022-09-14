<?php
ini_set("display_errors",1);
include ('data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
if(isset($_POST))
{
	$aid=$_POST['articid'];
    $Destination = "/home/helpinen/public_html/cdn/".$aid;
	if (!file_exists($Destination)) {
	  mkdir($Destination, 0777, true);
	}
    if(!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name']))
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
    
    $ImageName      = str_replace(' ','-',strtolower($_FILES['ImageFile']['name']));
    $ImageType      = $_FILES['ImageFile']['type']; //"image/png", image/jpeg etc.

    $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
    $ImageExt = str_replace('.','',$ImageExt);

    //$ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);

    //Create new image name (with random number added).
    $NewImageName = generateRandomString().'.'.$ImageExt;
    
	
	$stringname = $_FILES['ImageFile']['tmp_name'];
	$fsize= filesize($stringname);
	//echo "File Size:- ".$fsize;
	if($fsize<620000){
	
    move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
	
	$rid = 10000001;
	$dte=date("d-m-Y");
	 session_start();
		if (isset($_SESSION["eid"])) {
			$eid=$_SESSION["eid"];
		}	
		$resx1=$connection->selectTable("SELECT recid from story_content order by recid desc limit 1;");
	    if ($resx1->num_rows > 0) {
    	while($featrow = $resx1->fetch_assoc()) {
			
			//echo"serial ".$featrow["count"]." - found";
			$rid=$featrow["recid"]+1;
			
			//echo"serial ".$sno." - generated";
		}	
		}
		$sql="insert into story_content values('".$rid."','".$aid."','".$NewImageName."','','','','image','".$dte."','','1');";
	  

	  $result=$connection->db_query($sql);
	  $resx2=$connection->selectTable("SELECT count(recid) as count from story_content where arid='".$aid."';");
	    if ($resx2->num_rows > 0) {
    	while($featrow1 = $resx2->fetch_assoc()) {
			
			//echo"serial ".$featrow["count"]." - found";
			$cont=$featrow1["count"];
			$sql1="update story_meta set mediacount='".$cont."' where arid='".$aid."';";
			$sql2="update story_content set medcnt='".$cont."' where recid='".$rid."';";
	        $result2=$connection->db_query($sql1);
			$result3=$connection->db_query($sql2);
			//echo"serial ".$sno." - generated";
		}	
		}
	
	echo '<div class="storymediadesc" id="'.$rid.'_desc"></div>';
    //echo '<table width="100%" border="0" cellpadding="4" cellspacing="0">';
//    echo '<tr>ID :-'.$aid;
//    echo '<td align="center"><img src="app/users/'.$aid.'/'.$NewImageName.'"></td>';
//    echo '</tr>Random String:- '.generateRandomString();
//    echo '</table>';
}
else{
	echo "File Size too big";
}
}