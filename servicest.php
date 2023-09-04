<?php 
    session_start();
    if( empty($_SESSION["user"]) ){
        header("Location: admin/login.php");
    }
    $g=$_SESSION["user"];
?><!DOCTYPE html>
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
      <title>more details</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Responsive-->
      <link rel="shortcut icon" href="travel.png">
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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         <div class="header_main">
            <div class="mobile_menu">
               <nav class="navbar navbar-expand-lg navbar-light bg-light">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                     <ul class="navbar-nav">
                        <li class="nav-item">
                           <a class="nav-link" href="offer.php">Home</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="aboutt.php">About</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="servicest.php">Services</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link " href="blogt.php">Blog</a>
                        </li>
                        
                     </ul>
                  </div>
               </nav>
            </div>
            <div class="container-fluid">
               <div class="menu_main">
                  <ul>
                     <li ><a href="offer.php">Home</a></li>
                     <li><a href="aboutt.php">About</a></li>
                     <li class="active"><a href="servicest.php">Services</a></li>
                     <li><a href="blogt.php">Blog</a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <!-- header section end -->
      <!-- services section start -->
      <div class="services_section layout_padding">
         <div class="container">
            
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
        $offer_name= $rows["offer_name"];
        $destination= $rows["id_pay"];
        $amount= $rows["amount"];   
        $date_g= $rows["date_g"]; 
        $duree= $rows["duree"]; 
        $id= $rows["Idoffer"];
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
   <form method="POST"action="">
                    <h2 name="offer_name"><?php echo "$offer_name" ?></h2>
                   
							<h6><span class="contact-text place"></span><?php echo "to $pay $duree days" ?></h6>
                            <h6><?php echo " $date_g" ?></h6>
				            <h6><?php echo "$$amount" ?></h6>
                  
                    
                        <div class="btn_main"><?php $det ="<a href='det.php?id={$id}'>more dettaille</a>";
                        echo $det;
                        ?>
                     </div></form></div>

                     <?php 
            $i++;
            
                
            }} ?>
                  </div>
                  
               </div>
            </div>
         </div>
      </div>
      
      <!-- services section end -->
    
      <!-- copyright section start -->
    
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