<?php include('header.php'); ?>
<?php if(empty($_SESSION['user_id'])){

  header("Location:index.php");
  } ?>
<?php include_once('server/db.php'); ?>
<?php


$cat = $_GET['id'];

$query = $db->query("SELECT * FROM tbl_images WHERE category  = '$cat'");


$result = $query->fetch_all(MYSQLI_ASSOC);



?>



<div class="container">






<div class="container-fluid">
    <a href="home.php" class="btn btn-danger"><i class="fa fa-arrow-left fa-2x" aria-hidden="true"></i>
</a>
<hr>
    <div class="row text-center">
        <h3 class="headermessage" style="color:#fff">Image Gallery</h3>
    </div>
    
    <div class="row">
<?php $i=0; foreach($result as $r): ?>
	<?php if($i%4==0): ?>
		</div>
<div class="row">
	<?php endif; ?>
        <div onclick="imagedetails('<?php echo $r['image_id']; ?>')" class="image-block col-sm-3" style="background: url(img/<?php echo $r['image_url']; ?>) no-repeat center top;background-size:cover;">
            <p> <?php echo $r['image_name']; ?> </p>
           
        </div>
  <?php $i++; endforeach; ?>     
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


   
    location.href = "imagedetails.php?id="+i;
  }


</script>

<?php include('footer.php'); ?>