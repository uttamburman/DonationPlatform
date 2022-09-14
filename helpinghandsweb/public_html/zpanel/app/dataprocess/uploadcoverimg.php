<?php
ini_set("display_errors",1);
include ('data.php');
	  $connection = new createConnection();
      $connection->connectToDatabase(); 
      $connection->selectDatabase();
if(isset($_POST))
{
    $aid=$_POST['cvarticid'];
    $Destination = "/home/helpinen/public_html/cdn/".$aid;
	if (!file_exists($Destination)) {
	  mkdir($Destination, 0777, true);
	}
    if(!isset($_FILES['CoverImageFile']) || !is_uploaded_file($_FILES['CoverImageFile']['tmp_name']))
    {
        die('Something went wrong with Upload!');
		echo "Dude";
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
    
    $ImageName      = str_replace(' ','-',strtolower($_FILES['CoverImageFile']['name']));
    $ImageType      = $_FILES['CoverImageFile']['type']; //"image/png", image/jpeg etc.

    $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
    $ImageExt = str_replace('.','',$ImageExt);

    //$ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);

    //Create new image name (with random number added).
	$random= generateRandomString();
    $NewImageName = $random.'.'.$ImageExt;
    $newname=   $random;
	$stringname = $_FILES['CoverImageFile']['tmp_name'];
	$fsize= filesize($stringname);
	echo "File Size:- ".$fsize;
	if($fsize<620000){
    move_uploaded_file($_FILES['CoverImageFile']['tmp_name'], "$Destination/$NewImageName");
	$Destinationr=$Destination."/400";
	if (!file_exists($Destinationr)) {
	  mkdir($Destinationr, 0777, true);
	}	
	$file = $Destination.'/'.$NewImageName;
	$resize_image = $Destinationr."/".$newname."_400.".$ImageExt;; 
    $actual_image = $Destination."/".$newname.".".$ImageExt;;
	list( $width,$height ) = getimagesize( $file );
	$newwidth = 360;
	$newheight = 240;
	$thumb = imagecreatetruecolor( $newwidth, $newheight );
    $source = imagecreatefromjpeg( $actual_image );
	imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
	imagejpeg( $thumb, $resize_image, 70 );
	
	
	 session_start();
	    $eid="";
		if (isset($_SESSION["eid"])) {
			$eid=$_SESSION["eid"];
		}	
		$sql="update story_meta set covimg='".$NewImageName."', thumbimg='".$newname."_400.".$ImageExt."' where arid='".$aid."' && eid='".$eid."';";
	  

	  $result=$connection->db_query($sql);
	
	}
	else{
		echo"too big";
	}
}