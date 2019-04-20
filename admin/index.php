<?php 
	require_once('scripts/config.php');
	confirm_logged_in();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>SportCheck CMS</title>
	<link rel="stylesheet" href="../css/header.css">
	<link rel="stylesheet" href="../css/product.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </head>
<nav class="navbar navbar-expand-lg navbar-dark" id="nav">
        <div class="container">
            <a class="navbar-brand" href="#" style="color:white;">SportsCheck</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.php" style="color:white;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin_login.php" style="color:white;">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
	</nav>
	
<body class="body">


<header class="head">
    <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
        <h1 class="mx-auto my-0 text-uppercase" style="color:white;">SPORTSCHECK CANADA</h1>
        <h2 class="text-white-50 mx-auto mt-2 mb-5">2019 NEW SALE COMMING SOON</h2>
      </div>
    </div>
  </header>  
  <div class="container-fluid mainNav">
<div class="row">
<div class="col-12 col-md-8 mx-auto">
<nav>
	<ul>
		<li><a href="#">MEN</a></li>
		<li><a href="#">WOMEN</a></li>
		<li><a href="#">KIDS</a></li>
		<li><a href="#">FOOTWEAR</a></li>
		<li><a href="#">SPORTS GEAR</a></li>
		<li><a href="#">ELECTRONIC</a></li>
		<li><a href="#">SPORT ACCESORIES</a></li>
		<li><a href="#">ETC</a></li>
		<li><a href="admin_addproduct.php">ADD PRODUCT</a></li>
	</ul>
</nav>
</div>
</div>
</div>

  <div class="container-fluid">
	<div class="row">
	<div class="col-12 col-md-4 offset-md-8">
	<form class="search-container">
	<input type="text" placeholder="Search..">
	<button type="submit">Submit</button>
  </form>
   </div>
	</div>
</div>



<div class="container">
<div class="row justify-content-center">    	
  <div class="col-md-4">
    <div class="card card1">
      <a href="#">
       <img src="../images/jordan1.jpg" class="img-fluid img1">
      </a>

      <div class="card-body">
          <h3 class="mt-2">Jordan Air Nike #1</h3>
          <p>This is the most popular product among Canadians in 2018</p>
		  <a href="admin_editproduct.php" class="btn btn-primary" style="background-color: #FF0002; color:white; border:none;">Edit Product</a>
		  <a href="#" class="btn btn-primary" style="background-color: #FF0002; color:white; border:none;">Delete Product</a>
      </div>
    </div>
  </div>
</div>
</div>

</body>


</html>