<?php

	include("Dance_tube.php");
	

?>
<?php
	
	$sql = "SELECT id, dance_name FROM tb_dancetype1";
	$query = mysqli_query($con, $sql) or die(mysqli_error($con));
	$danceTypeCount = mysqli_num_rows($query);
	
	if(isset($_REQUEST['submit']))
	{	

		if(isset($_FILES['upload']['tmp_name'])){
			$filename = rand().$_FILES['upload']['name'];
			$dest= "videos/".$filename;
			echo $dest;
			print_r($_FILES);
			if(move_uploaded_file($_FILES['upload']['tmp_name'], $dest))
			{
				
				echo "file uploaded....";	
			}
			else
			{
				echo $_FILES['upload']['error'];
				echo "unable to upload...";	
			}
		}

		$sql = "INSERT INTO `tb_video1`(title,description,dance_type,video) VALUES ('".$_POST['video_title']."','".$_POST['description']."','".$_POST['dance_type']."','".$filename."')";
		mysqli_query($con, $sql) or die(mysqli_error($con));
	
?>
	<br />
	<div class="alert alert-success">
    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  		<strong>Success!</strong> Indicates a successful or positive action.
	</div>
<?php
	}
?>
<h1 align="center"><div class="well" style="background-color:#063; color:#FFF">Dance videos</h1>
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ADD NEW <span class="glyphicon glyphicon-plus"></span></button>

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
         <form method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Video Form</h4>
        </div>
        <div class="modal-body">

        	<div class="form-group">
            	<label for="inputdefault">Video Title</label>
                <input class="form-control" id="video_title" name="video_title" type="text">
            </div>
            <div class="form-group">
            	<label for="inputdefault">Video Description</label>
				<textarea class="form-control" rows="5" name='description' rows="4" cols="20"></textarea>
            </div>
            
				
            <div class="form-group">
            	<label for="inputdefault">Dance Type</label>
					<select class="form-control" id="dance_type" name="dance_type">
        				<option>Jazz</option>
        				<option>HipHop</option>
        				<option>Classical</option>
        				<option>Western</option>
      				</select>
            </div>   
            <?php if($danceTypeCount){ ?>
                <?php while($result = mysqli_fetch_array($query)){
				?>
                	<option value="<?php echo $result['id']?>"><?php echo $result['dance_name']?></option>
                 <?php } ?>
                </select>

             
            <?php 
			} 
			?>    
			<div class="form-group">
            	<label for="inputdefault">Upload Video</label>
                <input type="file" name="upload" />           
            </div>
            
        </div>

        <div class="modal-footer">
        <button type="submit" class="btn btn-default"  name="submit">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
        </div>
        </form>
      </div>
      
    </div>
  </div>
  

<?php 
	$sql = "SELECT * FROM tb_video1";
	$query = mysqli_query($con, $sql) or die(mysqli_error($con));
	$videoCount = mysqli_num_rows($query);
	if($videoCount){
		echo '<div class="row">';
		while($videoRes = mysqli_fetch_array($query)){
			echo '<div class="col-sm-6"><div class="well">
						<video width="300px"  height="180" controls>
						  <source src="videos/'.$videoRes['video'].'" type="video/mp4">
						   <source src="videos/'.$videoRes['video'].'" type="video/ogg">
						   <source src="videos/'.$videoRes['video'].'" type="video/webm"></video><br>
						  <a href="#" class="" id="change_video">Change</a>
						<a href="delete.php?id=<?php echo $id; ?>">'.$videoRes['title'].' <span class="glyphicon glyphicon-remove-circle" style="float:right;padding-right:50px"> </a>
					</div>
					</div>';
		}
		echo '</div>';
	}
	?>


<?php

	include("footer.php");

?>