<?php
//! ------------------- ADD PRODUCT -----------------------
function  addProduct($image, $title, $desc, $price, $available, $brand, $color, $gender, $sale, $size)
{
  if(!empty($image) || !empty($title) || !empty($desc) || !empty($price) || !empty($available) || !empty($brand) || !empty($color) || !empty($gender) || !empty($sale) || !empty($size)){
    try {
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

        $insert_product_query = 'INSERT INTO tbl_products(products_name, products_desc,';
        $insert_product_query .= ' products_img, products_price)';
        $insert_product_query .= ' VALUES(:products_name, :products_description, :products_img,';
        $insert_product_query .= ' :products_price)';

        $insert_product = $pdo->prepare($insert_product_query);
        $insert_result = $insert_product->execute(
            array(
              ':products_name' => $title,
              ':products_description' => $desc,
              ':products_price' => $price,
              ':products_img' => $fileNewName."_product.".$file_type
            )
        );

        if (!$insert_result) {
            throw new Exception('Failed to insert the new product');
        }

        $last_id = $pdo->lastInsertId();
// insert categories
        $insert_av_query = 'INSERT INTO tbl_prod_available(products_id, available_id) VALUES(:product_id, :available_id)';
        $insert_av = $pdo->prepare($insert_av_query);
        $insert_av->execute(
            array(
                ':product_id' => $last_id,
                ':available_id' => $available,
            )
        );
        if (!$insert_av->rowCount()) {
            throw new Exception('Failed to set Availability!');
        }

        $insert_brand_query = 'INSERT INTO tbl_prod_brand(products_id, brand_id) VALUES(:product_id, :brand_id)';
        $insert_brand = $pdo->prepare($insert_brand_query);
        $insert_brand->execute(
            array(
                ':product_id' => $last_id,
                ':brand_id' => $brand,
            )
        );
        if (!$insert_brand->rowCount()) {
            throw new Exception('Failed to set brand!');
        }

        $insert_color_query = 'INSERT INTO tbl_prod_color(products_id, color_id) VALUES(:product_id, :color_id)';
        $insert_color = $pdo->prepare($insert_color_query);
        $insert_color->execute(
            array(
                ':product_id' => $last_id,
                ':color_id' => $color,
            )
        );
        if (!$insert_color->rowCount()) {
            throw new Exception('Failed to set color!');
        }

        $insert_gender_query = 'INSERT INTO tbl_prod_gender(products_id, gender_id) VALUES(:product_id, :gender_id)';
        $insert_gender = $pdo->prepare($insert_gender_query);
        $insert_gender->execute(
            array(
                ':product_id' => $last_id,
                ':gender_id' => $gender,
            )
        );
        if (!$insert_gender->rowCount()) {
            throw new Exception('Failed to set gender!');
        }
        $int = (int) filter_var($price, FILTER_SANITIZE_NUMBER_INT);
        if($int>50){
          $price_level=1;
        }elseif($int>=50 && $int <100){
          $price_level=2;
        }else{
          $price_level=3;
        }
        $insert_price_query = 'INSERT INTO tbl_prod_price(products_id, price_id) VALUES(:product_id, :price_id)';
        $insert_price = $pdo->prepare($insert_price_query);
        $insert_price->execute(
            array(
                ':product_id' => $last_id,
                ':price_id' => $price_level,
            )
        );
        if (!$insert_price->rowCount()) {
            throw new Exception('Failed to set price!');
        }

        $insert_sale_query = 'INSERT INTO tbl_prod_sale(products_id, sale_id) VALUES(:product_id, :sale_id)';
        $insert_sale = $pdo->prepare($insert_sale_query);
        $insert_sale->execute(
            array(
                ':product_id' => $last_id,
                ':sale_id' => $sale,
            )
        );
        if (!$insert_sale->rowCount()) {
            throw new Exception('Failed to set sale!');
        }

        $insert_size_query = 'INSERT INTO tbl_prod_size(products_id, size_id) VALUES(:product_id, :size_id)';
        $insert_size = $pdo->prepare($insert_size_query);
        $insert_size->execute(
            array(
                ':product_id' => $last_id,
                ':size_id' => $size,
            )
        );
        if (!$insert_size->rowCount()) {
            throw new Exception('Failed to set size!');
        }

        Header("Location:index.php?add");
    } catch (Exception $e) {
        $error = $e->getMessage();
        return $error;
    }
}else{
  $message = 'Please fill out all fields';
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

      }else{
        $query = "UPDATE tbl_products SET ";
        $query .= "products_name = :product_name, ";
        $query .= "products_desc = :product_description, ";
        $query .= "products_price = :product_price ";
        $query .= "WHERE products_id = :product_id ";

        $product_set = $pdo->prepare($query);
        $product_set->execute(
          array(
            ':product_name' => $title,
            ':product_description' => $desc,
            ':product_price' => $price,
            ':product_id' => $id,
          )
        );
      }
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

  $delete_brand_query = 'DELETE FROM tbl_prod_brand WHERE products_id = :id';
  $delete_brand = $pdo->prepare($delete_brand_query);
  $delete_brand->execute(
    array(
      ':id' => $delete_product_id 
    )
  );

  $delete_color_query = 'DELETE FROM tbl_prod_color WHERE products_id = :id';
  $delete_color = $pdo->prepare($delete_color_query);
  $delete_color->execute(
    array(
      ':id' => $delete_product_id 
    )
  );

  $delete_gender_query = 'DELETE FROM tbl_prod_gender WHERE products_id = :id';
  $delete_gender = $pdo->prepare($delete_gender_query);
  $delete_gender->execute(
    array(
      ':id' => $delete_product_id 
    )
  );

  $delete_price_query = 'DELETE FROM tbl_prod_price WHERE products_id = :id';
  $delete_price = $pdo->prepare($delete_price_query);
  $delete_price->execute(
    array(
      ':id' => $delete_product_id 
    )
  );

  $delete_sale_query = 'DELETE FROM tbl_prod_sale WHERE products_id = :id';
  $delete_sale = $pdo->prepare($delete_sale_query);
  $delete_sale->execute(
    array(
      ':id' => $delete_product_id 
    )
  );

  $delete_size_query = 'DELETE FROM tbl_prod_size WHERE products_id = :id';
  $delete_size = $pdo->prepare($delete_size_query);
  $delete_size->execute(
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