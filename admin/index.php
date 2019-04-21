<?php
require_once 'scripts/config.php';
confirm_logged_in();
greeting();

$products = getAll('tbl_products');
$message = greeting();


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="../css/login.css"> -->
  <title>Admin Dashboard</title>
</head>

<body id="admin-dash" style="padding-top: 1rem;">
  <div>
    <h1 class="text-center">Admin Dashboard</h1>
    <hr style="width: 10%; margin: 0 auto; background-color: black; margin-top: 1rem; margin-bottom: 1rem;">
    <h2 class="text-muted text-center">Welcome Admin</h2>
    <h4 class="text-muted text-center">Your Last Login Was on: <?php echo $_SESSION['user_login_time'];?></h4>
  </div>


  <nav>
    <ul>
      <li><a href="scripts/caller.php?caller_id=logout">Sign Out</a></li>
    </ul>
    <ul>
      <li><a href="admin_addproduct.php">Add Product</a></li>
    </ul>
  </nav>

<div class="container">
<div class="row">
  <div class="col-md-3">
          <div class="card mb-4 shadow-sm">
          <img src="../images/fitbit.jpeg" alt="fitbit" class="bd-placeholder-img card-img-top" width="100%" height="225">
            <div class="card-body">
            <p class="card-text" style="text-decoration:underline;">Price: 150CAD</p>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Delete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
  </div>
</div>
</div>

  