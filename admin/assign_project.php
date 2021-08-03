<?php
session_start();
include 'admin_sidebar.php';
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    include '../db_connection.php';
    if(isset($_POST['assign'])){
        $employee_id = $_POST['employee_id'];
        $employee_name=$_POST['employee_name'];
        $assign_project=$_POST['assign_project'];
        $date=$_POST['assign_date'];

        $sql="INSERT INTO `assign_project`(`employee_id`,`employee_name`,`assign_project`,`assign_date`) VALUES ('$employee_id','$employee_name','$assign_project','$date')";
       
        $result=mysqli_query($conn,$sql);
        header('Location:admin_dashboard.php'); 
        
    } 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Project |EMS</title>
    <link rel="stylesheet" href="add_employee.css">
    <link rel="stylesheet" href="admin_dashboard.css">


</head>

<body>
<section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Add Employee</span>
      </div>

      <div class="profile-details">
      <img src="Zunaira Hasnain.jpg">
        <span class="admin_name">
          <?php echo $_SESSION['admin_name']?>
        </span>
        <i class='bx bx-chevron-down'></i>
      </div>
    </nav>
    <div class="container">
        
        <div class="title">
            ASSIGN PROJECT
        </div>
        <form class="form" method="post" action="" autocomplete="off" enctype="multipart/form-data">


            <div class="inputfield">
                <label for="">Employee ID</label>
                <input type="text" name="employee_id" class="input" required />
            </div>

            <div class="inputfield">
                <label for="">Employee Name</label>
                <input type="text" name="employee_name" class="input" required />
            </div>


            <div class="inputfield">
                <label for="">Assign Project</label>
                <input type="text" name="assign_project" class="input" required />
            </div>

            <div class="inputfield">
                <label for="">Assign Date</label>
                <input type="date" name="assign_date" class="input" required />
            </div>

            <input type="submit" name="assign" value="ASSIGN" class="btn" />
        </form>

       
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
</body>

</html>
