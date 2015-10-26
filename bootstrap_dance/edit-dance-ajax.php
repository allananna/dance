<?php
	$con = mysqli_connect("localhost","root","","dance_db") or die(mysqli_error($con));

	$dance_name = $_REQUEST['dance_name'];
	$dance_desc = $_REQUEST['dance_desc'];
	$id = $_REQUEST['id'];
	$sql = "UPDATE `tb_dancetype1` SET `dance_name`='$dance_name',`description`='$dance_desc' WHERE id= $id";
	mysqli_query($con,$sql) or die(mysqli_error($con));

?>
		
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
	
