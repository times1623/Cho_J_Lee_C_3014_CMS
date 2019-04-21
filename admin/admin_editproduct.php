<?php

require_once 'scripts/config.php';
confirm_logged_in();
require_once 'scripts/connect.php';
if (isset($_GET['product'])) {
  $id = $_GET['product'];
}
$tb1 = "tbl_products";
$col = "products_id";
// Get product info
$found_product = getSingle($tb1, $col, $id);

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


if (is_string($found_product)) {
  $message = "Failed to get the user info!";
}
if (isset($_POST['product_update'])) {
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
  if (empty($_FILES["image"]["name"])){
  $image=null;
}

  $result = editProducts($id, $image, $title, $desc, $price, $available, $brand, $color, $gender, $sale, $size);
  $message = $result;
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
  <title>Edit Product</title>
</head>

<body>
  <?php if (!empty($message)) : ?>
    <p><?php echo $message ?></p>
  <?php endif; ?>
  <br>
  <div class="container">
  <h2>Current Product Image</h2>
    <?php if ($product = $found_product->fetch(PDO::FETCH_ASSOC)) : ?>
      <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
          <div>
            <img style="width: 30%; padding: 1rem; border: 5px solid black;" src="../images/<?php echo $product['products_img']; ?>" alt="<?php echo $product['products_name'] ?>">
          </div>
          <label for="image">New Product Image:</label>
          <input type="file" name="image" id="image" value="">
        </div>
        <div class="form-group">
          <label for="title">New Product Name:</label>
          <input required class="form-control" rows="2" type="text" name="title" id="title" value="<?php echo $product['products_name'] ?>">
        </div>
        <div class="form-group">
          <label for="desc">New Description:</label>
          <textarea required class="form-control" rows="3" name="desc" id="desc"><?php echo $product['products_desc'] ?></textarea>
        </div>
        <div class="form-group">
          <label for="price">PNew Price:</label>
          <input required class="form-control" rows="1" type="text" name="price" id="price" value="<?php echo $product['products_price'] ?>">
        </div>
        <div class="form-group">
          <label for="category">Product Category</label>
          <select class="form-control" id="category_available" name="available">
            <option>--Availability In Store--</option>
            <?php while ($row = $product_available->fetch(PDO::FETCH_ASSOC)) : ?>
              <option value="<?php echo $row['available_id'] ?>"><?php echo $row['available_name'] ?></option>
            <?php endwhile ?>
          </select>

          <select class="form-control" id="category_brand" name="brand">
            <option>--Brands--</option>
            <?php while ($row = $product_brand->fetch(PDO::FETCH_ASSOC)) : ?>
              <option value="<?php echo $row['brand_id'] ?>"><?php echo $row['brand_name'] ?></option>
            <?php endwhile ?>
          </select>

          <select class="form-control" id="category_gender" name="gender">
            <option>--gender--</option>
            <?php while ($row = $product_gender->fetch(PDO::FETCH_ASSOC)) : ?>
              <option value="<?php echo $row['gender_id'] ?>"><?php echo $row['gender_name'] ?></option>
            <?php endwhile ?>
          </select>

          <select class="form-control" id="category_sale" name="sale">
            <option>--on sale?--</option>
            <?php while ($row = $product_sale->fetch(PDO::FETCH_ASSOC)) : ?>
              <option value="<?php echo $row['sale_id'] ?>"><?php echo $row['sale_name'] ?></option>
            <?php endwhile ?>
          </select>

          <select class="form-control" id="category_size" name="size">
            <option>--size--</option>
            <?php while ($row = $product_size->fetch(PDO::FETCH_ASSOC)) : ?>
              <option value="<?php echo $row['size_id'] ?>"><?php echo $row['size_name'] ?></option>
            <?php endwhile ?>
          </select>

          <select class="form-control" id="category_color" name="color">
            <option>--color--</option>
            <?php while ($row = $product_color->fetch(PDO::FETCH_ASSOC)) : ?>
              <option value="<?php echo $row['color_id'] ?>"><?php echo $row['color_name'] ?></option>
            <?php endwhile ?>
          </select>

         

   

     
        </div>
        <button class="btn btn-primary mb-2" type="submit" name="product_update" style="background-color: #FF0002;">Edit Product</button>
      </form>
    </div>
  <?php endif; ?>
</body>

</html>