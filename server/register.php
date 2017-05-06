<?php
include_once('db.php'); ?>
<?php


$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['passwd'];

$sql = "INSERT INTO tbl_users (email,username,password) VALUES ('$email','$username',$password)";

if($db->query($sql)){
	echo "success";
}else{
	echo $db->error;
}

?>