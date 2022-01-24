<?php
session_start();
include "dbConn.php";
$x=$_SESSION['sub_id'];
echo $x;
          
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $Roll_no = $_POST['Roll_no'];
        $marks= $_POST['marks'];
        $password=$_POST['password'];
        $email=$_POST['email'];
    

            $sql = "INSERT into student (Fname ,Lname,Roll_no,email,password) values('$fname','$lname', '$Roll_no', '$email' ,'$password')";
            $sql1="INSERT into marks (Obtained_marks,Roll_no,sub_id) values ('$marks','$Roll_no','$x')";
            if(mysqli_query($conn,$sql)){
                if(mysqli_query($conn,$sql1)){
                
                // echo "<h3>data stored in a database successfully." 
                //     . " Please browse your localhost php my admin" 
                //     . " to view the updated data</h3>"; 
                header("Location: staff.php");
                }
            } else{
                echo "ERROR: Hush! Sorry $sql. " 
                    . mysqli_error($conn);
            }
          
          
?>