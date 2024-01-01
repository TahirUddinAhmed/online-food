<?php
 if(isset($_POST['add-food'])) {
    $str = "yess it works";
 }

 // fetch all the categories
 $category_query = "SELECT * FROM category";
 $category_result = mysqli_query($conn, $category_query);
 $no_of_cat_item = mysqli_num_rows($category_result);

?>
<div id="layoutSidenav_content">
    <main>
        <?= $str ?? null ?>
        <div class="container mt-3">
            <h2 class="mb-5 text-center">Add Food Item</h2>

            <form action="" method="post">
            <div class="row container">
                    <div class="col-8 border p-3">
                        <!-- <h2>Form to add food item</h2> -->

                        <div class="mb-3">
                            <label for="food_name">Food Name</label>
                            <input type="text" name="food_name" class="form-control" placeholder="Enter food name">
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
                            <input type="number" name="regular-price" class="form-control" placeholder="Enter the original Price">
                        </div>

                        <div class="mb-3">
                            <label for="offer-price">Offer Price</label>
                            <input type="number" name="offer-price" class="form-control" placeholder="Entter offer price">
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