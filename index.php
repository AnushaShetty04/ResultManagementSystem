<!DOCTYPE html>
<head>
    <title>Result Management System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>
body{
  background-color:black;
  font-family: Arial, Helvetica, sans-serif;
}
.card{
  background-color:rgb(245, 245, 245);
 
}
.btn{
  background-color:rgb(8, 180, 248);
  border-radius:2rem;
}
#top{
  background-color:rgb(8, 180, 248);
  color:black;
  font-family:sans-serif;
  border-radius:1rem;
}
*{
  font-family:cursive;
}
</style>
</head>
<body>
<div class="container h-50">
<form action="login.php" method="post">
        <?php if (isset($_GET['error'])) { ?>
          <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
    <br><br><br>
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <div class="mb-md-5 mt-md-4 pb-5">
              <h2 class="fw-bold mb-2 text-uppercase" id="top" style="font-family:cursive;">Login</h2>
              <br><br>
              <div class="form-outline form-white mb-4">
                <input type="text" placeholder="Email" name="email"class="form-control form-control-lg" />
              </div>
              <div class="form-outline form-white mb-4">
                <input type="password" id="typePassword" name ="password"placeholder="Password" class="form-control form-control-lg" />

              </div>
              <br><br>
              <input class="btn btn-lg px-5" type="submit" value="Login"/>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
