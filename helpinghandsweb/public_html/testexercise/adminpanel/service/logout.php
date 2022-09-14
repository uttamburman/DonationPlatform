<?php
 session_start();
if (isset($_SESSION["uname"])) {
	
	session_destroy();
	echo "correct";
	
}
else{
	echo "correct";
	
}
?>