<!DOCTYPE>
<html>
<head>

  <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../css/topnav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<style>
body {
  background-image: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.2)),url("../../pictures/img18.jpg");
  background-color: #cccccc;
  height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: initial;
  background-attachment: fixed;
}
.table {margin-left: 25%; margin-right: 25%;margin-top: 5%; border: 2px solid;}
.table th{text-align: center;}
.table td{text-align: center;}
</style>
</head>

<body> 
 <div class="topnav">
  <a href="../index.html">Home</a>
  <a href="../car_data/car_data.php">Car</a></li>
  <a href="../add/add.php">Add New Car</a>
  <a class = "active" href="review.php">Review Feedback</a></li>
  <a href="../../INDEX.html">Log Out</a> </li>
</div>

<div class="table">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th>CAR MODEL</th>
        <th>RATING</th>
        <th>COMMENT</th>
      </tr>
      <?php
        include '../../includes/config.php';
        $select = "SELECT * FROM FEEDBACK";
        $result = $conn->query($select);
        while($row = $result->fetch_assoc()){
      ?>
      <tr>
        <td><?php echo $row['Model'] ?></td>
        <td><?php echo $row['Rating'] ?></td>
        <td><?php echo $row['Comment'] ?></td>
      </tr>
      <?php
        }
      ?>
    </table>


</body>

</html>