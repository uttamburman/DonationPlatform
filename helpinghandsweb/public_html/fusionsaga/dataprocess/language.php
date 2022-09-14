
<?php
if(!isset($_COOKIE['lang'])) {
    echo "new";
} else {
    echo $_COOKIE['lang'];
}
?>