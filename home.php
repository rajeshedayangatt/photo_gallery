

<?php include('header.php'); ?>
<?php if(empty($_SESSION['user_id'])){

  header("Location:index.php");
  } ?>
<?php include_once('server/db.php'); ?>
<?php

$query = $db->query("SELECT * FROM tbl_images");


$result = $query->fetch_all(MYSQLI_ASSOC);




?>



<div class="container">
	<button id="btn_file_toggle" class="btn btn-success">Upload Images</button>
<div class="jumbotron" id="file_div" style="display: none">
<form class="form-horizontal" id="uploadform" enctype="multipart/form-data">
  <fieldset>
    <legend>Image Gallery Upload</legend>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Image Title</label>
      <div class="col-lg-10">
        <input class="form-control" name="title" placeholder="Image Title" type="text">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Image Categories</label>
      <div class="col-lg-10">
        <input class="form-control" name="categories" placeholder="Image categories" type="text">
      </div>
    </div>
        <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Description</label>
      <div class="col-lg-10">
        <input class="form-control" name="description"  placeholder="Description" type="text">
      </div>
    </div>

            <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Image</label>
      <div class="col-lg-10">

       <span class="btn btn-default btn-file"><span>Choose file</span><input type="file" name="image" /></span>
      </div>
    </div>
  </fieldset></form>

<button name="fileupload" class="btn btn-primary" onclick="fileupload()">Upload</button>
</div>






<div class="container-fluid">
    <div class="row text-center">
        <h3 class="headermessage" style="color:#fff">Image Gallery</h3>
    </div>
    
    <div class="row">
<?php
$folder = "";
 $i=0; foreach($result as $r): ?>
	<?php if($i%4==0): ?>
		</div>

<div class="row">
	<?php endif; ?>

<?php if($folder != $r['category']): ?>
        <div onclick="imagedetails('<?php echo $r['category']; ?>')" class="image-block col-sm-3" style="background: url(img/folder.png) no-repeat center top;background-size:cover;">
            <p> <?php echo $r['category']; ?> </p>
        </div>

<?php endif; ?>
  <?php $i++; 
$folder = $r['category'];
  endforeach; ?>     
    </div>
</div>

<style>
    .btn-file {
        position: relative;
        overflow: hidden;
    }
    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }
.headermessage {
  margin: 19px;
  color: black;
  font-family: 'Open Sans', sans-serif;
  font-size: 16px;
  font-weight: bold;
}
.image-block {
    border: 3px solid white ;
    background-color: black;
    padding: 0px;    
    margin: 0px;
    height:200px;
    text-align: center;
    vertical-align: bottom;
}
.image-block > p {
    width: 100%;
    height: 100%;
    font-weight: normal;
    font-size: 19px;
    padding-top: 150px;
    background-color: rgba(3,3,3,0.0);
    color: rgba(6,6,6,0.0);
}
.image-block:hover > p {
    background-color: rgba(3,3,3,0.5);    
    color: white;    
}
</style>







</div>

<script>
  function imagedetails(i) {


   
    location.href = "image_files.php?id="+i;
  }
</script>

<?php include('footer.php'); ?>