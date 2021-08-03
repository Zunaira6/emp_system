<?php
session_start();
include '../db_connection.php';
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header('location:../login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard |EMS</title>
    <link rel="stylesheet" href="employee_dashboard.css">
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    
</head>
<body>
    <?php include 'employee_sidebar.php';?>
    
    <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Employee Dashboard</span>
      </div>
     
      <div class="profile-details">
      <img src="../employee_images/<?php echo $_SESSION['employee_image'];?>">
        <span class="admin_name"><?php echo $_SESSION['employee_name'];?></span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>
    <div class="big-box" >
      <a href="employee_profile.php" style="text-decoration:none">
      <div class="box1">
        <div class="left-box">
          <h4>Profile</h4>
        </div>
        <div class="right-box">
        <img class="icons" src="../sidebar-icons/user.svg" width=40px height=40px>
        </div>
      </div>   
    </a>
    
    <a href="view_attendance.php" style="text-decoration:none">
      <div class="box2">
        <div class="left-box">
          <h4>View Attendance</h4>
        </div>
        <div class="right-box">
        <img class="icons" src="../sidebar-icons/attendance.svg" width=40px height=40px>
        </div>
      </div>
    </a>
    
    <a href="view_assign_project.php" style="text-decoration:none">
      <div class="box3">
        <div class="left-box">
          <h4>View Task</h4>
        </div>
        <div class="right-box">
        <img class="icons" src="../sidebar-icons/task.svg" width=40px height=40px>
        </div>
      </div>
    </a>

    <a href="employee_change_password.php" style="text-decoration:none">
      <div class="box4">
        <div class="left-box">
          <h4>Change Password</h4>
        </div>
        <div class="right-box">
        <img class="icons" src="../sidebar-icons/password.svg" width=40px height=40px>
        </div>
      </div>
    </a>

    <a href="employee_logout.php" style="text-decoration:none">
      <div class="box5">
        <div class="left-box">
          <h4>Logout</h4>
        </div>
        <div class="right-box">
        <img class="icons" src="../sidebar-icons/logout.svg" width=40px height=40px>
        </div>
      </div>
    </a>
  </div>

    <div class="second-box">
    <div class="student-box">
    <h4 style="background-color:#0056d2;color:white;padding-left:10px;padding-right:10px;border-radius:20px">Notice Board</h4>
    <h3 style="background-color:#c6d016;margin-top:20px;padding-left:10px;padding-right:10px;border-radius:20px;">
    <?php
            $employee_id = $_SESSION['employee_id'];
            $sql="SELECT * from `assign_project` where employee_id='$employee_id'";
            $run=mysqli_query($conn,$sql);
            $rowcount=mysqli_num_rows($run);
            if($rowcount>0){
            while($row_user=mysqli_fetch_array($run)){
                echo $row_user['assign_project'];             
            }
          }
          else echo "Woohoo no upcoming task!!";           
            ?>
          </h3>
    </div>
   
    <div class="pie-box" id="pieContainer">
    </div>
    </div>
    <section>
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
<?php
$employee_id = $_SESSION['employee_id'];
$a='';
 $sql="SELECT COUNT(attendance_status) from `employee_attendance` where attendance_status='Absent' and employee_id='$employee_id'";
 $run=mysqli_query($conn,$sql);
 while($row_user=mysqli_fetch_array($run)){
   $a.=$row_user['COUNT(attendance_status)'];
 }
 $p='';
 $sql="SELECT COUNT(attendance_status) from `employee_attendance` where attendance_status='Present' and employee_id='$employee_id'";
 $run=mysqli_query($conn,$sql);
 while($row_user=mysqli_fetch_array($run)){
   $p.=$row_user['COUNT(attendance_status)'];
 }


 ?>
<script type="text/javascript">

var chart1 = new CanvasJS.Chart("pieContainer",
{
  subtitles: [{
		text: "Employee Attendance",
    fontSize: 18
	}],
  legend: {
    horizontalAlign: "right",
    verticalAlign: "center"
  },
  data: [
  {
   color: "LightSeaGreen",
   indexLabelPlacement: "outside",
   showInLegend: true,
   type: "doughnut",
   dataPoints: [
   {  y:  <?php echo ($a*100)/30?>, legendText: "Absent", color: "hsl(96, 100%, 18%)" },
   {  y: <?php echo ($p*100)/30?>, legendText: "Present", color: "#c6d016" }
   ]
 }
 ]
});

chart1.render();

</script>
    
</body>
</html>
