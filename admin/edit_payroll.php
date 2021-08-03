<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Payroll |EMS</title>
    <link rel="stylesheet" href="add_employee.css">

</head>

<body>
    <div class="container">
        <div class="title">
            Edit Employee Payroll
        </div>
        
<?php
  
    include '../db_connection.php';
        $employee_id=$_GET['employee_id'];
        $sql="SELECT * FROM employee where employee_id='$employee_id'";
      
        $result=mysqli_query($conn,$sql);
        $row_user=mysqli_fetch_array($result);
        $employee_name=$row_user['employee_name'];
        
        $salary=$row_user['salary'];
?>

        <form class="form" method="post" action="epayroll_update.php" autocomplete="off" enctype="multipart/form-data">

            <div class="inputfield">
                <label for="">Employee Name</label>
                <input type="hidden" name="employee_id" class="input" value="<?php echo $employee_id?>" required />
                <input type="text" name="employee_name" class="input" value="<?php echo $employee_name?>" required />
            </div>

        
            <div class="inputfield">
                <label for="">Salary</label>
                <input type="int" name="salary" class="input" value="<?php echo $salary?>" required />
            </div>

            <input type="submit" name="employee" value="Save" id="save" class="btn" />
        </form>

        
</div>

</body>

</html>
