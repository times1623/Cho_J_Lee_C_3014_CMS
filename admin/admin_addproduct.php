<?php
require_once 'scripts/config.php';
confirm_logged_in();

$gen_tbl          = 'tbl_genre';
$movie_categories = getAll($gen_tbl);

if (isset($_POST['submit'])) {
    $cover   = $_FILES['cover'];
    $title   = $_POST['title'];
    $year    = $_POST['year'];
    $run     = $_POST['run'];
    $story   = $_POST['story'];
    $trailer = $_POST['trailer'];
    $release = $_POST['release'];
    $genre   = $_POST['genList'];
    $result  = addMovie($cover, $title, $year, $run, $story, $trailer, $release, $genre);
    $message = $result;
}

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

<div class="container">
<div class="row justify-content-center">    	
  <div class="col-md-4">
    <div class="card card1" id="productAdd" style="background-color:transparent; border:1px solid white; padding: 2rem; color:white;">
    <form action="">
    <div class="form-group" style="background-color:transparent;">
        <label for="image">Product Image:</label>
        <input type="file" name="image" id="image" value="" style="width:100%;">
      </div>
      <div class="form-group">
        <label for="title">Product Title:</label>
        <input type="text" name="title" id="title" value="" required>
      </div>
      <div class="form-group">
        <label for="desc">Product Description:</label>
        <textarea class="form-control" id="desc" name="desc" id="desc" rows="3" required></textarea>
      </div>
      <div class="form-group">
        <label for="price">Product Price:</label>
        <input type="text" name="price" id="price" value="" required>
      </div>
      <div class="form-group">
        <label for="category">Product Category</label>
        <select class="form-control" id="category" name="category" required>
          <option>--Select a Category--</option>
        </select>
      </div>
      <button class="btn btn-primary" style="background-color: #FF0002; color:white; border:none;">Submit</button>
    </form>
    </div>
  </div>
</div>
</div>

</body>


</html>