<?php
 // ToDo: 
 //  1. Validate the form - completed
 //  2. Insert data into database
 if(isset($_POST['add-food'])) {
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
        $errors[] = "Please choose a category";
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

    if(in_array($image_ext, $allowed_ext)){
        if($image_size <= 5000000){
            // image upload
            move_uploaded_file($food_image_temp, $target_dir);
            
            //INSERT INTO `menuitems` (`ItemID`, `CategoryID`, `Name`, `Description`, `Price`, `original-price`, `added_on`) VALUES ('1', '11', 'Pizza ', 'pizza', '564', '900', current_timestamp());
            $insert = "INSERT INTO `menuitems` (`CategoryID`, `Name`, `Description`, `Price`, `original-price`, `food_img`, `added_on`) VALUES ($f_category, '$f_name', '$desc', $original_price, $offer_price, '$food_image', current_timestamp());";
            $insert_result = mysqli_query($conn, $insert);

            if(!$insert_result) {
                die("QUERY FAILED". mysqli_error($conn));
            } else {
                header("Location: fooditem.php?source=view&added");
            }
            
        }else {
            $message = '<p class="text-danger">Image size is too large, image size should be less than 500KB.</p>';
        }
    }else{
        $message = '<p class="text-danger">Only .png, .jpg, .jpen and .gif allowed</p>';
    } 




    

 }

 // fetch all the categories
 $category_query = "SELECT * FROM category";
 $category_result = mysqli_query($conn, $category_query);
 $no_of_cat_item = mysqli_num_rows($category_result);

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container mt-3">
            <h2 class="mb-5 text-center">Add Food Item</h2>
            <p class="alert alert-danger">
                <?= $message ?? null ?>

            </p>
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
                // else {
                //     // Process the form data and save to the database
                //     // Add your code here to insert the data into the database or perform other actions
                //     echo "<div class='alert alert-success'>Form submitted successfully!</div>";
                // }
            ?>
            <form action="" method="post" enctype="multipart/form-data">
            <div class="row container">
                    <div class="col-8 border p-3">
                        <!-- <h2>Form to add food item</h2> -->

                        <div class="mb-3">
                            <label for="food_name">Food Name</label>
                            <input type="text" name="food_name" class="form-control" value="<?= $f_name ?? null ?>" placeholder="Enter food name">
                        </div>

                        <div class="mb-3">
                            <label for="food_category">Category</label>
                            <select name="food-category" class="form-control" id="cat">
                            <option value="default">Choose Category</option>
                            <?php
                                if($no_of_cat_item > 0) {
                                    while($row = mysqli_fetch_assoc($category_result)) {
                                        $cat_id = $row['cat_id'];
                                        $cat_name = $row['name'];
                            ?>
                                    <option value="<?= $cat_id ?>"><?= $cat_name ?></option>

                            <?php
                                    }
                                }

                            ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="regular-price">Original Price</label>
                            <input type="number" name="regular-price" class="form-control" value="<?= $original_price ?? null ?>" placeholder="Enter the original Price">
                        </div>

                        <div class="mb-3">
                            <label for="offer-price">Offer Price</label>
                            <input type="number" name="offer-price" class="form-control" value="<?= $offer_price ?>" placeholder="Entter offer price">
                        </div>

                        
                        <div class="mb-3">
                            <label for="food-desc">Description</label>
                            <textarea name="food-desc" class="form-control" cols="30" rows="10"></textarea>
                        </div>

                    </div>

                    <div class="col-4 border">
                        <!-- <h2>Save</h2> -->
                        <div class="mb-3 mt-4">
                            <label for="food-image">Food Image</label>
                            <input type="file" name="food_image" class="form-control">
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary btn-lg" name="add-food" type="submit">Add Food</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>