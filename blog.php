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
      <title>Blog</title>
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
               <div class="menu_main">
                  <ul>
                     <li><a href="index.php">Home</a></li>
                     <li><a href="about.php">About</a></li>
                     <li><a href="services.php">Services</a></li>
                     <li class="active"><a href="blog.php">Blog</a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <!-- header section end -->
      <!-- blog section start -->
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


      <!-- blog section end -->
      <!-- footer section start -->
      
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="">
         <div class="">
         <p class="">2023 in university chlef - algeria. Design by khalida and aida</p>
         </div>
      </div>
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