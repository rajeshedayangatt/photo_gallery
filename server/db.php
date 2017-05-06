<?php

$db = new mysqli("localhost","root","","imageupload");

if($db->connect_error){
	echo $db->connect_error;
}

?>