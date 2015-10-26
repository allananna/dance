<?php

$con = mysqli_connect("localhost","root","","dance_db") or die(mysqli_error($con));

$del = $_GET['id'];

$sql = "delete from tb_dancetype1 where id = '$del'";


if(mysqli_query($con, $sql)){
	echo "Row has been deleted";	
	
}

?>