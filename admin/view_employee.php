<?php 
session_start();
include 'admin_sidebar.php';
include '../db_connection.php';
if(isset($_GET['del'])){
    $del_id=$_GET['del'];
    $delete="DELETE from employee where employee_id='$del_id'";
    $run_delete=mysqli_query($conn,$delete);
    header('Location:view_employee.php');
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
    <link rel="stylesheet" href="view_employee.css">

</head>

<body>
<section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Employee Details</span>
      </div>
     
      <div class="profile-details">
      <img src="Zunaira Hasnain.jpg">
        <span class="admin_name"><?php echo $_SESSION['admin_name']?></span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>

    <br><br>

    <div class="container">
        <table id="example" class="display" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Emp ID</th>
                    <th>Emp Name</th>
                    <th>Image</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Date of Join</th>
                    <th>Emp Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../db_connection.php';
                $select="SELECT * FROM employee";
                $run=mysqli_query($conn,$select);
                while($row_user=mysqli_fetch_array($run)){
                    $id=$row_user['id'];
                    $employee_id = $row_user['employee_id'];
                    $employee_name=$row_user['employee_name'];
                    $employee_image=$row_user['employee_image'];
        
                    $email=$row_user['email'];
                    $phone=$row_user['phone'];
                    $address=$row_user['address'];
                    $date_of_join=$row_user['date_of_join'];
                    $employee_role=$row_user['employee_role'];
                  

                    
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
                    <td><img src="../employee_images/<?php echo $employee_image;?>" height="100px" width="100px"></td>
                  
                    <td>
                        
                        <?php echo $email?>
                  
                    </td>
                    <td>
                        <?php echo $phone?>
                    </td>
                    <td>
                        <?php echo $address?>
                    </td>
                    <td>
                        <?php echo $date_of_join?>
                    </td>
                    <td>
                        <?php echo $employee_role?>
                    </td>
                    <td>
                    <a href="edit_employee.php?employee_id=<?php echo $employee_id;?>">
                    <input type="image" name="Edit"
                    src="../edit.svg" width=25px height=25px>
                    <a>
                    
                    <a href="view_employee.php?del=<?php echo $employee_id;?>">
                    <input type="image" name="Delete"
                    src="../trash.svg" width=25px height=25px>
                    <a>
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