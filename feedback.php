<?php 
 if(isset($_POST['send'])){
    $sql_command = "SELECT * FROM tourist WHERE email = '$_SESSION[user]' ";
    $result = mysqli_query($conn , $sql_command);
    if( mysqli_num_rows($result) > 0){
       while( $rows = mysqli_fetch_assoc($result) ){
          
           
           $idtourist= $rows["idtourist"];
          
       }
    }   
    
    
    $ql_command = "SELECT Idoffer FROM offer WHERE offer_name = '$_POST[offer_name]' ";
    $reslt = mysqli_query($conn , $ql_command);
    if( mysqli_num_rows($reslt) > 0){
       while( $rows = mysqli_fetch_assoc($reslt) ){
          
           
           $idoffer= $rows["Idoffer"];
          
       }
    }
    echo $_POST['comment'];
$sl_command = "INSERT INTO feedback values(null,$_POST[comment],$idtourist,$idoffer)";
       $rsult = mysqli_query($conn , $sl_command);
       if($rsult){
        echo"bravo";
       }else{echo "problm";}


       








}





?>