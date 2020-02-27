<!DOCTYPE>
<html>
<head>

	<title>Add Car</title>
    <link rel="stylesheet" href="../css/topnav.css">
    <link rel="stylesheet" href="../css/astyle.css">
    
<style>
body {
  background-image: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.2)),url("../../pictures/img23.png");
  background-color: #cccccc;
  height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: initial;
  background-attachment: fixed;
}
</style>
</head>

<body> 
 <div class="topnav">
  <a href="../index.html">Home</a>
  <a href="../car_data/car_data.php">Car</a></li>
  <a class = "active" href="add.php">Add New Car</a>
  <a href="../review/review.php">Review Feedback</a></li>
  <a href="../../INDEX.html">Log Out</a> </li>
</div>

<form method="post">
  <div class = "container">

    <h1>Add New Car</h1>

    <label for="id"><b>Car Id</b></label>
    <input type="text" placeholder="Enter the id" name="id" required>

    <label for="company"><b>Company</b></label>
    <input type="text" placeholder="Enter the company" name="company" required>

    <label for="model"><b>Model</b></label>
    <input type="text" placeholder="Enter the name/model" name="model" required>

    <label for="type"><b>Type</b></label>
    <input type="text" placeholder="Enter the type (Manual/Automatic)" name="type" required>
  
    <label for="price"><b>Price(in lakhs)</b></label>
    <input type="text" placeholder="Enter the price" name="price" required>

    <label for="length"><b>Length(in mm)</b></label>
    <input type="text" placeholder="Enter the Length" name="length" required>

    <label for="width"><b>Width(in mm)</b></label>
    <input type="text" placeholder="Enter the Width" name="width" required>
    
    <label for="seat_cap"><b>Seating Capacity</b></label>
    <input type="text" placeholder="Enter the seat_cap" name="seat_cap" required>

    <label for="colour"><b>Colour</b></label>
    <input type="text" placeholder="Enter the colour" name="colour" required>

    <label for="fuel"><b>Fuel</b></label>
    <input type="text" placeholder="Enter the fuel" name="fuel" required>

    <label for="mileage"><b>Mileage(in Kmpl)</b></label>
    <input type="text" placeholder="Enter the mileage" name="mileage" required>

    <button name="add" class="btn">Add</button>

  </div>
</form>

<?php
  if(isset($_POST['add'])){
    include '../../includes/config.php';
    
    $id = $_POST['id'];
    $company = $_POST['company'];
    $model = $_POST['model'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $length = $_POST['length'];
    $width = $_POST['width'];
    $seat_cap = $_POST['seat_cap'];
    $colour = $_POST['colour'];
    $fuel = $_POST['fuel'];
    $mileage = $_POST['mileage'];


    $qr1 = "INSERT INTO CAR VALUES ('$id','$company','$model','$type','$price')";
    $res1 = $conn->query($qr1);
    
    if($res1 == TRUE ){
      $qr2 = "INSERT INTO CAR_DESIGN VALUES('$id','$length','$width','$seat_cap','$colour','$fuel','$mileage')";
      $res2 = $conn->query($qr2);
      if($res2 == TRUE){

      echo "<script type = \"text/javascript\">
          alert(\"Car Succesfully Added\");
          window.location = (\"add.php\")
          </script>";
      }
    }
    else echo "<script type = \"text/javascript\">
          alert(\"Failed. Try Again\");
          window.location = (\"add.php\")
          </script>";
  }
?>

</body>
</html>