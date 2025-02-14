<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  .navbar {
    background-color: #333333  ;
    padding: 10px 10px;
    color:#FF0404  ;
  }
  .navbar a {
    float: left;
    color: white;
    text-align: center;
    padding: 12px;
    text-decoration: none;
    font-size: 18px;
    line-height: 25px;
  }
  .navbar-brand {
    font-size: 25px;
    font-weight: bold;

  }
  .navbar a {
    float: none;
    display: block;
    text-align: left;
  }
  .navbar-right {
    float: none;
  }
   #qq:hover{
    background-color:#E5E8E8 ;
    border-radius: 5px;
  }
}
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" id="qq" href="dashboard.php" style="color:#F51A14;">Transfuse Tech Admin Panel</a>
    </div>
    <ul class="nav navbar-nav navbar-right">

      <li class="dropdown"><a class="dropdown-toggle" id="qw" data-toggle="dropdown" href="#" style="font-weight:bold;color:white "> <span class="glyphicon glyphicon-user"></span>&nbsp&nbsp
        <?php
        include 'conn.php';
        $username=$_SESSION['username'];
        $sql="select * from admin_info where admin_username='$username'";
        $result=mysqli_query($conn,$sql) or die("query failed.");
        $row=mysqli_fetch_assoc($result);
        echo "Hello ".$row['admin_name'];
       ?><span class="caret"></span></a>
        <ul class="dropdown-menu" style="background-color:#D6EAF8;">
          <li><a href="change_password.php" style="color:#DC7633  ">Change Password </a></li>
          <li><a href="logout.php" style="color:#D35400 ;">Logout</a></li>
        </ul>
    </li>
    </ul>

  </div>

</nav>
</body></html>

login.php-

<html>

<head>  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script></head>
<body background="admin_image\blood-cells.jpg">


  <form class="" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">

    <div class="container" style="margin-top:200px;">
      <div class="row justify-content-center">
          <div class="col-lg-6">
              <h1 class="mt-4 mb-3" style="color:#FFFFFF ;">
                  Transfuse Tech
                  <br>Admin Login Portal
                </h1>

            </div>
      </div>
      <div class="card" style="height:250px; background-image:url('admin_image/glossy1.jpg');">
          <div class="card-body">

      <div class="row justify-content-lg-center justify-content-mb-center" >
      <div class="col-lg-6 mb-6 ">
      <div class="font-italic" style="font-weight:bold">Username<span style="color:red">*</span></div>
      <div><input type="text" name="username" placeholder="Enter your username" class="form-control" value="" required></div>
    </div>
    </div>
    <div class="row justify-content-lg-center justify-content-mb-center">
    <div class="col-lg-6 mb-6 "><br>
    <div class="font-italic"style="font-weight:bold">Password<span style="color:red">*</span></div>
    <div><input type="password" name="password" placeholder="Enter your Password" class="form-control" value="" required></div>
    </div>
  </div>
  <div class="row justify-content-lg-center justify-content-mb-center">
    <div class="col-lg-4 mb-4 " style="text-align:center"><br>
    <div><input type="submit" name="login" class="btn btn-primary" value="LOGIN" style="cursor:pointer"></div>
    </div>
  </div>
    </div>
  </div></div>
<br>
  <?php
    include 'conn.php';

  if(isset($_POST["login"])){

    $username=mysqli_real_escape_string($conn,$_POST["username"]);
    $password=mysqli_real_escape_string($conn,$_POST["password"]);

    $sql="SELECT * from admin_info where admin_username='$username' and admin_password='$password'";
    $result=mysqli_query($conn,$sql) or die("query failed.");

    if(mysqli_num_rows($result)>0)
    {
      while($row=mysqli_fetch_assoc($result)){
        session_start();
         $_SESSION['loggedin'] = true;
        $_SESSION["username"]=$username;
        header("Location: dashboard.php");
      }
    }
    else {
      echo '<div class="alert alert-danger" style="font-weight:bold"> Username and Password are not matched!</div>';
    }

  }
   ?>
 </form>
</body>
</html>
