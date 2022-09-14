<?php
ini_set("display_errors",1);
if(isset($_POST))
{
    $Destination = "/home/helpinen/public_html/zpanel/app/users";
    if(!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name']))
    {
        die('Something went wrong with Upload!');
    }

    $RandomNum   = rand(0, 9999999999);
    
    $ImageName      = str_replace(' ','-',strtolower($_FILES['ImageFile']['name']));
    $ImageType      = $_FILES['ImageFile']['type']; //"image/png", image/jpeg etc.

    $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
    $ImageExt = str_replace('.','',$ImageExt);

    $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);

    //Create new image name (with random number added).
    $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
    
    move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
    echo '<table width="100%" border="0" cellpadding="4" cellspacing="0">';
    echo '<tr>';
    echo '<td align="center"><img src="app/users/'.$NewImageName.'"></td>';
    echo '</tr>';
    echo '</table>';
}