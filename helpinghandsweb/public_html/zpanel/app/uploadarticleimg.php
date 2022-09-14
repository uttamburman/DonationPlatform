<?php
ini_set("display_errors",1);
if(isset($_POST)){
	echo var_dump($_POST)."-";
	if(!isset($_FILES['objectId']))
    {
        
		echo "Asshole Dude";
    }
}
?>