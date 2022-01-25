<?php 

session_start();
include "dbConn.php";

$x=$_SESSION['sub_id'];
$sql = "SELECT student.Fname, student.Lname,student.Roll_no, marks.Obtained_marks FROM student INNER JOIN marks ON student.Roll_no=marks.Roll_no where sub_id='$x'" ;
$sql1="SELECT Sub_name from subject where sub_id='$x'";
$result = mysqli_query($conn, $sql);
$result1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_array($result1);
$x=json_encode($row1);
$y=json_decode($x);

if (isset($_SESSION['password']) && isset($_SESSION['email'])) {
?>

<!DOCTYPE html>
<html>
<head>
    <title>HOME</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>ResultManagementSystem</title>
    <link rel="stylesheet" href="./style.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
      *{
        font-family: cursive;
      }
      #top{
        font-size:150%;
        background-color: rgb(245, 201, 7);
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
        background-color:rgb(245, 201, 7);
        color: white;
      }
      #para{
        font-family: cursive;
        font-size:180%;
        background-color:rgb(233, 132, 16);
      }
      #button{
        outline: none;
        border: none;
        cursor: pointer;
        display: block;
        margin: 0 auto;
        padding: 0.9rem 2.5rem;
        text-align: center;
        background-color:rgb(245, 201, 7);
        color: #fff;
        border-radius: 6px;
        box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.16);
        font-size: 25px;
        box-shadow: 5px 15px rgba(176, 164, 240, 0.685;
      }
      .btn{
        background-color:green;
        box-shadow: 5px 15px rgba(176, 164, 240, 0.685;
      }
      #del{
        background-color:red;
      }

    </style>
</head>
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <div id="top">
    <div align="right">
        <a href="logout.php" class="btn btn-dark d-grid gap-2 col-1 mx-auto" style="background-color:rgb(83, 83, 83);" role="button">Logout</a>
      </div>
      <a>Name: <?php echo $_SESSION['Fname']; ?></a>
      <h2 class="roll">Subject:  <?php echo $y->Sub_name; ?></h2>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>        
        <button type="button" class="close-stand-alone" data-bs-dismiss="modal" style="background-color:red;">
          <span class="icon-cross"></span>
          <span class="visually-hidden">Close</span>
        </button>
        
      </div>
      
      <div class="modal-body">
        <form action="update.php" method="post">
        <?php if (isset($_GET['error'])) { ?>

          <p class="error"><?php echo $_GET['error']; ?></p>

          <?php } ?>
          <div class="mb-3">
            <label for="Marks" class="col-form-label">Marks Obtained:</label>
            <input type="text" class="form-control" id="marks" name="marks">
          </div>
          <input type="hidden" name="roll_no" id="rollno">
          <input type="hidden" name="subject_id" id="subject_id" value="<?php echo $_SESSION['sub_id']?>">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color:red;">Close</button>
        <button class="btn" type="submit" style="background-color:green;">Submit</button>
      </div>
        </form>
    </div>
  </div>
</div>
<script>
  var exampleModal = document.getElementById('exampleModal')
          exampleModal.addEventListener('show.bs.modal', function (event) {
          var button = event.relatedTarget
          var name = button.getAttribute('data-bs-name')
          var marks = button.getAttribute('data-bs-marks')
          var rollno = button.getAttribute('data-bs-rollno')
          
          var modalTitle = exampleModal.querySelector('.modal-title')
          var modalBodyInput1 = exampleModal.querySelector('.modal-body input#name')
          var modalBodyInput2 = exampleModal.querySelector('.modal-body input#marks')
          var modalBodyInput3 = exampleModal.querySelector('.modal-body input#rollno')

          modalTitle.textContent = 'Roll no ' + rollno
               modalBodyInput3.value = rollno

          })    
</script>

<?php

if(isset($_POST['button1'])) {
  echo "This is Button1 that is selected";
}

echo "<table border='1' id='head'>

<br>
<br>
<tr>
<th>Sr no</th>
<th>Name</th>
<th>Roll Number</th>
<th>Marks</th>
<th>Edit</th>
</tr>";

$sr=1;
while($row = mysqli_fetch_array($result))
{
  $name=$row['Fname'];
  $rollno=$row['Roll_no'];
  $marks=$row['Obtained_marks'];
  echo "<tr>";
  echo "<td>" . $sr . "</td>";
  echo "<td>" . $row['Fname'] . " " . $row['Lname'] . "</td>";
  echo "<td>" . $row['Roll_no'] . "</td>";
  echo "<td>" . $row['Obtained_marks'] . "</td>";
  echo "<td>"."<button type='button' class='btn' data-bs-toggle='modal' data-bs-target='#exampleModal' data-bs-name='$name' data-bs-rollno='$rollno' data-bs-marks='$marks' style='background-color:green;' >"
          .'Edit'.
        "</button>"."</td>";
  echo "</tr>";
  $sr=$sr+1;
}
echo "</table>";
?>
<p id ="demo"></p>
<br>
<br><br>

<a href= 'new.php' class="btn btn-info d-grid gap-2 col-2 mx-auto" id="button">Add new records</a> 
</body>
</html>
<?php 
}
?>
