<?php 

session_start(); 
include "dbConn.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
    function validate($data){

       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }

    $email = validate($_POST['email']);
    $pass = validate($_POST['password']);

    if (empty($email)) {
        header("Location: index.php?error=Email is required");
        exit();

    }else if(empty($pass)){
        header("Location: index.php?error=Password is required");
        exit();

    }else{
        $sql = "SELECT * FROM student WHERE email='$email' AND password='$pass'";
        $sql1="SELECT * FROM faculty WHERE email='$email' AND password='$pass'";

        $result = mysqli_query($conn, $sql);
        $result1 = mysqli_query($conn, $sql1);

        if (mysqli_num_rows($result) === 1 ) {

            $row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email && $row['password'] === $pass) {

                $_SESSION['email'] = $row['email'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['Fname'] = $row['Fname'];
                $_SESSION['Roll_no'] = $row['Roll_no'];
               
                header("Location: student.php");
                exit();
            }
            else{
                header("Location: index.php?error=Incorect email or password");
                exit();
            }

        }else if(mysqli_num_rows($result1) === 1){
            $row = mysqli_fetch_assoc($result1);
            if ($row['email'] === $email && $row['password'] === $pass) {

                $_SESSION['email'] = $row['email'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['Fname'] = $row['Fname'];   
                $_SESSION['sub_id'] = $row['sub_id'];   
               
                header("Location: staff.php");
                exit();
            } 
            else{
                header("Location: index.php?error=Incorect email or password");    
                exit();    
            }
        }
        else{
            header("Location: index.php?error=Incorect email or password");
            exit();
        }
    }
}
else{
    header("Location: index.php");
    exit();
}