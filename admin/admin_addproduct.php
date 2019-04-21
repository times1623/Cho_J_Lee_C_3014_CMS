<?php

require_once 'scripts/config.php';
confirm_logged_in();
require_once 'scripts/connect.php';

$tbl_1 = "tbl_available";
$tbl_2 = "tbl_brand";
$tbl_3 = "tbl_color";
$tbl_4 = "tbl_gender";
$tbl_6 = "tbl_sale";
$tbl_7 = "tbl_size";

$product_available = getAll($tbl_1);
$product_brand = getAll($tbl_2);
$product_color = getAll($tbl_3);
$product_gender = getAll($tbl_4);
$product_sale = getAll($tbl_6);
$product_size = getAll($tbl_7);

if (isset($_POST['submit'])) {
  // var_dump($_FILES['cover']);
  $image = $_FILES['image'];
  $title = trim($_POST['title']);
  $desc = trim($_POST['desc']);
  $price = trim($_POST['price']);
  $available = trim($_POST['available']);
  $brand = trim($_POST['brand']);
  $color = trim($_POST['color']);
  $gender = trim($_POST['gender']);
  $sale = trim($_POST['sale']);
  $size = trim($_POST['size']);

  if(empty($_FILES['image']) || empty($_POST['title']) || empty($_POST['desc']) || empty($_POST['price']) || empty($_POST['available']) || empty($_POST['brand']) || empty($_POST['color']) || empty($_POST['gender']) || empty($_POST['sale']) || empty($_POST['size'])  )
  {
    $message = 'Please fill out all fields';
  }else{
    $result = addProduct( $image, $title, $desc, $price, $available, $brand, $color, $gender, $sale, $size);
    $message = $result;
  }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


  <title>Add Products</title>
</head>

<body>
<?php if(!empty($message)):?>
  <div class="message">
    <p><?php echo $message?></p>
    </div>
  <?php endif; ?>
  <br>
  <div class="container">
    <h1 class="text-center">Add Products</h1>
    <hr style="width:30%; margin:0 auto; background-color: black; margin-top: 1rem; margin-bottom: 1rem;">
    <form action="admin_addproduct.php" method="post" enctype="multipart/form-data">

      <div class="form-group">
        <label for="image">Product Image:</label>
        <input type="file" name="image" id="image" value="" required>
      </div>
      <div class="form-group">
        <label for="title">Product Title:</label>
        <input type="text" name="title" id="title" value="" required>
      </div>
      <div class="form-group">
        <label for="desc">Product Description:</label>
        <textarea class="form-control" name="desc" id="desc" rows="3" required></textarea>
      </div>
      <div class="form-group">
        <label for="price">Product Price:</label>
        <input type="text" name="price" id="price" value="" required>
      </div>
      <div class="form-group">
        <label for="category">Product Category</label>
        <select class="form-control" id="category_available" name="available" required>
            <option value="">--Availability In Store--</option>
            <?php while ($row = $product_available->fetch(PDO::FETCH_ASSOC)) : ?>
              <option value="<?php echo $row['available_id'] ?>"><?php echo $row['available_name'] ?></option>
            <?php endwhile ?>
          </select>

          <select class="form-control" id="category_brand" name="brand" required>
            <option value="">--Brands--</option>
            <?php while ($row = $product_brand->fetch(PDO::FETCH_ASSOC)) : ?>
              <option value="<?php echo $row['brand_id'] ?>"><?php echo $row['brand_name'] ?></option>
            <?php endwhile ?>
          </select>

          <select class="form-control" id="category_gender" name="gender" required>
            <option value="">--gender--</option>
            <?php while ($row = $product_gender->fetch(PDO::FETCH_ASSOC)) : ?>
              <option value="<?php echo $row['gender_id'] ?>"><?php echo $row['gender_name'] ?></option>
            <?php endwhile ?>
          </select>

          <select class="form-control" id="category_sale" name="sale" required>
            <option value="">--on sale?--</option>
            <?php while ($row = $product_sale->fetch(PDO::FETCH_ASSOC)) : ?>
              <option value="<?php echo $row['sale_id'] ?>"><?php echo $row['sale_name'] ?></option>
            <?php endwhile ?>
          </select>

          <select class="form-control" id="category_size" name="size" required>
            <option value="">--size--</option>
            <?php while ($row = $product_size->fetch(PDO::FETCH_ASSOC)) : ?>
              <option value="<?php echo $row['size_id'] ?>"><?php echo $row['size_name'] ?></option>
            <?php endwhile ?>
          </select>

          <select class="form-control" id="category_color" name="color" required>
            <option value="">--color--</option>
            <?php while ($row = $product_color->fetch(PDO::FETCH_ASSOC)) : ?>
              <option value="<?php echo $row['color_id'] ?>"><?php echo $row['color_name'] ?></option>
            <?php endwhile ?>
          </select>
      </div>
      <button class="btn btn-primary mb-2" type="submit" name="submit" style="background-color: #FF0002;">Add Product</button>
    </form>
  </div>
</body>

</html>