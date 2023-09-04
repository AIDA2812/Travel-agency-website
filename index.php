<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
     
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Globetroltter's Gateway</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="admin/upload/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Righteous&display=swap" rel="stylesheet">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesheet" href="css/owl.theme.default.min.css">
      <link rel="shortcut icon" href="travel.png">
      
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         <div class="header_main">
            <div class="mobile_menu">
               <nav class="navbar navbar-expand-lg navbar-light bg-light">
                  <div class="logo_mobile">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                     <ul class="navbar-nav">
                        <li class="nav-item">
                           <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="about.php">About</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="services.php">Services</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link " href="blog.php">Blog</a>
                        </li>
                        
                     </ul>
                  </div>
               </nav>
            </div>
            <div class="container-fluid">
            <div class="logo"><a href="offer.php"><img style="height:40px;width:40px"src="travel.png"></a></div>
               <div class="menu_main">
                  <ul>
                     <li class="active"><a href="index.php">Home</a></li>
                     <li><a href="about.html">About</a></li>
                     <li><a href="services.php">Services</a></li>
                     <li><a href="blog.php">Blog</a></li>
                     <li> 
                        <a href="admin/login.php">login</a></a></li>
                  </ul>
               </div>
            </div>
         </div>
         <!-- banner section start -->
         <div class="banner_section layout_padding">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="container"><br><br><br><br><br>
                        <h1 class="banner_taital" style="color:#7b5d6d">Getway</h1>
                        <br><br><br><br><br>
                        <div><h2 style="color:black">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       
                        welcome to you</h2></div>
                     </div>
                  </div>
                  
               </div>
            </div>
         </div>
         <!-- banner section end -->
      </div>
      <!-- header section end -->
      <!-- services section start -->
      <div class="services_section layout_padding">
         <div class="container">
          <h2>Search Offer</h2>
  <form method="post" action="search.php">
    <label for="departure">Departure Date:</label>
    <input type="date" id="departure" name="date_g" required>
    
  
    
  
    
   
    
   
    
    <input type="submit" value="Search">
  </form>
            <div class="services_section_2">
            <h1 class="services_taital">our offer  </h1>
               <div class="row">
			   
			               <?php          
                    
                    include "connection.php";
                    
                    $sql = "SELECT * FROM offer";
$result = mysqli_query($conn , $sql);
if( mysqli_num_rows($result) > 0){
    $i=0;
    while( $rows = mysqli_fetch_assoc($result) ){
      $id= $rows["Idoffer"];
        $offer_name= $rows["offer_name"];
        $destination= $rows["id_pay"];
        $amount= $rows["amount"];   
        $date_g= $rows["date_g"]; 
        $duree= $rows["duree"]; 
        $desc= $rows["desc"];
        $discount= $rows["discount"];
        $image = $rows["image"];
        $sl = "SELECT nom_pay FROM pay where id_pay='$destination'";
        $reslt = mysqli_query($conn , $sl);
        if(mysqli_num_rows($reslt) > 0){
            while($row = mysqli_fetch_assoc($reslt)){
                $pay = $row["nom_pay"];
              
                
            }
        }

   
    
    ?>
			   
			   
			   
                  <div class="col-md-4">
	<div><img src="admin/upload/<?php if(!empty($image)){ echo $image; }else{ echo "1.jpg"; }?>" class="services_img"></div>
   
                    <h2 name="offer_name"><?php echo "$offer_name" ?></h2>
                   <input type="hidden"value="$id">
							<h6><span class="contact-text place"></span><?php echo "to $pay $duree days" ?></h6>
                            <h6><?php echo " $date_g" ?></h6>
				            <h6><?php echo "$amount  <b>DZ</b>" ?></h6><br>
                        <div class="btn_main"><?php $det ="<a href='det.php?id={$id}'>more dettaille</a>";
                        echo $det;
                        ?>
                        
                        
                    
                       </div>   
                    
                  </div>
                     <?php 
            $i++;
            
                
            }} ?>
                  </div>
                  
               </div>
            </div>
         </div>
      </div>
      <!-- services section end -->
      <!-- about section start -->
      <div class="about_section layout_padding">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-6">
                  <div class="about_taital_main">
                     <h1 class="about_taital">About Us</h1>
                     <p class="about_text">Globetroltter's Gateway is an incoming travel agency.we  organizing day trips and escorted tours in Spain, Portugal and Morocco. Through the years we have designed the best tours and activities for you. Enjoy the added value of the experience that has lead us to be leaders in the industry.

What are we working on at the moment? As of late, we decided to strengthen our line of premium experiences. Working together with local businesses and experts, we can offer a more personalized service. Come and enjoy a unique journey with <b>Globetroltter's Gateway</b>!

 </p>
                     <div class="btn_main"><a href="about.php">Read more</a></div>
                  </div>
               </div>
               <div class="col-md-6 padding_right_0">
                  <div><img src="images/about-img.png" class="about_img"></div>
               </div>
            </div>
         </div>
      </div>
      <!-- about section end -->
      <!-- blog section start -->
      
      <!-- blog section end -->
      <!-- client section start -->
      <div class="client_section layout_padding">
         <div class="container">
            <h1 class="client_taital">feedback of custumer</h1>
            <?php
             ?>
            
           
            
        <?php
        include "connection.php";
        $sql = "SELECT * FROM feedbkoffer";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($rows = mysqli_fetch_assoc($result)) {
                $id = $rows["id"];
                $Idoffer = $rows["Idoffer"];
                $idtourist = $rows["idtourist"];
                $text = $rows["text"];
                $date = $rows["date"];
                $s = "SELECT * FROM offer WHERE Idoffer=$Idoffer";
                $rest = mysqli_query($conn, $s);
                if (mysqli_num_rows($rest) > 0) {
                    while ($row = mysqli_fetch_assoc($rest)) {
                        $n = $row["offer_name"];
                        $im = $row["image"];
                    }
                }
                $sl = "SELECT * FROM tourist WHERE idtourist='$idtourist'";
                $reslt = mysqli_query($conn, $sl);
                if (mysqli_num_rows($reslt) > 0) {
                    while ($row = mysqli_fetch_assoc($reslt)) {
                        $name = $row["name"];
                        $email = $row["email"];
                        $image = $row["image"];
                    }
                }
        ?>

<div style="     background-color: #dbc8d2;
" class="comment">
    <div class="comment-header">
        <div class="author"><?php echo $name ?></div>
        <div class="email"><?php echo $email ?></div>
    </div>
    <div class="comment-content">
        <div class="avatar">
            <img src="admin/upload/<?php if (!empty($image)) { echo $image; } else { echo "1.jpg"; } ?>" class="avatar-image">
        </div>
        <div class="comment-text"><?php echo $text ?></div>
    </div>
    <div class="comment-footer">
        <div class="offer">
            <div class="offer-name"><?php echo $n ?></div>
            <div class="offer-image"><?php $nbsp;$nbsp;$nbsp;$nbsp;$nbsp;$nbsp;$nbsp;$nbsp;$nbsp;$nbsp;
            $nbsp;$nbsp;$nbsp;$nbsp;$nbsp;$nbsp;?>
                <img src="admin/upload/<?php if (!empty($im)) { echo $im; } else { echo "1.jpg"; } ?>" class="offer-image">
            </div>
        </div>
    </div>
</div>





        <?php
            }
        }
        ?>
    </div>
</div>

<style>
.comment {
  border: 1px solid #ccc;
  padding: 10px;
}

.comment-header {
  display: flex;
  justify-content: space-between;
  margin-bottom: 10px;
}

.author {
  font-weight: bold;
}

.email {
  color: #999;
}

.comment-content {
  display: flex;
  align-items: center;
}

.avatar {
  margin-right: 10px;
}

.avatar-image {
  width: 50px;
  height: 50px;
}

.comment-text {
  margin-right: 10px;
}

.comment-footer {
  display: flex;
  align-items: center;
}

.offer {
  display: flex;
  align-items: center;
}

.offer-name {
  font-weight: bold;
}

.offer-image {
  margin-left: 10px;
}

.offer-image img {
  width: 130px;
  height: 130px;
  text-align:right;
}

</style>
      <!-- client section start -->
      <!-- choose section start -->
      <div class="choose_section layout_padding">
         <div class="container">
            <h1 class="choose_taital">Why Choose Us</h1>
            <p class="choose_text">Honest prices – we have the best prices for tours, and a huge selection of destinations will not leave indifferent even avid tourist. Reliable partners – We work with the best tour operators who over the years have proven their professionalism. </p>
           
            
         </div>
      </div>
      <!-- choose section end -->
      
      <!-- copyright section start -->
      
            <p class="copyright_text"style="color:#f27e8f">2023 in university chlef - algeria. Design by khalida and aida</p>
        
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>    
   </body>
</html>