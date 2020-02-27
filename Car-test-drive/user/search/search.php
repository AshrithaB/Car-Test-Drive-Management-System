 <!DOCTYPE>
<html>
<head>

  <title>Search</title>
    <link rel="stylesheet" href="../css/topnav.css">
    <link rel="stylesheet" href="../css/searchbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
body {
  background-image: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.2)),url("../../pictures/img19.jpg");
  background-color: #cccccc;
  height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: initial;
  background-attachment: fixed;
}
.input-field {
  margin-top: 20%;
  margin-left: 20%;
  width: 50%;
  text-align: center;
  padding: 4px 4px;
  text-decoration: none;
  font-size: 17px;
  border-radius: 10px;
  background: #2929a8;
}

</style>
</head>

<body> 
  
   <div class="topnav">
  <a href="../index.html">Home</a>
  <a class = "active" href="search.php">Search</a>
  <a href="../checkstatus/check_status.php">Status</a></li>
  <a href="../../INDEX.html">Log Out</a> </li>



<div class="input-field">
  <div class="search-container">
    <form action="php/search_sp.php" method="post">
      <select data-trigger="" name="choices-single-defaul">
        <option placeholder="">Select Search by</option>
        <option>Company</option>
        <option>Car Model</option>
        <option>Car Type</option>
        <option>Price</option>
        <option>Mileage</option>
        </select>
      <input class="search" type="text" placeholder="Search.." name="input_search_keyword">
      <button class="search-button" type="submit" name="search"><i class="fa fa-search"></i></button>
    
    </form>
  </div>
</div>

</body>

</html>