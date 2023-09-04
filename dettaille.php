<?php 

require_once "connection.php";

$id =  $_GET["id"];

    session_start();
    if( empty($_SESSION["user"]) ){
        header("Location: admin/login.php");
    }
    $g=$_SESSION["user"];


?>



<style>
   button {
  display: inline-block;
  padding: 20px 20px;
  font-weight: bold;
  text-align: center;
  text-decoration: none;
  background-color: #7b5d6d;
  color: white;
  border: none;
  cursor: pointer;
}

button:hover {
  background-color: #45a049;
}

button:active {
  background-color: #3e9141;
}

.err {
  background-color: #d4edda;
  border-color: #c3e6cb;
  color: #155724;
  padding: 1rem;
  border-radius: 0.25rem;
}

.success {
  background-color: #d4edda;
  border-color: #c3e6cb;
  color: #155724;
  padding: 1rem;
  border-radius: 0.25rem;
}</style>
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
      <title>Services</title>
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
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
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
                           <a class="nav-link" href="about.html">About</a>
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
                    
                    $sql = "SELECT * FROM offer WHERE Idoffer = $id";
$result = mysqli_query($conn , $sql);
if( mysqli_num_rows($result) > 0){
    $i=0;
    while( $rows = mysqli_fetch_assoc($result) ){
        $id= $rows["Idoffer"];
        $offer_name= $rows["offer_name"];
        $destination= $rows["id_pay"];
        $amount= $rows["amount"];  
        $max= $rows["max_p"]; 
        $ps= $rows["ps"];  
        $hotel= $rows["Idhot"]; 
        $date_g= $rows["date_g"]; 
        $duree= $rows["duree"]; 
        $desc= $rows["desc"];
        $discount= $rows["discount"];
        $image = $rows["image"];
        $dis=$discount*$amount/100;
        $sl = "SELECT nom_pay FROM pay where id_pay='$destination'";
        $reslt = mysqli_query($conn , $sl);
        if(mysqli_num_rows($reslt) > 0){
            while($row = mysqli_fetch_assoc($reslt)){
                $pay = $row["nom_pay"];
              
                
            }
        }
        $sl = "SELECT name FROM hotel where Adress='$pay'";
        $reslt = mysqli_query($conn , $sl);
        if(mysqli_num_rows($reslt) > 0){
            while($row = mysqli_fetch_assoc($reslt)){
                $name = $row["name"];
              
                
            }
        }
    
    ?>
			   
			   
			   
                  <div class="col-md-4">
	<div><img src="admin/upload/<?php if(!empty($image)){ echo $image; }else{ echo "1.jpg"; }?>" class="services_img"></div>
                  </div>
   <div class="row">
   <div class="col-md-4">
                     <form method="POST"action="">
      
      <h2 style="width:400px" name="offer_name"><?php echo "$offer_name" ?></h2>
     
       <h5 style="width:400px"><span class="contact-text place"></span><?php echo "to $pay for $duree days" ?></h5>
              <h5 style="width:400px">date go : <?php echo " $date_g" ?></h5>
              <h5 style="width:400px">hotel name : <?php echo " $name" ?></h5>
          <h5 style="width:400px">amount : <?php echo "$amount <b>DZ</b>" ?></h5>
          <h5 style="width:400px"> discount : <?php echo "$discount" ?>%</h5>
          <h5 style="width:400px">amount by dicount :      <?php echo "   $dis <b>DZ</b>" ?></h5><br><br><br>
            
               <input type="number"max="<?php $max-$ps?>"name="nbr"style="width:300px"
              placeholder="enter the number of person ">

       <div class="btn_main"><button name="reserve">reserve</button></a></div></div><form></div></div>
            </div>
  
                    
                     



                    
    
                     <?php 
            $i++;
            
           
            
            if(isset($_POST['reserve'])){
    
               $k= $max-$ps;
               if ($k>$_POST['nbr']){
                  $p=$ps+$_POST['nbr'];






               require_once "connection.php";


               $sql = "UPDATE offer SET ps=$p WHERE Idoffer=$id ";
               $result = mysqli_query($conn , $sql);
               





               $email=$_SESSION['user'];
               $sql_command = "SELECT * FROM tourist WHERE email = '$_SESSION[user]' ";
   $result = mysqli_query($conn , $sql_command);
   if( mysqli_num_rows($result) > 0){
      while( $rows = mysqli_fetch_assoc($result) ){
         
          
          $idtourist= $rows["idtourist"];
         
      }
   }   
   
   
 
  

$sl_command = "INSERT INTO reservation (id,idtourist,Idoffer,status,DateRegistration,statupaid,nbr)
values(null,$idtourist,$id,'en attente',NOW(),'en attente',$_POST[nbr])";
                  $rsult = mysqli_query($conn , $sl_command);
                  if($rsult){
                   echo"<b><div class='success'>Your demende was sent successfully!
                   <br> please check your profile when the demande accept go to paid <br> 
                   ";
                  $t= $_POST['nbr']* $dis ;
               echo $t;?>
              <?php
               echo " <b> DZ</b></div></b>";
                  








}else{echo "problm";}


                  
           

          





           }else{

            echo "<div class='err'>we are sorry there are no place for ";
            echo $_POST['nbr'];
            echo " person</div>";
           }}}}
            ?>
     



</script>
                  </div>
                  
               </div>
            </div>
         </div>
      </div>
      
      <!-- services section end -->
     
      <!-- copyright section start -->
      <div class="">
         <div class="container">
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