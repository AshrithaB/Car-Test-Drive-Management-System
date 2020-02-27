<!DOCTYPE>
<html>
<head>

	<title>Home</title>
    <link rel="stylesheet" href="../../css/topnav.css">
    <link rel="stylesheet" href="../../css/fstyle.css">


    <script type="text/javascript">
    function feedback(id){
            window.location.href ='../../feedback/feedback.php?id='+id;

    }
  </script>

<style>
body {
  background-image: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.2)),url("../../../pictures/img22.jpg");
  background-color: #cccccc;
  height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: initial;
  background-attachment: fixed;
}
.tablecontainer
{
  margin-top: 5%;
  background: none;
  border:none;
}
table {
      
  table-layout: fixed;
    word-wrap: break-word;
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 95%;  
  margin-left:3%;
  margin-right:3%;
 
}

td, th{

  width: 10%;
  border: 1px solid #dddddd;
  text-align: center;
  padding: 10px;
  background-color: #4f88d3; 

}


tr:nth-child(odd) {
 padding: 10px;
  background-color: #dddddd;
}



</style>
</head>

<body> 
  
   <div class="topnav">
  <a href="../../index.html">Home</a>
  <a href="../../search/search.php">Search</a>
  <a class = "active" href="check_status.php">Status</a>
  <a href="../../../INDEX.html">Log Out</a> 
  </div>

<a style="color: red; margin-left: 70%;" ><b>Disclaimer(!) - Carry Driving licence for the test drive.</b></a>

<?php
  if(isset($_POST['email'])){
  include '../../../includes/config.php';
  
  $email = $_POST['email'];
  
  $qr = "SELECT * FROM TEST_SLOT WHERE U_login_id = '$email'";
  $res = $conn->query($qr);
  if($res){
    ?>
    <div class="tablecontainer">
      <table>
        <tr>
          <th>SLOT ID</th>
          <th>CAR ID</th>
          <th>DATE</th>
          <th>START TIME</th>
          <th>END TIME</th>
          <th>LOCATION</th>
          <th>Give Feedback</th>
        </tr>       
      </table> 
    </div>
    <div>
      <table>    
          
    <?php
    while($row1 = $res->fetch_assoc()){
     if($row1 != 0){
      echo "<tr>";
          echo("<td>" . $row1["Slot_id"] . "</td><td>" . $row1["Car_id"] . "</td><td>" . $row1["Book_date"] . "</td><td>" . $row1["Start_time"] ."</td><td>" . $row1["End_time"] . "</td>");
          $slot_id = $row1['Slot_id']; 
      $qr2 = "SELECT * FROM SLOT_LOCATION WHERE Slot_id = '$slot_id'";
       $result2 = $conn->query($qr2);
       if($result2){
         $row2 = $result2->fetch_assoc();
         echo("<td>" . $row2["Location"] . "</td>");
    ?>
    <td><a href="javascript:feedback(<?php echo $row1['Slot_id'];?>)">Feedback</a></td>
    <?php
    echo "</tr>";
        }
      }
    }
    }
    else
    {
      echo "<script type = \"text/javascript\">
          alert(\"No Booking done..\");
          window.location = (\"booking_status.php\")
          </script>";
    }
  }

  ?>

    
</body>

</html>