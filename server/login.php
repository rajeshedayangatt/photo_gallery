<?php 
session_start();
include_once('db.php'); ?>
<?php 

$name = $_POST['username'];

$password = $_POST['password'];


$sql = "SELECT * FROM tbl_users WHERE username = '$name' AND password = '$password' ";

$query = $db->query($sql);

if($query->num_rows > 0) 
{
	$result = $query->fetch_all(MYSQLI_ASSOC);

	foreach($result as $r){
		$_SESSION['username'] = $r['username'];
		$_SESSION['user_id'] = $r['user_id'];
	}

	echo "success";
}else
{
	echo "error";
}





 ?>