<?php
include('db.php');

$id = $_POST['id'];

//unlink image

$query1 = $db->query("SELECT image_url FROM tbl_images WHERE image_id = '$id'");

$result = $query1->fetch_all(MYSQLI_ASSOC);

$server  = $_SERVER['DOCUMENT_ROOT'];
foreach($result as $r) 
{

	$path = $server."/image_gallery/img/".$r['image_url'];


}

//path removed
if(unlink($path)){

	$query = $db->query("DELETE FROM tbl_images WHERE image_id = '$id'");

	if($query){
		echo "success";
	}else {

		echo $db->error;
	}
}

