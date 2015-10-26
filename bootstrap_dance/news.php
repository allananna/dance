<?php
session_start();

if(!$_SESSION['email']){
    header("location: signup.php");
}
?>
<html>
    <head>
        <title>News</title>
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
			h1,p,b{
				color:#FFF;
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
                    <li ><a href="home.php">Home</a></li>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="news.php">News</a></li>
                    <li><a href="contacts.html">Contacts</a></li>
                </ul>
                
            </div>
            
            <div class="col-sm-8">
                <h1> News </h1>
                <p>Dance is a performance art form consisting of purposefully selected sequences of human movement. This movement has aesthetic and symbolic value, and is acknowledged as dance by performers and observers within a particular culture.Dance can be categorized and described by its choreography, by its repertoire of movements, or by its historical period or place of origin.
                    <br><br>
                An important distinction is to be drawn between the contexts of theatrical and participatory dance, although these two categories are not always completely separate; both may have special functions, whether social, ceremonial, competitive, erotic, martial, or sacred/liturgical. Others disciplines of human movement are sometimes said to have a dance-like quality, including martial arts, gymnastics, figure skating, synchronized swimming and many other forms of athletics.
                </p>
            </div>

            <div class="col-sm-4">
                <img src="images/Kuchipudi-Dance.jpg" alt="dance" width="350px" height="460px">
            </div>

            <div class="col-sm-4">
                        <center><h4><b>Ballet, also known as classical dance</b></h4></center>
                        <p>Ballet is a type of performance dance that originated in the Italian Renaissance courts of the 15th century and later developed into a concert dance form in France and Russia. It has since become a widespread, highly technical form of dance with its own vocabulary based on French terminology. It has been globally influential and has defined the foundational techniques used in many other dance genres. Ballet requires years of training to learn and master, and much practice to retain proficiency.</p>
                        <button type="button" class="btn btn-info">Read More</button>
                    </div>

                    <div class="col-sm-4">
                        <center><h4><b>Bharatanatyam (Indian classical dance)</b></h4></center>
                        <p>Bharathanatyam is a form of Indian classical dance that originated in the temples of Tamil Nadu. It was described in the treatise Natya Shastra by Bharata around the beginning of the common era[citation needed]. Bharata Natyam is known for its grace, purity, tenderness, expression and sculpturesque poses. Lord Shiva is considered the God of this dance form. Today, it is one of the most popular and widely performed dance styles and is practiced by male and female dancers all over the world, although it is more commonly danced by women.</p>
                        <button type="button" class="btn btn-info">Read More</button>  
                    </div>

                    <div class="col-sm-4">
                        <center><h4><b>Kuchipudi (Classical Indian Dance)</b></h4></center>
                        <p>Kuchipudi is a Classical Indian dance from Andhra Pradesh, India. It is also popular all over South India. Kuchipudi is the name of a village in the Divi Taluka of Krishna district that borders the Bay of Bengal. According to legend, an orphan named Siddhendra Yogi is considered to be the founder of the Kuchipudi dance-drama tradition. The dance is accompanied by song which is typically Carnatic music. Kuchipudi dancers are quicksilver and scintillating, rounded and fleet-footed, they perform with grace and fluid movements.</p>
                        <button type="button" class="btn btn-info">Read More</button>
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