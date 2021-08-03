<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="admin_sidebar.css">
    <link rel="stylesheet" href="admin_dashboard.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <img style="margin-left:10px;margin-right:20px"src="../image.png" width=30px height=30px>
      <span class="logo_name">EMS</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="admin_dashboard.php" class="active">
          <img class="icons1" src="../sidebar-icons/dashboard.svg" >
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="admin_profile.php">
          <img class="icons1" src="../sidebar-icons/user.svg">
            <span class="links_name">Profile</span>
          </a>
        </li>
        <li>
          <a href="add_employee.php">
          <img class="icons1" src="../sidebar-icons/add.svg">
            <span class="links_name">Add Employee</span>
          </a>
        </li>
     
        <li>
          <a href="view_employee.php">
          <img class="icons1" src="../sidebar-icons/employee.svg">
            <span class="links_name">View Employee</span>
          </a>
        </li>

        <li>
          <a href="mark_attendance.php">
          <img class="icons1" src="../sidebar-icons/mark.svg">
            <span class="links_name">Mark Attendance</span>
          </a>
        </li>

        <li>
          <a href="assign_project.php">
          <img class="icons1" src="../sidebar-icons/task.svg">
            <span class="links_name">Assign Project</span>
          </a>
        </li>

        <li>
          <a href="payroll.php">
          <img class="icons1" src="../sidebar-icons/salary.svg">
            <span class="links_name">Payroll</span>
          </a>
        </li>

      
        
        <li>
          <a href="view_employee_attendance.php">
          <img class="icons1" src="../sidebar-icons/attendance.svg">
            <span class="links_name">Employee Attendance</span>
          </a>
        </li>
        
        
        <li>
          <a href="admin_change_password.php">
          <img class="icons1" src="../sidebar-icons/password.svg">
            <span class="links_name">Change Password</span>
          </a>
        </li>
      
        <li class="log_out">
          <a href="admin_logout.php">
          <img class="icons1" src="../sidebar-icons/logout.svg">
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>


  
</body>
</html>

