
<?php
    include '../db_connection.php';
        $employee_id = $_POST['employee_id'];
        $eemployee_name=$_POST['employee_name'];

        $esalary= $_POST['salary'];
     

        $update="UPDATE employee SET employee_name='{$eemployee_name}',salary='$esalary' WHERE employee_id={$employee_id}";
        $run_update=mysqli_query($conn,$update)  or die("Error");

        
        
        if($run_update){
            echo "Data has been updated successfully";
         
            header('Location:payroll.php');
        }
        else{
            echo "Failed, Try Again !!!";
        }
    
    ?>