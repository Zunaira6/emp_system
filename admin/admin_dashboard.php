<?php
session_start();
include '../db_connection.php';
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header('location:../login.php');
    exit;
}
?>




<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="admin_dashboard.css">
	<title>Dashboard |EMS</title>
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php include 'admin_sidebar.php';?>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Admin Dashboard</span>
      </div>

      <div class="profile-details">
        <img src="Zunaira Hasnain.jpg" alt="">
        <span class="admin_name">
          <?php echo $_SESSION['admin_name']?>
        </span>
        <i class='bx bx-chevron-down'></i>
      </div>
    </nav>

    <div class="big-box" >

      <a href="admin_profile.php" style="text-decoration:none">
      <div class="box1">
        <div class="left-box">
          <h4>Admins</h4>
          <h1>
            <?php
            $sql="SELECT COUNT(admin_id) from `admin` ";
            $run=mysqli_query($conn,$sql);
            while($row_user=mysqli_fetch_array($run)){
              echo $row_user['COUNT(admin_id)'];
            }
            ?>
            </h1>
          </div>
          <div class="right-box">
          <img class="icons" src="../sidebar-icons/user.svg" width=40px height=40px>
          </div>
      </div>
          </a>

      <a href="view_employee.php" style="text-decoration:none">
      <div class="box2">
        <div class="left-box">
          <h4>Employees</h4>
          <h1><?php
            $sql="SELECT COUNT(employee_id) from employee";
            $run=mysqli_query($conn,$sql);
            while($row_user=mysqli_fetch_array($run)){
              echo $row_user['COUNT(employee_id)'];
            }
            ?></h1>
        </div>
        <div class="right-box">
        <img class="icons" src="../sidebar-icons/employee.svg" width=40px height=40px>
        </div>
      </div>   
    </a>
    
    <a href="add_employee.php" style="text-decoration:none">
      <div class="box3">
        <div class="left-box">
          <h4>Add Employee</h4>
        </div>
        <div class="right-box">
        <img class="icons" src="../sidebar-icons/add.svg" width=40px height=40px>
        </div>
      </div>
    </a>

    <a href="view_employee_attendance.php" style="text-decoration:none">
      <div class="box4">
        <div class="left-box">
          <h4>View Attendance</h4>
        </div>
        <div class="right-box">
          <img class="icons" src="../sidebar-icons/attendance.svg" width=40px height=40px>
        </div>
      </div>
    </a>

    <a href="assign_project.php" style="text-decoration:none">
      <div class="box5">
        <div class="left-box">
          <h4>Assign Task</h4>
        </div>
        <div class="right-box">
        <img class="icons" src="../sidebar-icons/task.svg" width=40px height=40px>
        </div>
      </div>
    </a>

    <a href="payroll.php" style="text-decoration:none">
      <div class="box6">
        <div class="left-box">
          <h4>Payroll</h4>
        </div>
        <div class="right-box">
        <img class="icons" src="../sidebar-icons/salary.svg" width=40px height=40px>
        </div>
      </div>
    </a>

    <a href="admin_change_password.php" style="text-decoration:none">
      <div class="box7">
        <div class="left-box">
          <h4>Change Password</h4>
        </div>
        <div class="right-box">
        <img class="icons" src="../sidebar-icons/password.svg" width=40px height=40px>
        </div>
      </div>
    </a>

    <a href="admin_logout.php" style="text-decoration:none">
      <div class="box8">
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
    <h3>Recent Employees</h3>
    <table class="display" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Emp ID</th>
                    <th>Emp Name</th>
                    <th>Image</th>
                    <th>Emp Role</th>
                
                </tr>
            </thead>
            <tbody>
                <?php
                include '../db_connection.php';
                $select="SELECT * FROM employee order by employee_id DESC LIMIT 2";
                $run=mysqli_query($conn,$select);
                while($row_user=mysqli_fetch_array($run)){
                    $employee_id = $row_user['employee_id'];
                    $employee_name=$row_user['employee_name'];
                    $employee_image=$row_user['employee_image'];
                    $employee_role=$row_user['employee_role'];                   
                ?>
                <tr>                
                    <td>
                        <?php echo $employee_id?>
                    </td>
                    <td>
                        <?php echo $employee_name?>
                    </td>
                    <td><img class="emp-img"src="../employee_images/<?php echo $employee_image;?>"></td>                                  
                    <td>
                        <?php echo $employee_role?>
                    </td>             
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="view_employee.php"><input type="submit" id="btn1" value="View All"></a>
    </div>
   
    <div class="pie-box" id="pieContainer">
    </div>
    </div>
  </section>
  <script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function () {
      sidebar.classList.toggle("active");
      if (sidebar.classList.contains("active")) {
        sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
      } else
        sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
  </script>

<?php
$a='';
 $sql="SELECT COUNT(attendance_status) from `employee_attendance` where attendance_status='Absent' ";
 $run=mysqli_query($conn,$sql);
 while($row_user=mysqli_fetch_array($run)){
   $a.=$row_user['COUNT(attendance_status)'];
 }
 $p='';
 $sql="SELECT COUNT(attendance_status) from `employee_attendance` where attendance_status='Present' ";
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
       {  y: <?php echo ($a*100)/30?>, legendText: "Absent", color: "hsl(96, 100%, 18%)" },
       {  y: <?php echo ($p*100)/30?>, legendText: "Present", color: "#c6d016" }
       ]
     }
     ]
   });

    chart1.render();
  
  </script>
</body>

</html>
