<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $email = $_POST["email"];
  $comment = $_POST["comment"];
  

  $sl_command = "INSERT INTO feedbackoffer (id,$comment,Idoffer,status,DateRegistration,statupaid,nbr)
  values(null,$idtourist,$id,'en attente',NOW(),'en attente',$_POST[nbr])";
                    $rsult = mysqli_query($conn , $sl_command);
                    if($rsult){
                     echo"<div class='success'>Your demende was sent successfully!
                     che</div>
                     ";
 
}}
?>