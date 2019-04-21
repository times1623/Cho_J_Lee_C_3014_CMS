<?php
require_once 'admin/scripts/config.php';

$categories = getAll('tbl_categories');
$gender = getAll('tbl_gender');
$price = getAll('tbl_price');
$color = getAll('tbl_color');
$brand = getAll('tbl_brand');
$available = getAll('tbl_available');
$sale = getAll('tbl_sale');
$size = getAll('tbl_size');

if (isset($_GET['filter'])) {
  $tbl = 'tbl_products';
  $col_3 = $_GET['filter'].'_name';
if($_GET['filter']=="gender"){
  $tbl_3 = 'tbl_prod_gender';
}
if($_GET['filter']=="price"){
  $tbl_3 = 'tbl_prod_price';
  $col_3 = $_GET['filter'].'_level';
}
if($_GET['filter']=="color"){
  $tbl_3 = 'tbl_prod_color';
}
if($_GET['filter']=="brand"){
  $tbl_3 = 'tbl_prod_brand';
}
if($_GET['filter']=="available"){
  $tbl_3 = 'tbl_prod_available';
}
if($_GET['filter']=="sale"){
  $tbl_3 = 'tbl_prod_sale';
}
if($_GET['filter']=="size"){
  $tbl_3 = 'tbl_prod_size';
}
  $tbl_2 = 'tbl_'.$_GET['filter'];
  $col_2 = $_GET['filter'].'_id';
  $col = 'products_id';
  $filter = $_GET['name'];
  $results = filterResults($tbl, $tbl_2, $tbl_3, $col, $col_2, $col_3, $filter);
  $title ="(".$_GET['filter'].")";
// var_dump($results);
} else {
  $results = getAll('tbl_products');
  $title = "Welcome!";
  $filter = "";
}
?>
<!DOCTYPE html>
<html lang="en">


<body>
    <!-- header -->
<?php include 'templates/header.html' ?>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">Sports Check</h1>
        <h2 class="my-4"><?php echo $title ?><?php echo $filter?></h2>

        <!-- main filters -->
        <div class="list-group">
        <ul>
        <li style="list-style-type:none;">Gender
          <!-- gender -->
          <?php while ($row = $gender->fetch(PDO::FETCH_ASSOC)) : ?>
          <a href="index.php?filter=gender&&name=<?php echo $row['gender_name'];?>" class="list-group-item"><?php echo $row['gender_name']; ?></a>
          <?php endwhile; ?>
        </li>
        <li style="list-style-type:none;">Price
          <!-- gender -->
          <?php while ($row = $price->fetch(PDO::FETCH_ASSOC)) : ?>
          <a href="index.php?filter=price&&name=<?php echo $row['price_level']; ?>" class="list-group-item"><?php echo $row['price_level']; ?></a>
          <?php endwhile; ?>
        </li>
        <li style="list-style-type:none;">Color
           <!-- color -->
           <?php while ($row = $color->fetch(PDO::FETCH_ASSOC)) : ?>
          <a href="index.php?filter=color&&name=<?php echo $row['color_name']; ?>" class="list-group-item"><?php echo $row['color_name']; ?></a>
          <?php endwhile; ?>
        </li>
        <li style="list-style-type:none;">Brand
           <!-- brand -->
           <?php while ($row = $brand->fetch(PDO::FETCH_ASSOC)) : ?>
          <a href="index.php?filter=brand&&name=<?php echo $row['brand_name']; ?>" class="list-group-item"><?php echo $row['brand_name']; ?></a>
          <?php endwhile; ?>
          </li>
          <li style="list-style-type:none;">In Store Availability
            <!-- available -->
            <?php while ($row = $available->fetch(PDO::FETCH_ASSOC)) : ?>
          <a href="index.php?filter=available&&name=<?php echo $row['available_name']; ?>" class="list-group-item"><?php echo $row['available_name']; ?></a>
          <?php endwhile; ?>
          </li>
          <li style="list-style-type:none;">Sale
            <!-- sale -->
            <?php while ($row = $sale->fetch(PDO::FETCH_ASSOC)) : ?>
          <a href="index.php?filter=sale&&name=<?php echo $row['sale_name']; ?>" class="list-group-item"><?php echo $row['sale_name']; ?></a>
          <?php endwhile; ?>
          </li>
          <li style="list-style-type:none;">Size
            <!-- size -->
            <?php while ($row = $size->fetch(PDO::FETCH_ASSOC)) : ?>
          <a href="index.php?filter=size&&name=<?php echo $row['size_name']; ?>" class="list-group-item"><?php echo $row['size_name']; ?></a>
          <?php endwhile; ?>
          </li>

          </ul>
        </div>

      </div>
 
    <!-- main products -->
      <div class="col-lg-9">   
      <div class="row">
      <?php while ($row = $results->fetch(PDO::FETCH_ASSOC)) : ?>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
          <a href="details.php?id=<?php echo $row['products_id']; ?>">
          <img src="images/<?php echo $row['products_img']; ?>" alt="<?php echo $row['products_name']; ?>" class="bd-placeholder-img card-img-top" width="100%" height="225">
         
            <div class="card-body">
            <p class="card-text"> <?php echo $row['products_name']; ?></p>
            <p class="card-text" style="text-decoration:underline;"><?php echo $row['products_price']; ?></p>
              <p class="card-text"><?php echo wordslimit($row['products_desc']); ?>...</p>
              <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">9 mins</small>
              </div>
            </div>
            </a>
          </div>
        </div>
        <?php endwhile; ?>
        </div>
    
      </div>


  </div>
  <?php include 'templates/footer.html' ?>