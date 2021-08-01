<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="add_employee.css">

</head>

<body>
    <div class="container">
        <div class="title">
            Edit Employee
        </div>
        
<?php
  
    include '../db_connection.php';
        $employee_id=$_GET['employee_id'];
        $sql="SELECT * FROM employee where employee_id='$employee_id'";
      
        $result=mysqli_query($conn,$sql);
        $row_user=mysqli_fetch_array($result);
        $employee_name=$row_user['employee_name'];
        $employee_image=$row_user['employee_image'];
        $password = $row_user['password'];
        $email=$row_user['email'];
        $phone=$row_user['phone'];
        $address=$row_user['address'];
        $date_of_join=$row_user['date_of_join'];
        $employee_role=$row_user['employee_role'];
?>

        <form class="form" method="post" action="eupdate.php" autocomplete="off" enctype="multipart/form-data">

            <div class="inputfield">
                <label for="">Employee Name</label>
                <input type="hidden" name="employee_id" class="input" value="<?php echo $employee_id?>" required />
                <input type="text" name="employee_name" class="input" value="<?php echo $employee_name?>" required />
            </div>

            <div class="inputfield">
                <label for="">Employee Image</label>
                <input type="file" name="employee_image" class="input" />
            </div>


            <div class="inputfield">
                <label for="">Password</label>
                <input type="password" name="password" class="input" value="<?php echo $password?>" required />
            </div>


            <div class="inputfield">
                <label for="">Email</label>
                <input type="email" name="email" class="input" value="<?php echo $email?>" required />
            </div>


            <div class="inputfield">
                <label for="">Phone</label>
                <input type="int" name="phone" class="input" value="<?php echo $phone?>" required />
            </div>

            <div class="inputfield">
                <label for="">Address</label>
                <input type="text" name="address" class="input" value="<?php echo $address?>" required />
            </div>

            <div class="inputfield">
                <label for="">Date of Join</label>
                <input type="date" name="date_of_join" class="input" value="<?php echo $date_of_join?>" required />
            </div>



            <div class="container1">
                <div class="title1">
                    Employee Role
                </div>
                
                <ul class="group">
               

                    <li>
                        <input type="checkbox" name="employee_role" value="Team Leader" id="Team Leader" <?php if ("Team Leader"==$employee_role)echo 'checked'; ?> />
                        <label for="Team Leader">Team Leader</label>
                    </li>

                    <li>
                        <input type="checkbox" name="employee_role" value="Executive Assistant"
                            id="Executive Assistant" <?php if ("Executive Assistant"==$employee_role)echo 'checked'; ?> />
                        <label for="Executive Assistant">Executive Assistant</label>
                    </li>

                    <li>
                        <input type="checkbox" name="employee_role" value="Project Manager" id="Project Manager" <?php if ("Project Manager"==$employee_role)echo 'checked'; ?> />
                        <label for="Project Manager">Project Manager</label>
                    </li>

                    <li>
                        <input type="checkbox" name="employee_role" value="Marketing Manager"
                            id="Marketing Manager" <?php if ("Marketing Manager"==$employee_role)echo 'checked'; ?> />
                        <label for="Marketing Manager">Marketing Manager</label>
                    </li>

                    <li>
                        <input type="checkbox" name="employee_role" value="Finance Manager" id="Finance Manager" <?php if ("Finance Manager"==$employee_role)echo 'checked'; ?> />
                        <label for="Finance Manager">Finance Manager</label>
                    </li>

                    <li>
                        <input type="checkbox" name="employee_role" value="Accountant"
                            id="Accountant" <?php if ("Accountant"==$employee_role)echo 'checked'; ?> />
                        <label for="Accountant">Accountant</label>
                    </li>

                    <li>
                        <input type="checkbox" name="employee_role" value="Sales Representative" id="Sales Representative" <?php if ("Sales Representative"==$employee_role)echo 'checked'; ?> />
                        <label for="Sales Representative">Sales Representative</label>
                    </li>

                    <li>
                        <input type="checkbox" name="employee_role" value="Business Analyst" id="Business Analyst" <?php if ("Business Analyst"==$employee_role)echo 'checked'; ?> />
                        <label for="Business Analyst">Business Analyst</label>
                    </li>

                    <li>
                        <input type="checkbox" name="employee_role" value="Technical Expert"
                            id="Technical Expert" <?php if ("Technical Expert"==$employee_role)echo 'checked'; ?> />
                        <label for="Technical Expert">Technical Expert</label>
                    </li>

                    <li>
                        <input type="checkbox" name="employee_role" value="Graphic Designer" id="Graphic Designer" <?php if ("Graphic Designer"==$employee_role)echo 'checked'; ?> />
                        <label for="Graphic Designer">Graphic Designer</label>
                    </li>

                </ul>
            </div>
            <input type="submit" name="employee" value="Save" id="save" class="btn" />
        </form>

        
</div>

</body>

</html>
