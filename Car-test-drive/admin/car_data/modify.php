<!DOCTYPE>
<html>
<head>

  <title>Modify Car</title>
    <link rel="stylesheet" type="text/css" href="../css/topnav.css">
    <link rel="stylesheet" type="text/css" href="../css/astyle.css">

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
  <a class = "active" href="modify.php">Car</a></li>
  <a href="../add/add.php">Add New Car</a>
  <a href="../review/review.php">Review Feedback</a></li>
  <a href="../../INDEX.html">Log Out</a> </li>
</div>

<form method="post">
  <div class = "container">

    <h1>Edit the value</h1> 

    <?php 
      include '../../includes/config.php';
      $id = $_REQUEST['id'];
    ?>

    <label><b>Car Id</b></label>
    <input type="text" value="<?php echo $id;?>" readonly>

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

    <button name="edit" class="btn">Edit</button>

  </div>
</form>

<?php
  if(isset($_POST['edit'])){
    include '../../includes/config.php';
    
    $company = $_POST['company'];
    $model = $_POST['model'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $colour = $_POST['colour'];
    $seat_cap = $_POST['seat_cap'];
    $fuel = $_POST['fuel'];
    $mileage = $_POST['mileage'];


    $qr1 = "UPDATE CAR SET Company = '$company', Model = '$model', Type = '$type', Price ='$price' WHERE Car_id = '$id'";
    $res1 = $conn->query($qr1);
    
    if($res1 === TRUE ){
      $qr2 = "UPDATE CAR_DESIGN SET Colour = '$colour', Seating_capacity = '$seat_cap', Fuel= '$fuel', Mileage = '$mileage' WHERE Car_id = '$id'";
      $res2 = $conn->query($qr2);
      if($res2 === TRUE){

      echo "<script type = \"text/javascript\">
          alert(\"Car Succesfully Updated\");
          window.location = (\"car_data.php\")
          </script>";
      }
    }
    else 'Failed';
  }
?>
</body>
</html>