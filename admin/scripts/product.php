<?php
//! ------------------- ADD PRODUCT -----------------------
function addProduct($image, $title, $desc, $price, $category)
{
    try {
        include 'connect.php';

        $product_name = htmlspecialchars($title);

        //! image file information
        $product_image_name = $image['name'];
        $product_image_temp = $image['tmp_name'];
        $product_image_size = $image['size'];
        $product_image_error = $image['error'];
        $product_image_type = $image['type'];

        // 1. check FILE extension
        $file_extension = strtolower(pathinfo($product_image_name, PATHINFO_EXTENSION));
        $accepted_extensions = array('gif', 'jpg', 'jpe', 'jpeg', 'png', 'JPG');
        if (!in_array($file_extension, $accepted_extensions)) {
            throw new Exception('Wrong file type!');
        }

        // 2. check FILE error
        if ($product_image_error !== 0) {
            throw new Exception('Error in uploading, file size can be too big!');
        }

        // 3. assign FILE unique name (based on microsecond actual timeformat)
        $product_image = time() . '_' . rand(1000, 9999) . "." . $file_extension;

        // 4. resize image
        $folderPath = "../images/thumbs/";
        $sourceProperties = getimagesize($product_image_temp);
        $imageType = $sourceProperties[2];

        switch ($imageType) {

            case IMAGETYPE_PNG:

                $imageResourceId = imagecreatefrompng($product_image_temp);
                $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
                imagepng($targetLayer, $folderPath . "th_" . $product_image);

                $product_resized_image = "th_" . $product_image;

                break;

            case IMAGETYPE_GIF:

                $imageResourceId = imagecreatefromgif($product_image_temp);
                $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
                imagegif($targetLayer, $folderPath . "th_" . $product_image);

                $product_resized_image = "th_" . $product_image;

                break;

            case IMAGETYPE_JPEG:

                $imageResourceId = imagecreatefromjpeg($product_image_temp);
                $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
                imagejpeg($targetLayer, $folderPath . "th_" . $product_image);

                $product_resized_image = "th_" . $product_image;

                break;

            default:

                echo "Invalid Image type.";

                exit;

                break;
        }

        // move img from temporary location to images folder
        move_uploaded_file($product_image_temp, "../images/$product_image");

        $product_content = htmlspecialchars($desc);

        $insert_product_query = 'INSERT INTO tbl_products(products_name, products_description,';
        $insert_product_query .= ' products_img, products_price)';
        $insert_product_query .= ' VALUES(:products_name, :products_description, :products_img,';
        $insert_product_query .= ' :products_price)';

        $insert_product = $pdo->prepare($insert_product_query);
        $insert_result = $insert_product->execute(
            array(
                ':products_name' => $title,
                ':products_description' => $product_content,
                ':products_img' => $product_image,
                ':products_price' => $price,
            )
        );

        if (!$insert_result) {
            throw new Exception('Failed to insert the new product!');
        }

        $last_id = $pdo->lastInsertId();
        $insert_cat_query = 'INSERT INTO tbl_prods_cats(products_id, cats_id) VALUES(:product_id, :cat_id)';
        $insert_cat = $pdo->prepare($insert_cat_query);
        $insert_cat->execute(
            array(
                ':product_id' => $last_id,
                ':cat_id' => $category,
            )
        );
        if (!$insert_cat->rowCount()) {
            throw new Exception('Failed to set Category!');
        }
        //5. If all of above works fine, redirect user to index.php
        // redirect_to('index.php');
        Header("Location:index.php?add");
    } catch (Exception $e) {
        $error = $e->getMessage();
        return $error;
    }
}

//!  ------------- EDIT PRODUCT -----------------------
function editProduct($image, $title, $desc, $price, $category)
{
      
      try {
          include 'connect.php';
        
        if (isset($_GET['product'])) {
          $edit_id = $_GET['product'];
        }

        $product_name = htmlspecialchars($title);

        //! image file information
        $product_image_name = $image['name'];
        $product_image_temp = $image['tmp_name'];
        $product_image_size = $image['size'];
        $product_image_error = $image['error'];
        $product_image_type = $image['type'];

        // 1. check FILE extension
        $file_extension = strtolower(pathinfo($product_image_name, PATHINFO_EXTENSION));
        $accepted_extensions = array('gif', 'jpg', 'jpe', 'jpeg', 'png', 'JPG');
        if (!in_array($file_extension, $accepted_extensions)) {
            throw new Exception('Wrong file type!');
        }

        // 2. check FILE error
        if ($product_image_error !== 0) {
            throw new Exception('Error in uploading, file size can be too big!');
        }

        // 3. assign FILE unique name (based on microsecond actual timeformat)
        $product_image = time() . '_' . rand(1000, 9999) . "." . $file_extension;

        // 4. resize image
        $folderPath = "../images/thumbs/";
        $sourceProperties = getimagesize($product_image_temp);
        $imageType = $sourceProperties[2];

        switch ($imageType) {

            case IMAGETYPE_PNG:

                $imageResourceId = imagecreatefrompng($product_image_temp);
                $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
                imagepng($targetLayer, $folderPath . "th_" . $product_image);

                $product_resized_image = "th_" . $product_image;

                break;

            case IMAGETYPE_GIF:

                $imageResourceId = imagecreatefromgif($product_image_temp);
                $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
                imagegif($targetLayer, $folderPath . "th_" . $product_image);

                $product_resized_image = "th_" . $product_image;

                break;

            case IMAGETYPE_JPEG:

                $imageResourceId = imagecreatefromjpeg($product_image_temp);
                $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
                imagejpeg($targetLayer, $folderPath . "th_" . $product_image);

                $product_resized_image = "th_" . $product_image;

                break;

            default:

                echo "Invalid Image type.";

                exit;

                break;
        }

        // move img from temporary location to images folder
        move_uploaded_file($product_image_temp, "../images/$product_image");

        $product_content = htmlspecialchars($desc);

        $query = "UPDATE tbl_products SET ";
        $query .= "products_name = :product_name, ";
        $query .= "products_description = :product_description, ";
        $query .= "products_img =  :product_image, ";
        $query .= "products_price = :product_price ";
        $query .= "WHERE products_id = :product_id ";

        $set_product = $pdo->prepare($query);
        $set_product->execute(
          array(
            ':product_name' => $title,
            ':product_description' => nl2br($product_content),
            ':product_price' => $price,
            ':product_image' => $product_image,
            ':product_id' => $edit_id,
          )
        );


        if (!$set_product) {
          throw new Exception('Failed to update product!');
        }
    
        $insert_cat_query = "UPDATE tbl_prods_cats SET cats_id = :cat_id WHERE products_id = :product_id";
        $insert_cat = $pdo->prepare($insert_cat_query);
        $insert_cat->execute(
            array(
                ':product_id' => $edit_id,
                ':cat_id' => $category
            )
        );
        if (!$insert_cat) {
            throw new Exception('Failed to set Category!');
        }
        //5. If all of above works fine, redirect user to index.php
        // redirect_to('index.php');
        Header("Location:index.php?edit");
    } catch (Exception $e) {
        $error = $e->getMessage();
        return $error;
    }
}

//! ------------------- DELETE PRODUCT -----------------------
function deleteItem($delete_product_id)
{
  include 'connect.php';

  $img_query = "SELECT product_img FROM tbl_products WHERE `products_id` = :deleteproduct";
  $img_to_delete = $pdo->prepare($img_query);
  $img_to_delete->execute(
    array(
      ':deleteproduct' => $delete_product_id
    )
  );

  $images = [];
  while ($row = $img_to_delete->fetch(PDO::FETCH_ASSOC)) {
    $images[] = $row;
  };

  // delete img from folder
  unlink('../images/' . $images[0]['products_img']);


  $delete_product_query = 'DELETE FROM tbl_products WHERE products_id = :id';
  $delete_product = $pdo->prepare($delete_product_query);
  $delete_product->execute(
    array(
      ':id' => $delete_product_id
    )
  );

  $delete_link_query = 'DELETE FROM tbl_prods_cats WHERE products_id = :id';
  $delete_link = $pdo->prepare($delete_link_query);
  $delete_link->execute(
    array(
      ':id' => $delete_product_id
    )
  );

  if ($delete_product->rowCount() && $delete_link->rowCount()) {
    Header('Location: index.php?product_deleted');
  } else {
    $message = 'Not deleted yet..';
    return $message;
  }
}