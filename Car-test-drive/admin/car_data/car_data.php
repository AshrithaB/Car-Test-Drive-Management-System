<!DOCTYPE>
<html>
<head>
	<title>Car Data</title>
    <link rel="stylesheet" href="../css/topnav.css">
    
    <script type="text/javascript">
    function sureToDelete(id){
      if(confirm("Are you sure you want to Delete this Car?")){
        window.location.href ='delete.php?id='+id;
      }
    }
  </script>

  <script type="text/javascript">
    function sureToEdit(id){
      if(confirm("Are you sure you want to Edit this Car?")){
        window.location.href ='modify.php?id='+id;
      }
    }
  </script>
    
<style>
body {
  background-image: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0)),url("../../pictures/img21.jpg");
  background-color: #cccccc;
  height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: initial;
  background-attachment: fixed;
}
.table th{text-align: center;}
.table td{text-align: center;}
</style>
</head>

<body> 

 <div class="topnav">
  <a href="../index.html">Home</a>
  <a class = "active" href="car_data.php">Car</a></li>
  <a href="../add/add.php">Add New Car</a>
  <a href="../review/review.php">Review Feedback</a></li>
  <a href="../../INDEX.html">Log Out</a> </li>
</div>

  <div class="table">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th>Car Id</th>
        <th>Company</th>
        <th>Model</th>
        <th>Type</th>
        <th>Price(in lakhs)</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
      <?php
        include '../../includes/config.php';
        $select = "SELECT Car_id,Company,Model,Type,Price FROM CAR";
        $result = $conn->query($select);
        while($row = $result->fetch_assoc()){
      ?>
      <tr>
        <td><?php echo $row['Car_id'] ?></td>
        <td><?php echo $row['Company'] ?></td>
        <td><?php echo $row['Model'] ?></td>
        <td><?php echo $row['Type'] ?></td>
        <td><?php echo $row['Price'] ?></td>
        <td><a href="javascript:sureToEdit(<?php echo $row['Car_id'];?>)">Edit</a></td>
        <td><a href="javascript:sureToDelete(<?php echo $row['Car_id'];?>)">Delete</a></td>
      </tr>
      <?php
        }
      ?>
    </table>

</body>
</html>
