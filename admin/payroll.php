<?php 
session_start();
include 'admin_sidebar.php';
include '../db_connection.php';

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
    <link rel="stylesheet" href="payroll.css">

</head>

<body>
<section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Employee Payroll</span>
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
                    <th>Salary</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
             
                $select="SELECT id,employee_id,employee_name,salary FROM employee";
                $run=mysqli_query($conn,$select);
               
                
                while($row_user=mysqli_fetch_array($run)){
                    $id = $row_user['id'];
                    $employee_id = $row_user['employee_id'];
                    $employee_name=$row_user['employee_name'];
                    $salary=$row_user['salary'];
                    
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
                        <?php echo $salary?>
                    
                    </td>
                    <td>
                    <a href="edit_payroll.php?employee_id=<?php echo $employee_id;?>">
                    <input type="image" name="Edit"
                    src="../edit.svg" width=25px height=25px>
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
