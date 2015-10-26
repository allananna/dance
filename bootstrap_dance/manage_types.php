<?php

	include("Dance_tube.php");

?>

<h1 align="center"><div class="well" style="background-color:#063; color:#FFF">Dance List</h1>
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ADD NEW <span class="glyphicon glyphicon-plus"></span></button>

<?php
	 $con = mysqli_connect("localhost","root","","dance_db") or die(mysqli_error($con));

	if(isset($_REQUEST['submit']))
	{
		print_r($_REQUEST);
		extract($_REQUEST);
		$sql = "INSERT INTO `tb_dancetype1`(dance_name, description) VALUES ('$dance_name','$description')";
		
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

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        	<div class="modal-header">
          		<button type="button" class="close" data-dismiss="modal">&times;</button>
          		<h4 class="modal-title">Dance Form</h4>
        	</div>
            <form method="post">
        	<div class="modal-body">
        		
          			Dance Name :&nbsp;<br /><input type="text" name="dance_name" /><br />
          			Dance Description :&nbsp;<br /><textarea name='description' rows="4" cols="20">
          										</textarea>
        	</div>
       		<div class="modal-footer">
        		<button type="submit" class="btn btn-default"  name="submit">Submit</button>
       			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
        	</div>
       		</form>
      </div>
 </div>
</div>

<!-- Edit Modal PopupHTML Start -->
<!-- Modal -->
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Dance Edit Form</h4>
          </div>
            
         <div class="modal-body">
                <input type="hidden" name="identification" id="identification" />                
                Dance Name :&nbsp;<br /><input type="text" name="dance_name_edit" id="dance_name_edit" /><br />
                Dance Description :&nbsp;<br /><textarea name='description_edit' id="description_edit" rows="4" cols="20">
                              </textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default edit-form"  name="submit">Submit</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
          </div>
          
      </div>
 </div>
</div>
<!-- Edit Modal PopupHTML End -->
<div id='div_dtypes'>
<table class="table table-hover">
	<thead>
		<tr>
    		<th>Dance Name </th>
        	<th>Dance Description </th>
        	<th>Edit </th>
        	<th>Delete </th>
        </tr>
    </thead>
    
    <tbody>

	<?php
	
	$sql = "SELECT * FROM tb_dancetype1";
	
	$res = mysqli_query($con, $sql);
	
	while($dance=mysqli_fetch_assoc($res))
	{
		extract($dance);	
		
	?>
    
    
	    <tr>
        	 <td><?php  echo $dance_name; ?></td>
            <td>
              <a href="javascript:void(0);" style="text-decoration:none" title="Tango" data-toggle="popover" data-placement="right" data-content="In June 1934 Maya Plisetskaya was admitted to the Moscow Ballet School.Years of study have fallen on hard times: the father and mother Plisetskaya were persecuted, and then the war started and Maya with her mother, who returned from prison, he had to go to the evacuation."><?php echo $description; ?></a>
            </td>  			
            <td>
              <a class="edit-operation" href="javascript:void(0);" data-identification="<?php echo $id; ?>"><span class="glyphicon glyphicon-edit"></span></a>
            </td>
            <td><a href="delete.php?id=<?php echo $id; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
        </tr>
	<?php
	}
	?>

    
    </tbody>
</table>

<script type="text/javascript">
$(document).ready(function(){
    $('a[data-toggle="popover"]').popover();
    $(".edit-operation").click(function(){
      alert('hello');
      var dance_name = $(this).parent().prev().prev().html();
      var dance_desc = $(this).parent().prev().children().html();
      $("#dance_name_edit").val(dance_name);
      $("#description_edit").val(dance_desc);
      $("#identification").val($(this).attr("data-identification"));
      $('#myModal1').modal('show');
    });

    $(".edit-form").click(function(){
        var dance_name = $("#dance_name_edit").val();
        var dance_desc = $("#description_edit").val();
        var id = $("#identification").val();

        if (dance_name == "" || dance_desc == "") {
            alert("Please fill up the form.");
            return;
        } else { 
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                       $('#myModal1').modal('hide');  
                       $('#div_dtypes').html(xmlhttp.responseText);           
                }
            }
            xmlhttp.open("GET","edit-dance-ajax.php?id="+id+"&dance_name="+dance_name+"&dance_desc="+dance_desc,true);
            xmlhttp.send();
        }
    });
});
</script>          
</div>
<?php
include("footer.php");
?>
				