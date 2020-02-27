<!DOCTYPE>
<html>
<head>

  <title>Home</title>
    <link rel="stylesheet" href="../../../css/topnav.css">
    <link rel="stylesheet" href="../../../css/fstyle.css">

    <script type="text/javascript">
    function Status(id){
      if(confirm("Car?")){
        window.location.href ='../../../booking_status/checkstatus/check_status.php?id='+id;
      }
    }
  </script>

<style>
body {
  background-image: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.2)),url("../../../../pictures/img30.jpg");
  background-color: #cccccc;
  height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: initial;
  background-attachment: fixed;
}
img
{
  margin-top: 20%;
  width:100%;
  height: 50%;
}
/* Add styles to the form container */
.container {
  position: absolute;
  left: 65%;
  top:5%;
  margin: 20px;
  max-width: 300px;
  padding: 16px;
  background-color:none;
}
</style>
</head>

<body> 
  
   <div class="topnav">
  <a href="../../../index.html">Home</a>
  <a href="../../../search/search.php">Search</a>
  <a class = "active" href="../../../checkstatus/check_status.php">Status</a></li>
  <a href="../../../../INDEX.html">Log Out</a> </li>

<?php
      include '../../../../includes/config.php';
      $sel = "SELECT * FROM CAR WHERE Car_id = '$_REQUEST[id]'";
      $rs = $conn->query($sel);
      $rws = $rs->fetch_assoc();
?>

<form method="post" class="container">

    <h1 style="color: #d6dbdf;">Book Your Slots!!</h1>

    <label style="color: #d6dbdf;" for="userid"><b>Email</b></label>
    <input type="email" placeholder="Enter the your email" name="userid" required>

    <label style="color: #d6dbdf;" for="bookdate"><b>Date of Booking</b></label>
    <input type="date" placeholder="Enter the Date of Booking" name="bookdate" required>

    <label style="color: #d6dbdf;" for="stime"><b>Start Time</b></label>
      <select name = "stime">
        <option value="10:00">10:00am</option>
        <option value="11:00">11:00am</option>
        <option value="12:00">12:00pm</option>
        <option value="1:00">1:00pm</option>
        <option value="2:00">2:00pm</option>
        <option value="3:00">3:00pm</option>
        <option value="4:00">4:00pm</option>
        <option value="5:00">5:00pm</option>
        <option value="6:00">6:00pm</option>
        <option value="7:00">7:00pm</option>
        <option value="8:00">8:00pm</option>
      </select>

    <label style="color: #d6dbdf;" for="etime"><b>End Time</b></label>
      <select name = "etime">
        <option value="11:00">11:00am</option>
        <option value="12:00">12:00pm</option>
        <option value="1:00">1:00pm</option>
        <option value="2:00">2:00pm</option>
        <option value="3:00">3:00pm</option>
        <option value="4:00">4:00pm</option>
        <option value="5:00">5:00pm</option>
        <option value="6:00">6:00pm</option>
        <option value="7:00">7:00pm</option>
        <option value="8:00">8:00pm</option>
        <option value="9:00">9:00pm</option>
      </select>

    <label style="color:#d6dbdf;" for="location"><b>Location</b></label>
    <input type="text" placeholder="Enter the location" name="location" required>
 
    <button name="book" class="btn">Book</button>

  </div>
</form>

<?php
  if(isset($_POST['book'])){
    include '../../../../includes/config.php';
    $userid = $_POST['userid'];
    $bookdate = $_POST['bookdate'];
    $stime = $_POST['stime'];
    $etime = $_POST['etime'];
    $location = $_POST['location'];
     
    $qr1 = "INSERT INTO TEST_SLOT (Car_id,Book_date,Start_time,End_time,U_login_id)
    VALUES('$_GET[id]','$bookdate','$stime','$etime','$userid')";
    $result1 = $conn->query($qr1);
    if($result1 == TRUE){
      $qr2 = "SELECT * FROM TEST_SLOT WHERE Car_id = '$_GET[id]' AND U_login_id='$userid' AND Book_date = '$bookdate'";
      $result2 = $conn->query($qr2);
      if($result2 == TRUE){
        $rows = $result2->fetch_assoc();
        $slot_id = $rows['Slot_id'];
        $qr3 = "INSERT INTO SLOT_LOCATION VALUES('$slot_id','$location')";
        $result3 = $conn->query($qr3);
        if($result3 == TRUE){
          echo "<script type = \"text/javascript\">
              alert(\"Booking successful. Please get your Driving licence\");
              window.location = (\"../../../checkstatus/check_status.php\")
              </script>";
          }else{
            echo "<script type = \"text/javascript\">
              alert(\"Booking Failed. Try Again\");
              window.location = (\"../../search.php\")
              </script>";
            }

        }
      }
      }
  ?>
        


</body>

</html>