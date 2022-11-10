<?php
  session_start();
  require('include/connect.php');
  

  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) {
    header('Location: index.php');
    exit();
  }

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>

    <?php
      if(isset($_SESSION['loginSuccessful'])) {
        echo $_SESSION['loginSuccessful'];
        unset($_SESSION['loginSuccessful']);
      }
    ?>


    <!-- Navbar -->
    <?php include 'include/navbar.php';?>


    <div class="container">
      <div class="homeBox">
        <h1 class="homeloginHeadline">You are succesfully logged in!</h1>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>