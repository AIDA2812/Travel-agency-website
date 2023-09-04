<?php 
 
    require_once "connection.php";

   

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Globetroltter's Gatway</title>
    
    <link rel="shortcut icon" href="travel.png">
    <link href="resorce/css/style.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <style> 
     .hidden {
         display: none;
     }
    </style>

</head>

<body>
<?php  

        $nameErr = $emailErr = $passErr = $adressErr=$phoneErr="";
        $name = $email = $phone = $gender = $pass = $adress = $status =$image ="";

        if( isset($_POST['button'])){

            if( empty($_POST["gender"]) ){
                $gender ="";
            }else {
                $gender = $_POST["gender"];
            }
            if( empty($_POST["status"]) ){
                $status ="";
            }else {
                $status = $_POST["status"];
            } 

            if( empty($_POST["phone"]) ){
                $phone = "";
            }else {
                $phone = $_POST["phone"];
            }

            if( empty($_POST["name"]) ){
                $nameErr = "<p style='color:red'> * Name is required</p>";
            }else {
                $name = $_POST["name"];
            }

            if( empty($_POST["adress"]) ){
                $adressErr = "<p style='color:red'> * adress is required</p>";
                $adress = "";
            }else {
                $adress = $_POST["adress"];
            }

            if( empty($_POST["email"]) ){
                $emailErr = "<p style='color:red'> * Email is required</p> ";
            }else{
                $email = $_POST["email"];
            }

            if( empty($_POST["pass"]) ){
                $passErr = "<p style='color:red'> * Password is required</p> ";
            }else{
                $pass = $_POST["pass"];
            }


            if( !empty($name) && !empty($email) && !empty($pass) && !empty($adress) && !empty($phone)){
                $hash = password_hash($pass, 
                PASSWORD_DEFAULT);
                // database connection
                require_once "connection.php";

                $sql_select_query = "SELECT email FROM tourist WHERE email = '$email' ";
                $r = mysqli_query($conn , $sql_select_query);

                if( mysqli_num_rows($r) > 0 ){
                    $emailErr = "<p style='color:red'> * Email Already Register</p>";
                } else{


                    
                    $sql="INSERT INTO tourist VALUES (NULL, '$name', '$email','$gender','$adress',
                    '$phone','$hash','$image','inactive',null,null)";




                   $result = mysqli_query($conn , $sql);
             

                   if($result){
                    $name = $email = $dob = $gender = $pass = $adress = "";
                    header("Location: admin/login.php");
                   }
                    
                }

            }
        }

?>



<div> 
<div class="login-form-bg h-100">
        <div class="container  h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-4 shadow">  
                            <p class=" login-form__footer"><a href="index.php" class="text-primary"><img src="admin/bck.png"style="width:25px;height:25px;"> </a></p>
                     
                                    <h4 class="text-center">sign in</h4>

                                <form method="POST" action="">
                            
                                <div class="form-group">
                                    <label >Full Name :</label>
                                    <input type="text" class="form-control" value="<?php echo $name; ?>"  name="name" >
                                   <?php echo $nameErr; ?>
                                </div>


                                <div class="form-group">
                                    <label >Email :</label>
                                    <input type="email" class="form-control" value="<?php echo $email; ?>"  name="email" >     
                                    <?php echo $emailErr; ?>
                                </div>

                                <div class="form-group">
                                    <label >Password: </label>
                                    <input type="password" class="form-control" value="<?php echo $pass; ?>" name="pass" > 
                                    <?php echo $passErr; ?>           
                                </div>

                                <div class="form-group">
                                    <label >adress :</label>
                                    <input type="text" class="form-control" value="<?php echo $adress; ?>" name="adress" >  
                                    <?php echo $adressErr; ?>            
                                </div>

                                <div class="form-group">
                                    <label >phone:</label>
                                    <input type="number" class="form-control" value="<?php echo $phone; ?>" name="phone" >  
                                   
                                </div>
                               

                                <div class="form-group form-check form-check-inline">
                                    <label class="form-check-label" >Gender :</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" <?php if($gender == "Male" ){ echo "checked"; } ?>  value="Male"  selected>
                                    <label class="form-check-label" >Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" <?php if($gender == "Female" ){ echo "checked"; } ?>  value="Female">
                                    <label class="form-check-label" >Female</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" <?php if($gender == "Other" ){ echo "checked"; } ?>  value="Other">
                                    <label class="form-check-label" >Other</label>
                                </div>

                               
                                <br>

                                <button type="submit" name="button"class="btn btn-primary btn-block">Add</button>
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </body>
<?php 
    require_once "admin/include/footer.php";
?>


