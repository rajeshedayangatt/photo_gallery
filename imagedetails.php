<?php include('header.php'); ?>
<?php include_once('server/db.php'); ?>
<?php 

$id  = $_GET['id'];

$sql = "SELECT * FROM tbl_images WHERE image_id = '$id'";

$query = $db->query($sql);

$result = $query->fetch_all(MYSQLI_ASSOC);

?>

<div class="container-fluid">
<?php  foreach($result as $r): ?>

	<a id="x" href="image_files.php?id=<?php echo $r['category']; ?>" class="btn btn-danger"><i class="fa fa-arrow-left fa-2x" aria-hidden="true"></i>
</a>
<hr>

<a href="#" class="pull-right" onclick="remove(<?php echo $r['image_id']; ?> )">RemoveImage</a>
       <div class="image-block col-sm-8" style="background: url(img/<?php echo $r['image_url']; ?>) no-repeat center top;background-size:cover;">
            <p> <?php echo $r['image_name']; ?> </p>
        </div>
        <div class="col-md-4">
        	<h1><?php echo $r['image_name']; ?></h1>
        	<hr>
        	<p>
        		<?php echo $r['image_description']; ?>
        	</p>
        </div>
  <?php  endforeach; ?>   	
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
    height:500px;
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

<script>
      function remove(i) {


    var r = confirm("are you wanted to remove image?");

    if(r){
        $.ajax({
            type:'post',
            url :"server/image_remove.php",
            data:"id="+i,
            success:function(r) {
                alert(r);
                location.href="home.php";

            }

        });


    }

    return false;
  }
</script>