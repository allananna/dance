<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dance Club</title>
<link rel="stylesheet" href="CDN/bootstrap.min.css">
  <script src="CDN/jquery.min.js"></script>
  <script src="CDN/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
    	<div class="row" style="position:relative;display:block;">
        		<div class="col-sm-4" style="background-color:#066">
            		<img src="images/lady_gaga_logo_png_by_dontcallmeeve-d4gvkl3.png" alt="lady_gaga_dance"  width="300px" height="100px;"  />
            	</div>
            
            	<div class="col-sm-4" style="background-color:#066;height:100px";>
        			<font color="#000066" face="Georgia, Times New Roman, Times, serif" size="5">
                    <font color="#FFFFFF">Dance Tube Admin Panel</font>
      				</font>
                </div>
            	
                <div class="col-sm-4"style="background-color:#066; height:100px;">
        			<font size="2px" color="#FFFFFF">Welcome Admin,</font>
                    <div class="btn-group">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="margin-top:10px">
                  	<span class="glyphicon glyphicon-cog">  Settings</span>
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">	
                    	<li><a href="#">Account Settings</a></li>
                        <li><a href="#">Privacy Settings</a></li>
                        <li><a href="#">Help</a></li>
                    </ul>
                </div>
                    <div class="btn-group">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="margin-top:10px">
                  	<span class="glyphicon glyphicon-user"> Admin</span>
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">	
                    	<li><a href="#">My Account</a></li>
                        <li><a href="#">My Groups</a></li>
                        <li><a href="#">Logout</a></li>
                    </ul>
               	</div>
                   	
              </div>
      	</div>
      
        <div class="row">
            <div class="col-sm-3 well" style="background-color:#063;height:725px;" >
            	<ul class="nav nav-pills nav-stacked">
        			<li><a href="manage_types.php"><button type="button" class="btn btn-default btn-sm">
          			<span class="glyphicon glyphicon-chevron-right"></span>
       				 </button><strong style="color:#FFF"> Manage Dance Types</strong></a></li>
    				
                    <li><a href="manage_videos.php"><button type="button" class="btn btn-default btn-sm">
         				 <span class="glyphicon glyphicon-chevron-right"></span>
        				</button><strong style="color:#FFF"> Manage Dance Videos</strong></a></li>
        		</ul>		
            	
			</div>
             <div class="col-sm-9 well">
             <?php
			 $con = mysqli_connect("localhost","root","","dance_db") or die(mysqli_error);
			 ?>
           
             
