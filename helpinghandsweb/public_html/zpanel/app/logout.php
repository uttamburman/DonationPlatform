
<?php
 session_start();
if (isset($_SESSION["email"])) {
	
	session_destroy();
	echo "correct";
	
}
else{
	echo "correct";
	
}
?>