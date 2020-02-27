<!DOCTYPE>
<html>
<head>

  <title>Home</title>
    <link rel="stylesheet" href="../../css/topnav.css">
    <link rel="stylesheet" href="../../css/searchbar.css">
    <link rel="stylesheet" href="../../css/table.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script type="text/javascript">
    function sureToBook(id){
      if(confirm("Are you sure you want to Book this Car?")){
        window.location.href ='book_slot/book_slot.php?id='+id;
      }
    }
  </script>

<style>
body {
  background-image: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.2)),url("../../../pictures/img10.jpg");
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
  <a href="../../index.html">Home</a>
  <a class = "active" href="../search.php">Search</a>
  <a href="../../checkstatus/check_status.php">Status</a></li>
  <a href="../../../INDEX.html">Log Out</a> </li>


<?php
if(isset($_POST['search'])){
  include '../../../includes/config.php';
  
  $choices = $_POST['choices-single-defaul'];
  $input_name = $_POST['input_search_keyword'];

  $spforCompany= mysqli_query($conn, "CREATE DEFINER=`root`@`localhost` PROCEDURE `SearchCompany`(IN `page` VARCHAR(30)) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER SELECT c.Car_id,Company,Model,Type,Price,Length,Width,Seating_capacity,Colour,Fuel,Mileage FROM CAR c, CAR_DESIGN cd WHERE c.Company = page AND c.Car_id = cd.Car_id;");

  $spforModel= mysqli_query($conn, "CREATE DEFINER=`root`@`localhost` PROCEDURE `SearchModel`(IN `page` VARCHAR(30)) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER SELECT c.Car_id,Company,Model,Type,Price,Length,Width,Seating_capacity,Colour,Fuel,Mileage FROM CAR c, CAR_DESIGN cd WHERE c.Model = page AND c.Car_id = cd.Car_id;");

  $spforType= mysqli_query($conn, "CREATE DEFINER=`root`@`localhost` PROCEDURE `SearchType`(IN `page` VARCHAR(30)) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER SELECT c.Car_id,Company,Model,Type,Price,Length,Width,Seating_capacity,Colour,Fuel,Mileage FROM CAR c, CAR_DESIGN cd WHERE c.Type = page AND c.Car_id = cd.Car_id;");

  $spforPrice= mysqli_query($conn, "CREATE DEFINER=`root`@`localhost` PROCEDURE `SearchPrice`(IN `page` INT(10)) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER SELECT c.Car_id,Company,Model,Type,Price,Length,Width,Seating_capacity,Colour,Fuel,Mileage FROM CAR c, CAR_DESIGN cd WHERE c.Price <= page AND c.Car_id = cd.Car_id;");

  $spforMileage= mysqli_query($conn, "CREATE DEFINER=`root`@`localhost` PROCEDURE `SearchMileage`(IN `page` INT(10)) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER SELECT c.Car_id,Company,Model,Type,Price,Length,Width,Seating_capacity,Colour,Fuel,Mileage FROM CAR c, CAR_DESIGN cd WHERE cd.Mileage >= page AND c.Car_id = cd.Car_id;");


    if ($choices == 'Company' && !ctype_digit(strval($input_name))) {
    $call = "CALL SearchCompany('$input_name')";
    $result = mysqli_query($conn, $call) ;
	if ($result) {
   		 	$row = $result->fetch_assoc();
    		if($row!=0){
	?>
	<div class="tablecontainer">
	<table>
	<thead>
	    <tr>
	        <th>CAR ID</th>
	        <th>COMPANY</th>
	        <th>MODEL</th>
	        <th>TYPE</th>
	        <th>PRICE(in lakhs)</th>
	        <th>LENGTH(in mm)</th>
	        <th>WIDTH(in mm)</th>
	        <th>SEATCING CAPACITY</th>
	        <th>COLOUR</th>
	        <th>FUEL</th>
	        <th>MILEAGE(in Kmpl)</th>
	        <th>BOOKING</th>
	    </tr>    
	</thead>    
	</table> 
	</div>
	<div>
	<table>
	
	<?php
	     do { 
	            echo "<tr>";
	            echo("<td>" . $row["Car_id"] . "</td> <td>". $row["Company"] . "</td> <td>" . $row["Model"] . "</td><td>" . $row["Type"] . "</td><td>" . $row["Price"] . "</td><td>" . $row["Length"] . "</td> <td>" . $row["Width"] . "</td> <td>" . $row["Seating_capacity"] . "</td><td>" . $row["Colour"] . "</td><td>" . $row["Fuel"] . "</td><td>" . $row["Mileage"] . "</td>");
	?>
	 <td><a href="javascript:sureToBook(<?php echo $row['Car_id'];?>)"><b style="color: black;">Book</b></td>           
	<?php
	            echo "</tr>";
				}while($row = $result->fetch_assoc());
	        }else{
	        echo "<script type = \"text/javascript\">
          	alert(\"No Car Found\");
          	window.location = (\"../search.php\")
          	</script>";
    		}
	    }
	}
	else if ($choices == 'Car Model' && !ctype_digit(strval($input_name))) {
    $call = "CALL SearchModel('$input_name')";
	$result = mysqli_query($conn, $call) ;
	if ($result) {
   		 	$row = $result->fetch_assoc();
    		if($row!=0){
	?>
	<div class="tablecontainer">
	<table>
	<thead>
	    <tr>
	        <th>CAR ID</th>
	        <th>COMPANY</th>
	        <th>MODEL</th>
	        <th>TYPE</th>
	        <th>PRICE(in lakhs)</th>
	        <th>LENGTH(in mm)</th>
	        <th>WIDTH(in mm)</th>
	        <th>SEATCING CAPACITY</th>
	        <th>COLOUR</th>
	        <th>FUEL</th>
	        <th>MILEAGE(in Kmpl)</th>
	        <th>BOOKING</th>
	    </tr>    
	</thead>    
	</table> 
	</div>
	<div>
	<table>
	
	    
	<?php
			do { 
	            echo "<tr>";
	            echo("<td>" . $row["Car_id"] . "</td> <td>". $row["Company"] . "</td> <td>" . $row["Model"] . "</td><td>" . $row["Type"] . "</td><td>" . $row["Price"] . "</td><td>" . $row["Length"] . "</td> <td>" . $row["Width"] . "</td> <td>" . $row["Seating_capacity"] . "</td><td>" . $row["Colour"] . "</td><td>" . $row["Fuel"] . "</td><td>" . $row["Mileage"] . "</td>");
	?>
	 <td><a href="javascript:sureToBook(<?php echo $row['Car_id'];?>)"><b style="color: black;">Book</b></td>           
	<?php
	            echo "</tr>";
				}while($row = $result->fetch_assoc());
	        }else{
	        echo "<script type = \"text/javascript\">
          	alert(\"No Car Found\");
          	window.location = (\"../search.php\")
          	</script>";
    		}
	    } 
	}
	else if ($choices == 'Car Type' && !ctype_digit(strval($input_name))) {
    $call = "CALL SearchType('$input_name')";
	$result = mysqli_query($conn, $call) ;
	if ($result) {
   		 	$row = $result->fetch_assoc();
    		if($row!=0){
	?>
	<div class="tablecontainer">
	<table>
	<thead>
	    <tr>
	        <th>CAR ID</th>
	        <th>COMPANY</th>
	        <th>MODEL</th>
	        <th>TYPE</th>
	        <th>PRICE(in lakhs)</th>
	        <th>LENGTH(in mm)</th>
	        <th>WIDTH(in mm)</th>
	        <th>SEATCING CAPACITY</th>
	        <th>COLOUR</th>
	        <th>FUEL</th>
	        <th>MILEAGE(in Kmpl)</th>
	        <th>BOOKING</th>
	    </tr>    
	</thead>    
	</table> 
	</div>
	<div>
	<table>
	    
	<?php
			do { 
	            echo "<tr>";
	            echo("<td>" . $row["Car_id"] . "</td> <td>" . $row["Company"] . "</td> <td>" . $row["Model"] . "</td><td>" . $row["Type"] . "</td><td>" . $row["Price"] . "</td><td>" . $row["Length"] . "</td> <td>" . $row["Width"] . "</td> <td>" . $row["Seating_capacity"] . "</td><td>" . $row["Colour"] . "</td><td>" . $row["Fuel"] . "</td><td>" . $row["Mileage"] . "</td>");
	?>
	 <td><a href="javascript:sureToBook(<?php echo $row['Car_id'];?>)"><b style="color: black;">Book</b></td>           
	<?php
	            echo "</tr>";
				}while($row = $result->fetch_assoc());
	        }else{
	        echo "<script type = \"text/javascript\">
          	alert(\"No Car Found\");
          	window.location = (\"../search.php\")
          	</script>";
    		}
	    } 
	}
	else if ($choices == 'Price' && ctype_digit(strval($input_name))) {
    $call = "CALL SearchPrice('$input_name')";
	$result = mysqli_query($conn, $call) ;
	if ($result) {
   		 	$row = $result->fetch_assoc();
    		if($row!=0){
	?>
	<div class="tablecontainer">
	<table>
	<thead>
	    <tr>
	        <th>CAR ID</th>
	        <th>COMPANY</th>
	        <th>MODEL</th>
	        <th>TYPE</th>
	        <th>PRICE(in lakhs)</th>
	        <th>LENGTH(in mm)</th>
	        <th>WIDTH(in mm)</th>
	        <th>SEATCING CAPACITY</th>
	        <th>COLOUR</th>
	        <th>FUEL</th>
	        <th>MILEAGE(in Kmpl)</th>
	        <th>BOOKING</th>
	    </tr>    
	</thead>    
	</table> 
	</div>
	<div>
	<table>
	
	    
	<?php
			do { 
	            echo "<tr>";
	            echo("<td>" . $row["Car_id"] . "</td> <td>". $row["Company"] . "</td> <td>" . $row["Model"] . "</td><td>" . $row["Type"] . "</td><td>" . $row["Price"] . "</td><td>" . $row["Length"] . "</td> <td>" . $row["Width"] . "</td> <td>" . $row["Seating_capacity"] . "</td><td>" . $row["Colour"] . "</td><td>" . $row["Fuel"] . "</td><td>" . $row["Mileage"] . "</td>");
	?>
	 <td><a href="javascript:sureToBook(<?php echo $row['Car_id'];?>)"><b style="color: black;">Book</b></td>           
	<?php
	            echo "</tr>";
				}while($row = $result->fetch_assoc());
	        }else{
	        echo "<script type = \"text/javascript\">
          	alert(\"No Car Found\");
          	window.location = (\"../search.php\")
          	</script>";
    		}
	    } 
	}
	else if ($choices == 'Mileage' && ctype_digit(strval($input_name))) {
    $call = "CALL SearchMileage('$input_name')";
	$result = mysqli_query($conn, $call) ;
	if ($result) {
   		 	$row = $result->fetch_assoc();
    		if($row!=0){
	?>
	<div class="tablecontainer">
	<table>
	<thead>
	    <tr>
	        <th>CAR ID</th>
	        <th>COMPANY</th>
	        <th>MODEL</th>
	        <th>TYPE</th>
	        <th>PRICE(in lakhs)</th>
	        <th>LENGTH(in mm)</th>
	        <th>WIDTH(in mm)</th>
	        <th>SEATCING CAPACITY</th>
	        <th>COLOUR</th>
	        <th>FUEL</th>
	        <th>MILEAGE(in Kmpl)</th>
	        <th>BOOKING</th>
	    </tr>    
	</thead>    
	</table> 
	</div>
	<div>
	<table>
	    
	<?php
			do { 
	            echo "<tr>";
	            echo("<td>" . $row["Car_id"] . "</td> <td>" . $row["Company"] . "</td> <td>" . $row["Model"] . "</td><td>" . $row["Type"] . "</td><td>" . $row["Price"] . "</td><td>" . $row["Length"] . "</td> <td>" . $row["Width"] . "</td> <td>" . $row["Seating_capacity"] . "</td><td>" . $row["Colour"] . "</td><td>" . $row["Fuel"] . "</td><td>" . $row["Mileage"] . "</td>");
	?>
	 <td><a href="javascript:sureToBook(<?php echo $row['Car_id'];?>)"><b style="color: black;">Book</b></td>           
	<?php
	            echo "</tr>";
				}while($row = $result->fetch_assoc());
	        }else{
	        echo "<script type = \"text/javascript\">
          	alert(\"No Car Found\");
          	window.location = (\"../search.php\")
          	</script>";
    		}
	    } 
	}
	}
	?>
</body>
</html>