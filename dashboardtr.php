

<?php 
require_once "header.php";

?>
<?php
            

        // database connection
        require_once "connection.php";

         $currentDay = date( 'Y-m-d', strtotime("today") );
         $tomarrow = date( 'Y-m-d', strtotime("+1 day") );

         $today_leave = 0;
         $tomarrow_leave = 0;
         $this_week = 0;
         $next_week = 0;
            $i = 1;
        // total admin
        $select_admins = "SELECT * FROM tourist";
        $total_admins = mysqli_query($conn , $select_admins);


// total registration en attente
        $select_reg = "SELECT * FROM reservation where status='en attente'";
        $total_reg= mysqli_query($conn , $select_reg);



        // total operator
        $select_emp = "SELECT * FROM operator";
        $total_emp = mysqli_query($conn , $select_emp);

        // tourist inactive
        $emp_leave  ="SELECT * FROM tourist where status='inactive'";
        $total_leaves = mysqli_query($conn , $emp_leave);

      


          
       


        // highest paid employee
        $sql_highest_salary =  "SELECT * FROM operator ";
        $emp_ = mysqli_query($conn , $sql_highest_salary);



?>

<div class="container">

    <div class="row mt-5">
        <div class="col-4">
            <div class="card shadow " style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">tourists</li>
                    <li class="list-group-item">Total tourists : <?php echo mysqli_num_rows($total_admins); ?> </li>
                    <li class="list-group-item text-center"><a href="manage-tourist.php"><b>View All tourist</b></a></li>
                </ul>
            </div>
        </div>

        <div class="col-4">
            <div class="card shadow " style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">reservation</li>
                    <li class="list-group-item">Total regestration en attente : <?php echo mysqli_num_rows($total_reg); ?> </li>
                    <li class="list-group-item text-center"><a href="manage-reg.php"><b>View All demande</b></a></li>
                </ul>
            </div>
        </div>



        <div class="col-4">
            <div class="card shadow " style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">operator</li>
                    <li class="list-group-item">Total operator : <?php echo mysqli_num_rows($total_emp); ?></li>
                    <li class="list-group-item text-center"><a href="manage-operator.php"> <b>View All operator</b></a></li>
                </ul>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow " style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">tourist en attente (inactive)</li>
                    <li class="list-group-item">Total tourist inactive  :  <?php echo mysqli_num_rows($total_leaves); ?>  </li>
                    
    
                </ul>
            </div>
        </div>
    </div>
    <!-- <div class="row mt-5">
        <div class="col-4">       
        </div>

        <div class="col-4">
            <div class="card shadow " style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">Employees on Leave (Weekwise) </li>
                    <li class="list-group-item">This Week : </li>
                    <li class="list-group-item">Next Week : </li>
                </ul>
            </div>
        </div>
    </div> -->
    <?php 
 
//  database connection
require_once "connection.php";

$sql = "SELECT * FROM tourist where status='inactive' ";
$result = mysqli_query($conn , $sql);

$i = 1;
$you = "";


?>

<style>
table, th, td {
  border: 1px solid black;
  padding: 15px;
}
table {
  border-spacing: 10px;
}
</style>
    <div class="container bg-white shadow">
    <div class="py-4 mt-5"> 
    <div class='text-center pb-2'><h4>all tourists inactive </h4></div>
    <table style="width:100%" class="table-hover text-center ">
    <tr class="bg-dark">
        <th>S.No.</th>
        <th>tourist Id</th>
        <th>Name</th>
        <th>Email</th> 
        <th>Gender</th>
        <th>adress</th>
        <th>phone</th>
        <th>image</th>
       
        <th>Action</th>
    </tr>
    <?php 
    
    if( mysqli_num_rows($result) > 0){
        while( $rows = mysqli_fetch_assoc($result) ){
            $name= $rows["name"];
            $email= $rows["email"];
            $gender = $rows["gender"];
            $adress = $rows["adress"];
            $id = $rows["idtourist"];
            $phone = $rows["phone"];
       
            $image = $rows["image"];

            if($gender == "" ){
                $gender = "Not Defined";
            } 
           

            

            if($adress== "" ){
                $adress= "Not Defined";
            }   
            
            ?>
        <tr>
        <td><?php echo "{$i}."; ?></td>
        <td><?php echo $id; ?></td>
        <td> <?php echo $name ; ?></td>
        <td><?php echo $email; ?></td>
        <td><?php echo $gender; ?></td>
        <td><?php echo $adress; ?></td>
        <td><?php echo $phone; ?></td>
        <td><?php echo $image; ?></td>


        <td>  <?php 
    
                $active = "<a href='active.php?id= {$id}' class='btn btn-outline-primary'>set active </a>";
                echo $active;
             ?> 
        </td>

      
        

    <?php 
            $i++;
            }
        }else{
            echo "<script>
            $(document).ready( function(){
                $('#showModal').modal('show');
                $('#linkBtn').attr('href', dashboard.php');
               
                $('#addMsg').text('No tourist inactive Found!');
                $('#closeBtn').text('Remind Me Later!');
            })
         </script>
         ";
        }
    ?>
     </tr>
    </table>
    </div>
</div>

<?php 
require_once "admin/include/footer.php";
?>