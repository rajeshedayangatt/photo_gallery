<?php 
session_start();
include_once('db.php'); ?>
<?php

if(isset($_FILES['image'])){

$filename = $_FILES['image']['name'];
$filesize = $_FILES['image']['size'];
$filetype = $_FILES['image']['type'];
$filetmp  = $_FILES['image']['tmp_name'];
$title = $_POST['title'];
$description = $_POST['description'];
$cat = $_POST['categories'];
$file_name_new = time().$filename;



//checking user path created or not

$userpath = '../img/'.$_SESSION['username'].'/'.$cat;

if(!is_dir($userpath)){
	mkdir($userpath, 0777, true);
}

$imagepath = $userpath."/".$file_name_new;
$db_path = $_SESSION['username'].'/'.$cat.'/'.$file_name_new;
if(move_uploaded_file($filetmp, $imagepath)) {
	$id = $_SESSION['user_id'];
	$sql = "INSERT INTO tbl_images (user_id,image_url,category,image_name,image_description) VALUES ('$id','$db_path','$cat','$title ','$description')";

	if($db->query($sql)){
		echo "success";
	}else{
		echo $db->error;
	}


}
else
{
	echo $con->error;
}


}






?>
