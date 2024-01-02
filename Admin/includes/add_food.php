<?php
 // ToDo: 
 //  1. Validate the form 
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
                } else {
                    // Process the form data and save to the database
                    // Add your code here to insert the data into the database or perform other actions
                    echo "<div class='alert alert-success'>Form submitted successfully!</div>";
                }
            ?>
            <form action="" method="post">
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
                                    <option value="<?= $cat_name ?>"><?= $cat_name ?></option>

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
                            <input type="file" name="food-image" class="form-control">
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary btn-lg" name="add-food" type="submit">Add Food</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>