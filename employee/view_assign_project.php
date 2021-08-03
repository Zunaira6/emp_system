<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header('location:../login.php');
    exit;
}
?>
<?php 

$employee_id=$_SESSION['employee_id'];
include 'employee_sidebar.php';
include '../db_connection.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Project |EMS</title>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="employee_dashboard.css">
    <link rel="stylesheet" href="view_assign_project.css">

</head>

<body>
<section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">View Task</span>
      </div>
     
      <div class="profile-details">
      <img class="admin-profile-img" src="../employee_images/<?php echo $_SESSION['employee_image'];?>">
        <span class="admin_name"><?php echo $_SESSION['employee_name']?></span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>
    <br><br>
    <div class="container">
        <table id="example" class="display" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Employee ID</th>
                    <th>Employee Name</th>
                    <th>Assign Project</th>
                    <th>Assign Date</th>
                  
                </tr>
            </thead>
            <tbody>
                <?php
                include '../db_connection.php';
                $select="SELECT * FROM assign_project where employee_id='$employee_id' ";
                $run=mysqli_query($conn,$select);
                while($row_user=mysqli_fetch_array($run)){
                    $id=$row_user['id'];
                    $employee_id = $row_user['employee_id'];
                    $employee_name=$row_user['employee_name'];
                    $assign_project=$row_user['assign_project'];
                    $assign_date=$row_user['assign_date'];            
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
                    
                    <?php
                    echo "<span style='background-color:#ffcbcb;color:red;padding:0px 5px;border-radius:6px;'>$assign_project</span>";
             
                    ?>
                    
                    
                    </td>
                    <td>
                        <?php echo $assign_date?>
                    </td>
                    
                   
               

                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
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
