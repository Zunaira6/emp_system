<?php 
session_start();
include 'admin_sidebar.php';
include '../db_connection.php';
if (isset($_POST['mark'])){
   $att=$_POST['attendance_status'];
   $date=date('Y-m-d');
   $query="SELECT distinct attendance_date from employee_attendance";
   $result=mysqli_query($conn,$query);
   $b=false;
   if($result){
       while($row_user=mysqli_fetch_array($result)){ 
           if($date==$row_user['attendance_date']){
               $b=true;
            
           }
       }
       if(!$b){
           foreach($att as $key => $attendance_status){
            $query1="SELECT employee_id,employee_name from employee where employee_id='$key'";
            $result1=mysqli_query($conn,$query1);
            while($row_user1=mysqli_fetch_array($result1)){
                $employee_id = $row_user1['employee_id'];
                $employee_name=$row_user1['employee_name'];
               if($attendance_status=="Present"){
                   $query="INSERT INTO `employee_attendance` (`employee_id`, `employee_name`, `attendance_status`, `attendance_date`) VALUES ('$key', '$employee_name', 'Present', '$date');";
                   $result=mysqli_query($conn,$query);
               }
               else{
                $query="INSERT INTO `employee_attendance` (`employee_id`, `employee_name`, `attendance_status`, `attendance_date`) VALUES ('$key', '$employee_name', 'Absent', '$date');";
                $result=mysqli_query($conn,$query);
               }
           }
        }
           if($result){
            echo '<script>alert("Attendance has been marked successfully")</script>';
           }
           
       }
       else{
        echo '<script>alert("Attendance has already been marked")</script>';
       }
   }
  
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="admin_dashboard.css">
    <link rel="stylesheet" href="mark_attendance.css">

</head>

<body>
<section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Mark Employee Attendance</span>
      </div>
     
      <div class="profile-details">
      <img src="Zunaira Hasnain.jpg">
        <span class="admin_name"><?php echo $_SESSION['admin_name']?></span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>
    <br><br><br><br>
  
    <span><center>Date <?php echo date('Y-m-d')?><center></span>

    <form method="post" action="">
    <div class="container">
        <table id="example" class="display" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Emp ID</th>
                    <th>Emp Name</th>  
                    <th>Attendance Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
             
                $select="SELECT id,employee_id,employee_name FROM employee";
                $run=mysqli_query($conn,$select);
                             
                while($row_user=mysqli_fetch_assoc($run)){
                    $id=$row_user['id'];
                    $employee_id = $row_user['employee_id'];
                    $employee_name=$row_user['employee_name'];
                                       
                ?>

                <tr>
                    <td>
                        <?php echo $id?>
                    
                    </td>
                    <td>
                        <?php echo $employee_id?>
                        
                    </td>
                    <td>
                        <?php echo $employee_name?>
                       
                    </td>
                    <td>
                        <input type="radio" name="attendance_status[<?php echo $employee_id;?>]" value="Present" required>Present
                        <input type="radio" name="attendance_status[<?php echo $employee_id;?>]" value="Absent" required>Absent
                    </td>
               

                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <input type="submit" name="mark" value="Save">
    </form>
</section>
<script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                "pagingType": "full_numbers"
            });
        });
    </script>
</body>

</html>
