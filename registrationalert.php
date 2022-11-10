<?php
  include('include/connect.php');

  if(isset($_POST['loginBtn'])) {
    $reg_email = $_POST['reg_email'];
    $reg_password = $_POST['reg_password'];

    $sql = "SELECT * FROM registration WHERE reg_email = '$reg_email' and reg_password = '$reg_password' ";

    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);
    if($count == 1) {
      session_start();
      $_SESSION['loggedin'] = true;
      $_SESSION['reg_email'] = $reg_email;
      $_SESSION['loginSuccessful'] = '
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Successful!</strong> You log in successfull
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    ';
      header("Location: home.php");
    }
    else {
      echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Incorrect Username or Password!</strong> Please try again.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      ';
    }
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Successfull</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://kit.fontawesome.com/0b185ee620.js" crossorigin="anonymous"></script>
  </head>
  <body>
    
    <div class="container">
      <div class="box">
        <div class="card" id="sd">
          <div class="upcard">
            <i class="fa-regular fa-circle-check" id="check"></i>
          </div>
          <div class="card-body">
            <p class="card-text">
              <strong class="reg_congrats">Congratulation</strong>
              <br>
              Your registration was succesfull. <br>Your account is created. you can log in now!
            </p>
            <!-- Login start -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal" id="reg_unli">
              Log in
            </button>

            <!-- Modal -->
            <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Log in</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    
                    <form action="" method="POST">
                      <div class="mb-3">
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="reg_email" placeholder="Email">
                      </div>
                      <div class="mb-3">
                        <input type="password" class="form-control" id="exampleInputPassword1" name="reg_password" placeholder="Password">
                      </div>
                      <button type="submit" class="btn btn-dark" name="loginBtn" id="loginbutton">Login</button>
                      <div class="ftr">
                        <span>Don't have an account?</span> <a type="button" data-bs-toggle="modal" data-bs-target="#registrationModal" id="sdy">Create account</a>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>
            <!-- Login End -->
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>