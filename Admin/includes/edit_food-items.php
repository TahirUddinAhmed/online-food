<?php
  if(isset($_GET['id'])) {
    $food_id = $_GET['id'];
  } else {
    header("Location: fooditem.php");
  }

  // query to retreive data from DB
  $query = "SELECT * FROM menuitems WHERE itemID = $food_id";
  $result = mysqli_query($conn, $query);
  
  if(!$result) {
    die("QUERY FAILED" . mysqli_error($conn));
  }

  // update form data 
  if(isset($_POST['update-food'])) {
    $f_name = check_input($_POST['food_name']);
    $f_category = check_input($_POST['food-category']);
    $original_price = check_input($_POST['regular-price']);
    $offer_price = check_input($_POST['offer-price']);
    $desc = check_input($_POST['food-desc']);

    $errors = array();

    // validate the form 
    if(empty($f_name)) {
        $errors[] = " Food name is required!";
    }

    // validate food category field
    if($f_category == 'default') {
        // $errors[] = "Please choose a category";
        $cat_query = "SELECT * FROM menuitems WHERE ItemID = $food_id";
        $cat_result = mysqli_query($conn, $cat_query);

        while($data=mysqli_fetch_assoc($cat_result)) {
            $f_category = $data['CategoryID'];
        }
    } 

    // validate price field
    if(empty($original_price)) {
        $errors[] = "Original Price is required";
    } else if(!is_numeric($original_price) || $original_price <= 0) {
        $errors[] = "Original price must be a valid positive number.";
    }

    if(empty($offer_price)) {
        $errors[] = "Offer price is required";
    } else if(!is_numeric($offer_price) || $offer_price <= 0) {
        $errors[] = "Offer price must be a valid positive number.";
    }

    // image 
    // support extension
    $allowed_ext = array('png', 'jpg', 'jpeg');

    $food_image = $_FILES['food_image']['name'];
    $food_image_temp = $_FILES['food_image']['tmp_name'];
    $image_size = $_FILES['food_image']['size'];
    $target_dir = "../assets/Restaurant/$food_image";

    $image_ext = explode('.', $food_image);
    $image_ext = strtolower(end($image_ext));

    if(!empty($food_image)) {
        if(in_array($image_ext, $allowed_ext)){
            if($image_size <= 5000000){
                // image upload
                move_uploaded_file($food_image_temp, $target_dir); 
            } else {
                $message = '<p class="text-danger">Image size is too large, image size should be less than 500KB.</p>';
            }
        }else{
            $message = '<p class="text-danger">Only .png, .jpg, .jpen and .gif allowed</p>';
        } 

    } else {
        $grab_img = "SELECT * FROM menuitems WHERE ItemID = $food_id";
        $image_result = mysqli_query($conn, $grab_img);

        while($data = mysqli_fetch_assoc($image_result)) {
            $food_image = $data['food_img'];
        }
    }

    // //INSERT INTO `menuitems` (`ItemID`, `CategoryID`, `Name`, `Description`, `Price`, `original-price`, `added_on`) VALUES ('1', '11', 'Pizza ', 'pizza', '564', '900', current_timestamp());
    $update = "UPDATE `menuitems` SET `CategoryID` = '$f_category', `Name` = '$f_name', `Description` = '$desc', `Price` = '$original_price', `offer-price` = '$offer_price', `food_img` = '$food_image' WHERE `menuitems`.`ItemID` = $food_id;";
    $update_result = mysqli_query($conn, $update);

    if(!$update_result) {
      $src = "QUERY FAILED" . mysqli_error($conn);
    } else {
        header("Location: fooditem.php?source=view&update");
    }

  }

  
  

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container mt-3">
            <h2 class="mb-5 text-center">Edit Food Item</h2>
            <?= $src ?? null ?>

            <?php
                if (!empty($errors)) {
                    echo "<div class='alert alert-danger'>";
                    echo "<ul>";
                    // foreach ($errors as $error) {
                    //     echo "<li>$error</li>";
                    // }
                    foreach ($errors as $err) {
                        echo "<li>$err</li>";
                    }
                    // echo gettype($errors);
                    // echo $errors;
                    echo "</ul>";
                    echo "</div>";
                }
            ?>
            
            <form action="" method="post" enctype="multipart/form-data">
            <div class="row container">
                    <div class="col-8 border p-3">
                        <!-- <h2>Form to add food item</h2> -->

                    <?php
                        while($data=mysqli_fetch_assoc($result)) {
                            $food_name = $data['Name'];
                            $category_id = $data['CategoryID'];
                            $price = $data['Price'];
                            $offer_price = $data['offer-price'];
                            $desc = $data['Description'];
                            $food_image = $data['food_img'];
                          }
                        
                          // query to retreive all category details
                          $cat_query = "SELECT * FROM category";
                          $cat_result = mysqli_query($conn, $cat_query);

                          // query to retreive the food category details
                          $food_cat = "SELECT * FROM category WHERE cat_id = $category_id";
                          $food_cat_result = mysqli_query($conn, $food_cat);

                          while($data=mysqli_fetch_assoc($food_cat_result)) {
                            $food_cat_name = $data['name'];
                          }

                          
                    ?>
                        <div class="mb-3">
                            <label for="food_name">Food Name</label>
                            <input type="text" name="food_name" class="form-control" value="<?= $food_name ?? null ?>" placeholder="Enter food name">
                        </div>

                        <div class="mb-3">
                            <label for="food_category">Category - [<?= $food_cat_name ?>]</label>
                            <select name="food-category" class="form-control" id="cat">
                            <option value="default">Choose Category</option>
                            <?php
                            while($catData=mysqli_fetch_assoc($cat_result)) {
                                $cat_id = $catData['cat_id'];
                                $cat_name = $catData['name'];

                                
                            ?>
                            <option value="<?=$cat_id?>"><?= $cat_name ?></option>
                            <?php
                              }
                            ?>
                                
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="regular-price">Original Price</label>
                            <input type="number" name="regular-price" class="form-control" value="<?= $price ?? null ?>" placeholder="Enter the original Price">
                        </div>

                        <div class="mb-3">
                            <label for="offer-price">Offer Price</label>
                            <input type="number" name="offer-price" class="form-control" value="<?= $offer_price ?>" placeholder="Entter offer price">
                        </div>

                        
                        <div class="mb-3">
                            <label for="food-desc">Description</label>
                            <textarea name="food-desc" class="form-control" cols="30" rows="10"><?= $desc ?></textarea>
                        </div>

                    </div>

                    <div class="col-4 border">
                        <!-- <h2>Save</h2> -->
                        <div class="mb-3 mt-4">
                            <label for="food-image">Food Image</label>
                            <input type="file" name="food_image" class="form-control" value="<?= $food_image ?>">

                            <div class="mt-2 text-center">
                                <img src="../assets/Restaurant/<?=$food_image?>" style="width:100%; margin: 0 auto;" class="img-fluid border" alt="">
                            </div>
                        </div>
                        <!-- <div class="d-grid gap-2">
                            <button class="btn btn-primary btn-lg" name="add-food" type="submit">Add Food</button>
                        </div> -->
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- <button type="submit" name="delete" class="btn btn-danger" style="width: 100%;">Delete</button> -->
                                <a href="?delete=<?= $food_id ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this food item?')" style="width: 100%">Delete</a>
                            </div>
                            <div class="col-sm-6">
                                <button type="submit" name="update-food" class="btn btn-primary" style="width: 100%;">Edit & Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>