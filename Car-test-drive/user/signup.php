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


<body>

 <ul class="menu">
    <li><a href="../INDEX.html">Home</a></li>
    <li style ="float:right"><a href="login.php">User Login</a> </li>
    <li style ="float:right"><a href="../admin/login.php">Admin Login</a></li>
    <li><a href="../about/about.html">About</a></li>
  </ul>

<form class="scontainer" method = "post" >
    <h1>Sign Up</h1>
    
    
    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" >

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" >

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" required>

    <label for="mobile"><b>Mobile</b></label>
    <input type="text" placeholder="Enter Mobile" name="mobile" required>

    <button style ="float:right" type="submit" name="signup"class="btn">Sign Up</button>

</form>

<?php
    if(isset($_POST['signup'])){
        include '../includes/config.php';
        $email = $_POST['email'];
        $password = $_POST['psw'];
        $r_password = $_POST['psw-repeat'];
        $name = $_POST['name'];
        $mobile = $_POST['mobile'];
        $qy = "SELECT * FROM USER_LOGIN WHERE U_login_id = '$email'";
        $log = $conn->query($qy);
        $num = $log->num_rows;
        $row = $log->fetch_assoc();
        if($num > 0){
            session_start();
            echo "<script type = \"text/javascript\">
                        alert(\"User already exists!!\");
                        window.location = (\"signup.php\")
                        </script>";
        }
        else if($password != $r_password)
        {
            echo "<script type = \"text/javascript\">
                        alert(\"Password is not matching!!\");
                        window.location = (\"signup.php\")
                        </script>";
        }
        else
        {
            $qry = "INSERT INTO USER_LOGIN VALUES('$email','$password','$name','$mobile')";
            $result = $conn->query($qry);
            if($result == TRUE){
                echo "<script type = \"text/javascript\">
                        alert(\"Successfully Registered.\");
                        window.location = (\"login.php\")
                        </script>";
        }   else{
                echo "<script type = \"text/javascript\">
                        alert(\"Registration Failed. Try Again\");
                        window.location = (\"signup.php\")
                        </script>";
        }
        }
        
    }

?>

</body>
</html>
