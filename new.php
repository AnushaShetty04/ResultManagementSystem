<!DOCTYPE html>
<head>
    <title>Result Management System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>
  * {
  font-family: cursive;
  }
 .container{
    align:center;
    width:4000px;
  }
 .card {
  margin: auto;
  width: 400px;
  border: 5px ;
  padding: 10px;
} 
#button{
        outline: none;
        border: none;
        cursor: pointer;
        display: block;
        margin: 0 auto;
        padding: 0.9rem 1.5rem;
        width:150px;
        text-align: center;
        color: black;
        border-radius: 6px;
        background-color:rgb(245, 201, 7);
        box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.16);
        font-size: 25px;
        box-shadow: 5px 15px rgba(176, 164, 240, 0.685;
}
</style>
</head>
<body>
<div class="container h-50" style="background-color:rgb(238, 247, 225);">
<form action="newstud.php" method="post">
        <?php if (isset($_GET['error'])) { ?>
          <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <div class="row justify-content-center mt-1">
          <div class="col-lg-4 col-md-6 col-sm-4">
            <div class="card shadow">
              <div class="card-title text-center border-bottom">
                <h2 class="p-1" style="background-color:rgb(245, 201, 7);">Add the details</h2>
              </div>
              <div class="card-body">
                  <div class="mb-4">
                    <label  class="form-label">First name</label>
                    <input type="text" class="form-control" name="fname" />
                  </div>
                  <div class="mb-4">
                    <label  class="form-label">Last name</label>
                    <input type="text" class="form-control" name="lname" />
                  </div>
                  <div class="mb-4">
                    <label  class="form-label">Roll number</label>
                    <input type="number" class="form-control" name="Roll_no" />
                  </div>
                  <div class="mb-4">
                    <label  class="form-label">Marks obtained</label>
                    <input type="number" class="form-control" name="marks" />
                  </div>
                  <div class="mb-4">
                    <label  class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" />
                  </div>
                  <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" />
                  </div>
                    <button type="submit" id="button">Add</button>
                  
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
</body>
</html>
