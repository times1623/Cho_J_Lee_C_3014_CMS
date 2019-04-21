<?php
require_once 'scripts/config.php';
confirm_logged_in();

$results = getAll('tbl_products');



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Admin Dashboard</title>
</head>

<body id="admin-dash" style="padding-top: 1rem;">
  <div>
    <h1 class="text-center">Admin Dashboard</h1>
    <hr style="width: 10%; margin: 0 auto; background-color: black; margin-top: 1rem; margin-bottom: 1rem;">
    <h2 class="text-muted text-center">Welcome Admin</h2>
    <h4 class="text-muted text-center">Your Last Login Was on: <?php echo $_SESSION['user_date'];?></h4>
  </div>


  <nav>
    <ul>
    <li><a href="../index.php">Home</a></li>
      <li><a href="scripts/caller.php?caller_id=logout">Sign Out</a></li>
      <li><a href="admin_addproduct.php">Add Product</a></li>
    </ul>
  </nav>

<div class="container">
<div class="row">
<?php while ($row = $results->fetch(PDO::FETCH_ASSOC)) : ?>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
          
          <img src="../images/<?php echo $row['products_img']; ?>" alt="<?php echo $row['products_name']; ?>" class="bd-placeholder-img card-img-top" >
         
            <div class="card-body">
            <p class="card-text"> <?php echo $row['products_name']; ?></p>
            <p class="card-text" style="text-decoration:underline;"><?php echo $row['products_price']; ?></p>
              <p class="card-text"><?php echo wordslimit($row['products_desc']); ?>...</p>
              <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a href="admin_editproduct.php?product=<?php echo $row['products_id'] ?>">
                  <button  type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </a>
                <a href="admin_deleteproduct.php?delete=<?php echo $row['products_id'] ?>">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Delete</button>
                </a>
      
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
    
          </div>
        </div>
  <?php endwhile; ?>
</div>
</div>

  