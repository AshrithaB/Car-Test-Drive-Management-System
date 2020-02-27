<!DOCTYPE>
<html>
<head>

  <title>Home</title>
    <link rel="stylesheet" href="../css/topnav.css">
    <link rel="stylesheet" href="../css/fstyle.css">
    <link rel="stylesheet" href="../css/sstyle.css">

<style>
body {
  background-image: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.2)),url("../../pictures/img4.jpg");
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
  <a href="../search/search.php">Search</a>
  <a class = "active" href="check_status.php">Status</a></li>
  <a href="../../INDEX.html">Log Out</a> </li>
  </div>

<div class="input-field">
  <div class="search-container">
    <form action="booking_status/booking_status.php"  method="post" >
      
     <label for="userid"><b>Email</b></label>
  <input type="email" placeholder="Enter your Email" name="email" required>

  <button type="submit" class="btn">Submit</button>
    
    </form>
  </div>
</div>



</body>

</html>