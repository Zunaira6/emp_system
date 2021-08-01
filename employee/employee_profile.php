<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header('location:../login.php');
    exit;
}
?>
<?php 

include 'employee_sidebar.php';
include '../db_connection.php';
$employee_id=$_SESSION['employee_id'];
$select="SELECT * FROM employee where employee_id='$employee_id' ";
$run=mysqli_query($conn,$select);
$row_user=mysqli_fetch_array($run);
  
  $employee_name=$row_user['employee_name'];
  $employee_image=$row_user['employee_image'];
  $email=$row_user['email'];
  $phone=$row_user['phone'];
  $address=$row_user['address'];
  $date_of_join=$row_user['date_of_join'];
  $salary=$row_user['salary'];
  $employee_role=$row_user['employee_role'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="employee_dashboard.css">
  <link rel="stylesheet" href="employee_profile.css">
</head>

<body>             
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Employee Profile</span>
      </div>

      <div class="profile-details">
      <img src="../employee_images/<?php echo $employee_image;?>">
        <span class="admin_name">
          <?php echo $employee_name;?>
        </span>
        <i class='bx bx-chevron-down'></i>
      </div>
    </nav>

    <div class="container">
      <div class="card1">
          <div class="center">
      <img class="admin-profile-img" src="../employee_images/<?php echo $employee_image;?>">
       
        <p class="name">
          <?php echo $employee_name;?>
        <p>
        </div>
        <br><br><br>
        <a href="#"><img class="sicons" src="../social-media-regular-icons/globe.svg"></a><span class="icons-name">Website</span>
        <hr>
        <a href="#"><img class="sicons" src="../social-media-regular-icons/github.svg"></a><span class="icons-name">Github</span>
        <hr>
        <a href="#"><img class="sicons" src="../social-media-regular-icons/twitter.svg"></a><span class="icons-name">Twitter</span>
        <hr>
        <a href="#"><img class="sicons" src="../social-media-regular-icons/instagram.svg"></a><span class="icons-name">Instagram</span>
        <hr>
        <a href="#"><img class="sicons" src="../social-media-regular-icons/facebook.svg"></a><span class="icons-name">Facebook</span>
      </div>
      <div class="card2">
        <table style="width:90%">
          <tr>
            <th>Employee ID</th>
            <td>
              <?php echo $employee_id;?>
            </td>
          </tr>
        
          <tr>
            <th>Full Name</th>
            <td>
              <?php echo $employee_name;?>
            </td>
          </tr>

          <tr>
            <th>Email</th>
            <td>
              <?php echo $email;?>
            </td>
          </tr>

          <tr>
            <th>Phone</th>
            <td>
              <?php echo $phone;?>
            </td>
          </tr>

          <tr>
            <th>Address</th>
            <td>
              <?php echo $address;?>
            </td>
          </tr>

          <tr>
            <th>Date of Join</th>
            <td>
              <?php echo $date_of_join;?>
            </td>
          </tr>

          <tr>
            <th>Salary</th>
            <td>
              <?php echo $salary;?>
            </td>
          </tr>
        
          <tr>
            <th>Employee Role</th>
            <td>
              <?php echo $employee_role;?>
            </td>
          </tr>

        </table>


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
 
</body>

</html>