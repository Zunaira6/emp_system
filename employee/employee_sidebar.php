<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="employee_sidebar.css">
    <link rel="stylesheet" href="employee_dashboard.css">
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
          <a href="employee_dashboard.php" class="active">
          <img class="icons1" src="../sidebar-icons/dashboard.svg" >
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="employee_profile.php">
          <img class="icons1" src="../sidebar-icons/user.svg">
            <span class="links_name">Profile</span>
          </a>
        </li>

        <li>
          <a href="view_attendance.php">
          <img class="icons1" src="../sidebar-icons/attendance.svg" >
            <span class="links_name">View Attendance</span>
          </a>
        </li>
        <li>
          <a href="view_assign_project.php">
          <img class="icons1" src="../sidebar-icons/task.svg">
            <span class="links_name">View Task</span>
          </a>
        </li>
       
    
        <li>
          <a href="employee_change_password.php">
          <img class="icons1" src="../sidebar-icons/password.svg">
            <span class="links_name">Change Password</span>
          </a>
        </li>
            
        <li class="log_out">
          <a href="employee_logout.php">
          <img class="icons1" src="../sidebar-icons/logout.svg">
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  



</body>
</html>

