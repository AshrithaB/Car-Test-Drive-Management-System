<!DOCTYPE>
<html>
<head>

  <title>Home</title>
    <link rel="stylesheet" href="../css/topnav.css">
    <link rel="stylesheet" href="../css/fstyle.css">


<style>
body {
  background-image: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.2)),url("../../pictures/img3.jpg");
  background-color: #cccccc;
  height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: initial;
  background-attachment: fixed;
}
.container
{
top: 15%;
left: 60%; 
width:100%;
padding:12px;
}
input[type="email"]
{
  width: 60%;
}
.btn
{
  float:left;
}
 label, .btn, input[type="email"]
{
  float:left;
  align-content: center;
}


</style>
</head>

<body> 


   <div class="topnav">
  <a href="../index.html">Home</a>
  <a href="../search/search.php">Search</a>
  <a class = "active" href="../checkstatus/check_status.php">Status</a></li>
  <a href="../../INDEX.html">Log Out</a> </li>
  </div>

<form method="post" class="container">

    <h1 style="color: #d6dbdf;" >Feedback Form</h1>

    <label style="color: #d6dbdf;" for="rating"><b>Rating</b></label>
    <p style="color: #d6dbdf;"><br><b>Rate between 1 to 5</b></br></p>
    <p style="color: #d6dbdf;"><b>5 - Excellent &nbsp &nbsp &nbsp 4 - Good &nbsp &nbsp &nbsp 3 - Okay &nbsp &nbsp &nbsp &nbsp 2 - Bad &nbsp &nbsp &nbsp 1- Worst</b></p>
    <input type="text" placeholder="Enter Rating" name="rating" required>

    <label style="color: #d6dbdf;" for="comment"><b>Comment</b></label>
    <input type="text" placeholder="Enter any comments" name="comment" required>

    <button name="submit" type="submit" class="btn">Submit</button>
    
  </form>

<?php
include '../../includes/config.php';
  $id = $_REQUEST['id'];
  $qr1 = "SELECT * FROM TEST_SLOT WHERE Slot_id = '$id'";
  $result1 = $conn->query($qr1);
  $row1 = $result1->fetch_assoc(); 
  $qr2 = "SELECT * FROM CAR WHERE Car_id = " . $row1['Car_id'] . "";
  $result2 = $conn->query($qr2);
  $row2 = $result2->fetch_assoc();
  $model = $row2['Model'];
  $email = $row1['U_login_id'];

if(isset($_POST['submit'])){
    include '../../includes/config.php';
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    $qr3 = "INSERT INTO FEEDBACK(Model,Rating,Comment,U_login_id) VALUES ('$model','$rating','$comment','$email')";
    $result3 = $conn->query($qr3);
    if($result3){
     echo "<script type = \"text/javascript\">
          alert(\"Feedback given Successfully\");
          window.location = (\"../checkstatus/check_status.php\")
        </script>";
    }else{
      echo "<script type = \"text/javascript\">
          alert(\"Failed. Try again later.\");
          window.location = (\"../checkstatus/check_status.php\")
        </script>";

        }
  
}
  



  ?>




</body>

</html>