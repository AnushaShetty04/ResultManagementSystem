<?php
include "dbConn.php";
          
        $name = $_POST['name'];
        $marks= $_POST['marks'];
        $rollno=$_POST['roll_no'];
        $sub_id=$_POST['subject_id'];

        if($marks>100){
            header("Location: staff.php?error=Marks should be less than 100");
        }
        else{
            $sql = "UPDATE marks SET Obtained_marks=$marks WHERE Roll_no=$rollno and sub_id=$sub_id";
            if(mysqli_query($conn,$sql)){
                header("Location: staff.php");
      
            } else{
                echo "ERROR: Hush! Sorry $sql. " 
                    . mysqli_error($conn);
            }
        }
          
          
?>
