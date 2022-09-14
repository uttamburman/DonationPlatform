<?php
	  $data = json_decode(file_get_contents("php://input"));
	  $languag="";
	  $languag = $data->lang;
	  $cookie_name = "lang";
	  $cookie_value = $languag;
	  setcookie($cookie_name, $cookie_value, time() + (86400 * 90), "/"); // 86400 = 1 day
	  //echo "Cookie Set";
//	  echo $cookie_name;
//	  echo $cookie_value;
?>