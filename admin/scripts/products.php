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

// edit products
function editProducts($id, $image, $title, $desc, $price, $available, $brand, $color, $gender, $sale, $size)
{
      

    include 'connect.php';
        
    if($image!== null){
      $file_type      = pathinfo($image['name'], PATHINFO_EXTENSION);
      $accepted_types = array('gif', 'jpg', 'jpe', 'jpeg', 'png');
      if (!in_array($file_type, $accepted_types)) {
          throw new Exception('Wrong file types!');
      }
      // Check file size
      if ($image["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        throw new Exception('Sorry, your file is too large!');
      }
      //3. Move the uploaded file around
      $sourceProperties = getimagesize($image['tmp_name']);
      $fileNewName = time();
      $folderPath = '../images/';
      $imageType = $sourceProperties[2];


      function imageResize($imageResourceId,$width,$height) {
        $targetWidth =350;
        $targetHeight =250;
        $targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
        imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);
        return $targetLayer;
    }
      switch ($imageType) {
          case IMAGETYPE_PNG:
              $imageResourceId = imagecreatefrompng($image['tmp_name']); 
              $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
              imagepng($targetLayer,$folderPath. $fileNewName. "_product.". $file_type);
              break;
          case IMAGETYPE_GIF:
              $imageResourceId = imagecreatefromgif($image['tmp_name']); 
              $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
              imagegif($targetLayer,$folderPath. $fileNewName. "_product.". $file_type);
              break;
          case IMAGETYPE_JPEG:
              $imageResourceId = imagecreatefromjpeg($image['tmp_name']); 
              $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
              imagejpeg($targetLayer,$folderPath. $fileNewName. "_product.". $file_type);
              break;
          default:
              echo "Invalid Image type.";
              exit;
              break;
      }
      move_uploaded_file($image['tmp_name'], $folderPath. $fileNewName. ".". $file_type);

    }

        $query = "UPDATE tbl_products SET ";
        $query .= "products_name = :product_name, ";
        $query .= "products_desc = :product_description, ";
        $query .= "products_img =  :product_image, ";
        $query .= "products_price = :product_price ";
        $query .= "WHERE products_id = :product_id ";

        $product_set = $pdo->prepare($query);
        $product_set->execute(
          array(
            ':product_name' => $title,
            ':product_description' => $desc,
            ':product_price' => $price,
            ':product_image' => $fileNewName."_product.".$file_type,
            ':product_id' => $id,
          )
        );
        if (!$product_set) {
          $message='failed to edit product!';
          return $message;
        }

        $insert_av_query = "UPDATE tbl_prod_available SET available_id = :av_id WHERE products_id = :products_id";
        $insert_av = $pdo->prepare($insert_av_query);
        $insert_av->execute(
            array(
                ':products_id' => $id,
                ':av_id' => $available
            )
        );
        if (!$insert_av) {
          $message='failed to update available!';
          return $message;
        }

        $insert_brand_query = "UPDATE tbl_prod_brand SET brand_id = :brand_id WHERE products_id = :products_id";
        $insert_brand = $pdo->prepare($insert_brand_query);
        $insert_brand->execute(
            array(
                ':products_id' => $id,
                ':brand_id' => $brand
            )
        );
        if (!$insert_brand) {
          $message='failed to update brand!';
          return $message;
        }
        $insert_color_query = "UPDATE tbl_prod_color SET color_id = :color_id WHERE products_id = :products_id";
        $insert_color = $pdo->prepare($insert_color_query);
        $insert_color->execute(
            array(
                ':products_id' => $id,
                ':color_id' => $color
            )
        );
        if (!$insert_color) {
          $message='failed to update color!';
          return $message;
        }
        $insert_gender_query = "UPDATE tbl_prod_gender SET gender_id = :gender_id WHERE products_id = :products_id";
        $insert_gender = $pdo->prepare($insert_gender_query);
        $insert_gender->execute(
            array(
                ':products_id' => $id,
                ':gender_id' => $gender
            )
        );
        if (!$insert_gender) {
          $message='failed to update gender!';
          return $message;
        }
        $int = (int) filter_var($price, FILTER_SANITIZE_NUMBER_INT);
        if($int>50){
          $price_level=1;
        }elseif($int>=50 && $int <100){
          $price_level=2;
        }else{
          $price_level=3;
        }
        $insert_price_query = "UPDATE tbl_prod_price SET price_id = :price_id WHERE products_id = :products_id";
        $insert_price = $pdo->prepare($insert_price_query);
        $insert_price->execute(
            array(
                ':products_id' => $id,
                ':price_id' => $price_level
            )
        );
        if (!$insert_price) {
          $message='failed to update price!';
          return $message;
        }
        $insert_sale_query = "UPDATE tbl_prod_sale SET sale_id = :sale_id WHERE products_id = :products_id";
        $insert_sale = $pdo->prepare($insert_sale_query);
        $insert_sale->execute(
            array(
                ':products_id' => $id,
                ':sale_id' => $sale
            )
        );
        if (!$insert_sale) {
          $message='failed to update sale!';
          return $message;
        }
        $insert_size_query = "UPDATE tbl_prod_size SET size_id = :size_id WHERE products_id = :products_id";
        $insert_size = $pdo->prepare($insert_size_query);
        $insert_size->execute(
            array(
                ':products_id' => $id,
                ':size_id' => $size
            )
        );
        if (!$insert_size) {
          $message='failed to update size!';
          return $message;
        }
        Header("Location:index.php?edit");
       
    
}

// delete
function deleteItem($delete_product_id)
{
  include 'connect.php';

  $delete_product_query = 'DELETE FROM tbl_products WHERE products_id = :id';
  $delete_product = $pdo->prepare($delete_product_query);
  $delete_product->execute(
    array(
      ':id' => $delete_product_id
    )
  );

  $delete_av_query = 'DELETE FROM tbl_prod_available WHERE products_id = :id';
  $delete_av = $pdo->prepare($delete_av_query);
  $delete_av->execute(
    array(
      ':id' => $delete_product_id 
    )
  );

  $delete_av_query = 'DELETE FROM tbl_prod_available WHERE products_id = :id';
  $delete_av = $pdo->prepare($delete_av_query);
  $delete_av->execute(
    array(
      ':id' => $delete_product_id 
    )
  );

  $delete_av_query = 'DELETE FROM tbl_prod_available WHERE products_id = :id';
  $delete_av = $pdo->prepare($delete_av_query);
  $delete_av->execute(
    array(
      ':id' => $delete_product_id 
    )
  );

  $delete_av_query = 'DELETE FROM tbl_prod_available WHERE products_id = :id';
  $delete_av = $pdo->prepare($delete_av_query);
  $delete_av->execute(
    array(
      ':id' => $delete_product_id 
    )
  );

  $delete_av_query = 'DELETE FROM tbl_prod_available WHERE products_id = :id';
  $delete_av = $pdo->prepare($delete_av_query);
  $delete_av->execute(
    array(
      ':id' => $delete_product_id 
    )
  );

  $delete_av_query = 'DELETE FROM tbl_prod_available WHERE products_id = :id';
  $delete_av = $pdo->prepare($delete_av_query);
  $delete_av->execute(
    array(
      ':id' => $delete_product_id 
    )
  );

  $delete_av_query = 'DELETE FROM tbl_prod_available WHERE products_id = :id';
  $delete_av = $pdo->prepare($delete_av_query);
  $delete_av->execute(
    array(
      ':id' => $delete_product_id 
    )
  );


  if ($delete_product->rowCount()) {
    Header('Location: index.php?product_deleted');
  } else {
    $message = 'Not deleted yet..';
    return $message;
  }
}