<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/menu.css">
<link rel="stylesheet" type="text/css" href="../css/lsmenu.css">
<style>
body, html {
  height: 100%;
  background:linear-gradient(to right top, #050744, #004283, #007fb8, #00bee1, #5fffff); overflow: hidden;
  font-family: Arial, Helvetica, sans-serif;
}
</style>
</head>
<body> 


  
  <ul class="menu">
    <li><a href="../INDEX.html">Home</a></li>
    <li style ="float:right"><a href="../user/login.php">User Login</a> </li>
    <li style ="float:right"><a href="login.php">Admin Login</a></li>
    <li><a href="../about/about.html">About</a></li>
  </ul>


  <form method="post" class="lcontainer">

    <h1>Login</h1>

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit" name="login"class="btn">Login</button>
    
  </form>

  <?php
        if(isset($_POST['login'])){
          include '../includes/config.php';
          
          $uname = $_POST['email'];
          $pass = $_POST['psw'];
          
          global $uname;
          
          $qy = "SELECT * FROM ADMIN_LOGIN WHERE A_login_id = '$uname' AND A_password = '$pass'";
          $log = $conn->query($qy);
          $num = $log->num_rows;
          $row = $log->fetch_assoc();
          if($num > 0){
            session_start();
            $_SESSION['email'] = $row['A_login_id'];
            $_SESSION['psw'] = $row['A_password'];
            echo "<script type = \"text/javascript\">
                  alert(\"Login Successful.................\");
                  window.location = (\"index.html\")
                  </script>";
          } else{
            echo "<script type = \"text/javascript\">
                  alert(\"Login Failed. Try Again................\");
                  window.location = (\"login.php\")
                  </script>";
          }

        }
      ?>



</body>
</html>
