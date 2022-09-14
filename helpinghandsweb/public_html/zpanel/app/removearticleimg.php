<?php
if(isset($_POST['file'])){
    $file = '/home/helpinen/public_html/zpanel/app/users/' . $_POST['file'];
    if(file_exists($file)){
        unlink($file);
    }
}
?>
