<?php
session_start();
include 'admin_sidebar.php';
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    include '../db_connection.php';
    if(isset($_POST['employee'])){
        $employee_id = $_POST['employee_id'];
        $employee_name=$_POST['employee_name'];

        $employee_image=$_FILES['employee_image']['name'];
        $temp_name=$_FILES['employee_image']['tmp_name'];

        $password = $_POST['password'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $address=$_POST['address'];
        $date_of_join=$_POST['date_of_join'];
        $salary=$_POST['salary'];
        $employee_role= $_POST['employee_role'];
        $sql="INSERT INTO `employee`(`employee_id`,`employee_name`,`employee_image`,`password`,`email`,`phone`,`address`,`date_of_join`,`salary`,`employee_role`) VALUES ('$employee_id','$employee_name','$employee_image',MD5('$password'),'$email','$phone','$address','$date_of_join','$salary','$employee_role')";
       
        $result=mysqli_query($conn,$sql); 
        if($result){
          move_uploaded_file($temp_name,"../employee_images/$employee_image");
          header('Location:add_employee.php');
          exit;
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
            Add Employee
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
                <label for="">Employee Image</label>
                <input type="file" name="employee_image" class="input" required />
            </div>


            <div class="inputfield">
                <label for="">Password</label>
                <input type="password" name="password" class="input" required />
            </div>


            <div class="inputfield">
                <label for="">Email</label>
                <input type="email" name="email" class="input" required />
            </div>


            <div class="inputfield">
                <label for="">Phone</label>
                <input type="int" name="phone" class="input" required />
            </div>

            <div class="inputfield">
                <label for="">Address</label>
                <input type="text" name="address" class="input" required />
            </div>

            <div class="inputfield">
                <label for="">Date of Join</label>
                <input type="date" name="date_of_join" class="input" required />
            </div>

            <div class="inputfield">
                <label for="">Salary</label>
                <input type="int" name="salary" class="input" required />
            </div>


            <div class="container1">
                <div class="title1">
                    Employee Role
                </div>
                <ul class="group">

                    <li>
                        <input type="checkbox" name="employee_role" value="Team Leader" id="Team Leader" />
                        <label for="Team Leader">Team Leader</label>
                    </li>

                    <li>
                        <input type="checkbox" name="employee_role" value="Executive Assistant"
                            id="Executive Assistant" />
                        <label for="Executive Assistant">Executive Assistant</label>
                    </li>

                    <li>
                        <input type="checkbox" name="employee_role" value="Project Manager" id="Project Manager" />
                        <label for="Project Manager">Project Manager</label>
                    </li>

                    <li>
                        <input type="checkbox" name="employee_role" value="Marketing Manager"
                            id="Marketing Manager" />
                        <label for="Marketing Manager">Marketing Manager</label>
                    </li>

                    <li>
                        <input type="checkbox" name="employee_role" value="Finance Manager" id="Finance Manager" />
                        <label for="Finance Manager">Finance Manager</label>
                    </li>

                    <li>
                        <input type="checkbox" name="employee_role" value="Accountant"
                            id="Accountant" />
                        <label for="Accountant">Accountant</label>
                    </li>

                    <li>
                        <input type="checkbox" name="employee_role" value="Sales Representative" id="Sales Representative" />
                        <label for="Sales Representative">Sales Representative</label>
                    </li>

                    <li>
                        <input type="checkbox" name="employee_role" value="Business Analyst" id="Business Analyst" />
                        <label for="Business Analyst">Business Analyst</label>
                    </li>

                    <li>
                        <input type="checkbox" name="employee_role" value="Technical Expert"
                            id="Technical Expert" />
                        <label for="Technical Expert">Technical Expert</label>
                    </li>

                    <li>
                        <input type="checkbox" name="employee_role" value="Graphic Designer" id="Graphic Designer" />
                        <label for="Graphic Designer">Graphic Designer</label>
                    </li>

                </ul>
            </div>
            <input type="submit" name="employee" value="SAVE" class="btn" />
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