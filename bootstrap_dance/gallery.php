<?php
session_start();

if(!$_SESSION['email']){
    header("location: signup.php");
}
?>
<html>
    <head>
        <title>Gallery</title>
            <link rel="stylesheet" href="CDN/bootstrap.min.css">
            <script src="CDN/jquery.min.js"></script>
            <script src="CDN/bootstrap.min.js"></script>

            <link href="css/bootstrap.css" rel="stylesheet">
            <link href="css/full-slider.css" rel="stylesheet">
            <style type="text/css">
            body{
               background-image:url(images/backg.jpg);
				background-attachment:fixed;
            }
            .container {

                padding: 10px;
                border-radius: 50px;

            }
            
            #myCarousel{
                height:500px;
            }
            </style>   

            
    </head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-sm-6" style="height:100px; top:0px; left:0px; right:0px; ">
                <center><img src="images/nd_dance_academy_logo.png" alt="dance_header_img" width="320" height="100"></center>
            </div>

            <div class="col-sm-6" style="height:100px;">
                <b>Welcome:</b><br>
                <font color='red' size='2'>
                    <?php
                        echo $_SESSION['email'];
                    ?>
                </font>
                   
                    <a href="logout.php">Logout</a>
                
                </font>
            </div>

            <div class="col-sm-12">

                <ul class="nav nav-pills nav-justified">         <!-- nav-stacked -->
                    <li><a href="home.php">Home</a></li>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="news.php">News</a></li>
                    <li><a href="contacts.html">Contacts</a></li>
                </ul>
                
            </div>

            <div class="col-sm-12">
                <h1><font color="#FFFFFF"> Images and Videos </font></h1>
                
                <form action="gallery.php" method="post" enctype="multipart/form-data">
                   <font color="#FFFFFF"> Select file to upload:
                    <input type="file" name="file" id="fileToUpload"></font>
                    <input type="submit" value="Upload" name="submit">
                </form>

                <?php
                    $con = mysqli_connect("localhost","root","","dance_db") or die(mysqli_error);

                    if(isset($_POST['submit'])){
                    
                        if((($_FILES['file']['type'] == "image/gif") || ($_FILES['file']['type'] == "image/jpeg") || ($_FILES['file']['type'] == "image/png") || ($_FILES['file']['type'] == "image/pjpeg")) && ($_FILES['file']['size'] < 2000000)){
                    
                            if($_FILES['file']['error'] > 0){
                                echo "Return code : ". $_FILES['file']['error'];
                            }
                            else
                            {
                                echo "Upload : ". $_FILES['file']['name'] . "<br>" ;
                                echo "Type : ". $_FILES['file']['type'] . "<br>" ;
                                echo "Size : ". $_FILES['file']['size']/1024 . "KB<br>" ;
                                echo "Tempfile : ". $_FILES['file']['tmp_name'] . "<br>" ;

                                if(file_exists("images/" . $_FILES['file']['name'])){
                                    echo $_FILES['file']['name'] . "<br>File Already Exists";
                                }
                                else
                                {
                                    move_uploaded_file($_FILES['file']['tmp_name'], "images/" . $_FILES['file']['name']);
                                    echo "Stored in :" . "images/" . $_FILES['file']['name'];
                                }
                            }
                        }
                        else
                        {
                            echo "Invalid file";
                        }
                    }
                    ?>
                                                    <!--<?php

                                                        if(isset($_GET["img"]))
                                                        {
                                                            $n=$_GET["img"];
                                                            echo "<img src='photos/".$n."'>";
                                                        }
                                                        
                                                        $fn=$_FILES["file"]["name"];
                                                           
                                                            if(!empty($fn))
                                                            {
                                                                $res = move_uploaded_file($_FILES["file"]["tmp_name"],"photos/".$fn);
                                                                if($res)
                                                                {
                                                                    header("location:gallery.php?img=".$fn);
                                                                }
                                                            }

                                                ?>-->
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
                }
            ?>
            <?php 
                $sql = "SELECT * FROM tb_video1";
                $query = mysqli_query($con, $sql) or die(mysqli_error($con));
                $videoCount = mysqli_num_rows($query);
                if($videoCount){
                    echo '<div class="row">';
                    while($videoRes = mysqli_fetch_array($query)){
                        echo '<div class="col-sm-6"><div class="well">
                                    <video width="400px"  height="180" controls>
                                      <source src="videos/'.$videoRes['video'].'" type="video/mp4">
                                       <source src="videos/'.$videoRes['video'].'" type="video/ogg">
                                       <source src="videos/'.$videoRes['video'].'" type="video/webm"></video><br>
                                      <a href="#" class="" id="change_video">Change</a>
                                    '.$videoRes['title'].'<a href="delete.php?id=<?php echo $id; ?>"> <span class="glyphicon glyphicon-remove-circle" style="float:right;padding-right:50px"> </a>
                                </div>
                                </div>';
                    }
                    echo '</div>';
                }
                ?>
            </div>

            </div>
            
            <div class="col-sm-3">
                <h4><b>Main Services</b></h4>
                <ul>
                    <li><a href="#">Uploading Image and Videos</li>
                    <li><a href="#">Update links</li>
                    <li><a href="#">Check Videos</li>
                    <li><a href="#">Blogs</li>
                </ul>
            </div>
            
            <div class="col-sm-3">    
                <h4><b>Popular Items</b></h4> 
                <ul>
                    <li><a href="#">Jazz</li>
                    <li><a href="#">Hip-Hop</li>
                    <li><a href="#">Classical</li>
                    <li><a href="#">Salsa</li>
                </ul> 
            </div>
            
            <div class="col-sm-3">    
                <h4><b>Related links</b></h4>
                <ul>
                    <li><a href="#">Jazz</li>
                    <li><a href="#">Hip-Hop</li>
                    <li><a href="#">Classical</li>
                    <li><a href="#">Salsa</li>  
                </ul>
            </div>
            
            <div class="col-sm-3">  
                <h4><b>Contact Information</b></h4>   
                A-301, Megh Malhar Complex, Sector 11, Gandhinagar, Gujarat<br>
                Phone No :- 9898989898
            </div>

            <div class="footer">
            <div class="col-sm-12" style="height:100px;">
                    <font color="#000066" face="Georgia, Times New Roman, Times, serif">    
                    <font size="5">Dance Tube © 2015 | <a href="#">Privacy Policy</a></font>
                    </font>
            </div>
        </div>

        </div>
    </div>
     <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
    
</body>
</html>



