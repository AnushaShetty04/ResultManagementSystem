<?php 

session_start();
include "dbConn.php";

$x=$_SESSION['Roll_no'];
$sql = "SELECT * FROM marks WHERE Roll_no='$x'" ;
$result = mysqli_query($conn, $sql);

if (isset($_SESSION['password']) && isset($_SESSION['email'])) {

 ?>

<!DOCTYPE html>
<html>
<head>
    <title>ResultManagementSystem</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
      #top{
        font-size:150%;
        background-color: rgb(9, 91, 105);
        color:black;
      }
      .roll{
        font-size:Larger;
      }
      #head{
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        border-color:grey;
        width: 100%;
      }
      #head td, #head th {
        border: 1px solid #ddd;
        padding: 8px;
      }

      #head tr:nth-child(even){
        background-color: #f2f2f2;
        text-align:center;
      }

      #head tr:hover {
        background-color: #ddd;
      }

      #head tr{
        text-align:center;
      }

      #head th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: center;
        background-color:rgb(9, 91, 105);
        color: white;
      }
      #para{
        font-family: cursive;
        font-size:180%;
        background-color:rgb(9, 91, 105);
      }
      *{
        font-family: cursive;
      }
    </style>
</head>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<body>
    <div id="top">
    <div align="right">
        <a href="logout.php" class="btn btn-dark d-grid gap-2 col-1 mx-auto" style="align:right;" role="button">Logout</a>
      </div>
      <a>Student Name: <?php echo $_SESSION['Fname']; ?></a>
      <h2 class="roll">Roll Number: <?php echo $x; ?></h2>
    </div>

<?php
echo "<table border='1' id='head'>

<br>
<tr>
<th>Sr no.</th>
<th>Suject</th>
<th>Marks</th>
</tr>";

$totalMarks=0;
$sr=1;
$percentage=0;
$total=630;
while($row = mysqli_fetch_array($result))
  {
    $totalMarks=$row['Obtained_marks']+$totalMarks;
    $x=$row['sub_id'];
    $sql1="SELECT Sub_name from subject where Sub_id='$x'";
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_array($result1);
    $x=json_encode($row1);
    $y=json_decode($x);

    echo "<tr>";
    echo "<td>" . $sr . "</td>";
     echo "<td>" . $y->Sub_name . "</td>";
    echo "<td>" . $row['Obtained_marks'] . "</td>";
    echo "</tr>";
    $sr=$sr+1;
  }
  $percentage=($totalMarks/$total)*100;

echo "</table>";
echo "<br>";
if($percentage<35)
{
  echo "<p id='para'>".'Percentage : '. round($percentage,2) .'%'."</br>".'Remarks : Fail'."</p>";
}else{
  echo "<p id='para'>".'Percentage : '. round($percentage,2) .'% '."</br>".'Remarks : Pass'."</p>";
}
?>

</body>
</html>
<?php 
}
?>