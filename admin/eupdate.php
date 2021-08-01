
<?php
    include '../db_connection.php';
        $employee_id = $_POST['employee_id'];
        $eemployee_name=$_POST['employee_name'];

        $sql1="SELECT * FROM employee where employee_id='$employee_id'";
        $result1=mysqli_query($conn,$sql1);
        $row_user1=mysqli_fetch_array($result1);
        $employee_image=$row_user1['employee_image'];

        $eemployee_image=$_FILES['employee_image']['name'];
        $etemp_name=$_FILES['employee_image']['tmp_name'];
        $epassword = $_POST['password'];
        $eemail=$_POST['email'];
        $ephone=$_POST['phone'];
        $eaddress=$_POST['address'];
        $edate_of_join=$_POST['date_of_join'];
        $eemployee_role= $_POST['employee_role'];
     

        if(empty($eemployee_image)){
            $eemployee_image=$employee_image;
        }
       
        $update="UPDATE employee SET employee_name='{$eemployee_name}',employee_image='$eemployee_image',password=MD5('{$epassword}'), email='{$eemail}',phone='{$ephone}',address='$eaddress',date_of_join='$edate_of_join',employee_role='$eemployee_role' WHERE employee_id={$employee_id}";
        $run_update=mysqli_query($conn,$update)  or die("Error");

        
        
        if($run_update){
            echo "Data has been updated successfully";
            move_uploaded_file($etemp_name,"../employee_images/$eemployee_image");
            header('Location:view_employee.php');
        }
        else{
            echo "Failed, Try Again !!!";
        }
    
    ?>